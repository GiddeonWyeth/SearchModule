<?php

class Controller_Results extends Controller
{

    function __construct()
    {
        $this->model = new Model_Results();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('results_view.php', 'template_view.php', $data);
        unset($this->model);
    }

    function action_get_results()
    {
        $id = json_decode(trim(file_get_contents('php://input')), true);
        echo $this->model->get_results($id)[0]['result'];
        unset($this->model);
    }
}