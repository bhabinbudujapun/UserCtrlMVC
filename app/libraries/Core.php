<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        //TEST
        // var_dump($url);
        // die;

        // Look in controllers for first value
        if (isset($url[0]) && file_exists('./app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        //TEST
        // var_dump($this->currentMethod);
        // var_dump($this->currentController);
        // die;

        // Require the controller
        require './app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if (isset($url[1])) {
            // Check to see method is exist or not in that controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 Index;
                unset($url[1]);
            }
        }

        // TESTS ONLY
        // var_dump($this->currentMethod);
        // var_dump($this->currentController);
        // die;

        // Check the para
        if (isset($url[2])) {
            $this->params = $url[2];
            // Unset 2 index;
            unset($url[2]);
        }
        // var_dump($this->currentController);
        // die;
        // Get params
        // $val = $this->params;
        // echo $val;
        // die;
        $this->params = $url ? array_values($url) : [];

        // TESTS ONLY
        // var_dump($this->currentMethod);
        // var_dump($this->currentController);
        // die;

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = explode('/', $url);
            return $url;
        }
    }
}
