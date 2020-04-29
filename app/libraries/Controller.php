<?php
    /*
     * Base Controller
     * Load the models and views
     */
    declare(strict_types = 1);

    class Controller{
//        Load Model
        public function model($model){
//        Require model file
          require_once "../app/models/" . $model . '.php';

//          Instantiate model that is being passed into the method.
          return new $model();
        }

//        Load View
        protected function view(string $view, $data = []){
//            Check for view file
            if(file_exists("../app/views/" . $view . ".php")){
                require_once "../app/views/" . $view . ".php";
            }else{
                die("View Does not exist");
            }
        }
    }