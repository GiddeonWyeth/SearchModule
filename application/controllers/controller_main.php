<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/search_module/vendor/SearchStrategy.php';

class controller_main extends Controller
{

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function action_html()
    {

        $_POST = json_decode(trim(file_get_contents('php://input')), true);

        if ($_POST['url']) {

            $class_name = new ReflectionClass('SearchStrategy\\'.$_POST['param'].'SearchStrategy');
            $search_class = $class_name->newInstanceArgs(array('domain'=>$_POST['url']));

            $new_matches = $search_class->get_content();
            $count = count($new_matches);
            if ($count == 0) {
                $new_matches[] = 'No Results';
            }

            $json_data = json_encode($new_matches);
            echo $json_data;

            $this->model->set_data($_POST['param'], $_POST['url'], $json_data, $count);
            unset($this->model);
        }

    }

}