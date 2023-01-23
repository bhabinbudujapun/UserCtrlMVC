<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        // var_dump($url);
        // die;
        // Look in controllers for first value
        if (isset($url[0]) && file_exists('./app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

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

        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = explode('/', $url);

            $result = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

            if ($result != null) {
                parse_str($result, $params);
                // $result = array('page', $params['page']);
                // array_push($url, $result);
                array_push($url, 'page', $params['page']);
            }
            return $url;
        }
    }
}
