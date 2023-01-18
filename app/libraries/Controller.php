<?php
/*
   * Base Controller
   * Loads the models and views
   */
class Controller
{
    // Load model
    public function model($model)
    {
        // Require model file
        require_once './app/models/' . $model . '.php';

        // Instatiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = [])
    {
        //TESTS ONLY
        // require './app/views/admin/login.php';
        // die;
        // echo './app/views/' . $view . '.php';
        // var_dump($view);
        // die;

        // Check for view file
        if (file_exists('./app/views/' . $view . '.php')) {
            require_once './app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}
