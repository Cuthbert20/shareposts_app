<?php
    /*
     * App Core Class
     * Creates URL & loads core controllers
     * URL FORMAT - /controllers/method/params
     */
    class Core{
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct()
        {
            // Calling getUrl in the constructor which will of course run every time we create an instance of the Core class.
//            print_r($this->getUrl());
            $url = $this->getUrl();

//            Look in controllers for first value
//            Also we are defining the path/filename as if we were in index.php because that is where the instance of the Core class will be created.
            if(isset($url[0]) && file_exists("../app/controllers/". ucwords($url[0]) . ".php")){
//                if exists, set as controllers
                    $this->currentController = ucwords($url[0]);
//                unset 0 index of $url
                    unset($url[0]);
                }


//            Require the controllers
            require_once "../app/controllers/" . $this->currentController . '.php';

//            Instantiate controllers class
            $this->currentController = new $this->currentController();

//            Check for second part of url param
            if(isset($url[1])){
//                Check to see if method exists in controller using method_exists function ie(very Cool).
                if(method_exists($this->currentController, $url[1])){
//                    if method does exists then we want to set currentMethod property to $url[1]
                    $this->currentMethod = $url[1];

//                    Unset 1 index of $url
                    unset($url[1]);
                }
            }

//            Get params, if no other params then params property will stay an empty array. Using Ternary Operator.
            $this->params = $url ? array_values($url) : [];

//            Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl(){
            // Using $_GET super global to get params from the browser url.
//            echo $_GET['url'];
            if(isset($_GET['url'])){
//                removing forward slash at end of params if one exists using rtrim function
                $url = rtrim($_GET['url'], "/");
//                using filter_var to filter the $url variable so that it won't have any chars that a url shouldn't have
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/", $url);
                return $url;
            }
        }
    }