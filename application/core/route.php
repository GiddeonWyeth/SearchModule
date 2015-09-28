<?php

class Route
{
    static function start()
    {

        $controller_name = 'main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);


        if (!empty($routes[2])) {
            $controller_name = $routes[2];
        }


        if (!empty($routes[3])) {
            $action_name = $routes[3];
        }


        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;


        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }


        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "application/controllers/" . $controller_file;
        } else {
            throw new Exception('Page do not exist');
        }


        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {

            $controller->$action();
        } else {
            throw new Exception('Page do not exist');
        }

    }

}