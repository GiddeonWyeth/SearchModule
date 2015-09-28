<?php

namespace SearchStrategy;

abstract class SearchStrategy
{
    protected static $domain;
    protected $for_replace;
    protected $html;

    function __construct($domain)
    {
       // var_dump(parse_url($domain));
        self::$domain = parse_url($domain)['scheme'] .'://'. parse_url($domain)['host'];
        $this->html = file_get_contents($domain);
    }

    abstract function get_content();

}

trait UrlAnalise
{

    protected static $data = array();

    private static function LinkTransform(array $links)
    {
        foreach ($links[1] as $key => $link) {
            $parsed_url = parse_url($link);
            if(isset($parsed_url['path'])) {
                $parsed_url['path'] = (substr($parsed_url['path'],0, 1) == '/') ? $parsed_url['path'] : '/' . $parsed_url['path'];

                self::$data[] = str_replace($link, self::$domain . $parsed_url['path'], $links[0][$key]);
            }
        }

        return self::$data;

    }
}

class ImagesSearchStrategy extends SearchStrategy
{
    use UrlAnalise;

    function get_content()
    {
        preg_match_all('~<img[^>]*?src="([^"]*)"[^>]*>~i', $this->html, $matches);
        return self::LinkTransform($matches);
    }
}

class LinkSearchStrategy extends SearchStrategy
{
    use UrlAnalise;

    function get_content()
    {
        preg_match_all('/<a(?:[^>]*)href=\"([^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is', $this->html, $matches);
        return self::LinkTransform($matches);
    }
}

class TextSearchStrategy extends SearchStrategy
{

    function get_content()
    {
        $data = array();
        preg_match_all('#<([^<]*)>(.*)' . $_POST['text'] . '(.*)<([^<]*)>#', $this->html, $matches);
        foreach ($matches[0] as $match) {
            $data[] = $match;
        }

        return $data;
    }
}