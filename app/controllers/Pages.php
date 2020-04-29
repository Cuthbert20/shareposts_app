<?php

//    NOTE TO SELF: I think it would be a good idea to create an interface which lays out some rules for my classes such as must include index method, ect.
//    Extending base Controller class in libraries dir
    class Pages extends Controller {
        public function __construct()
        {

        }
        public function index(){
            $data = ['title'=> 'SharePosts', 'description'=> 'Simple social network built on the KnowlMVC PHP framework'];
//            we are passing in an array that we will then have access to in the view ie in the browser
            $this->view('pages/index', $data);

        }
        public function about(){
            $data = ['title'=> 'About Us', 'description'=>'App to share posts with other users'];
            $this->view('pages/about',$data);
        }
    }
