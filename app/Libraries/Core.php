<?php

/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());

        $url = $this->getUrl();
        unset($url[0]);

        // Look in BLL for first value
        if (isset($url[1]) && file_exists('../app/Controllers/' . ucwords($url[1]) . '.php')) {

            // If exists, set as controller
            $this->currentController = ucwords($url[1]);

            // Unset 0 Index
            unset($url[1]);
        }

        // Require the controller
        require_once '../app/Controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if (isset($url[2])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[2])) {
                $this->currentMethod = $url[2];
                // Unset 1 index
                unset($url[2]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {

        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        } else {
            return array("pages", "index");
        }
    }
}


