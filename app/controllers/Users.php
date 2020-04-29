<?php
    declare(strict_types = 1);
    class Users extends Controller{

        public function __construct()
        {
        }

        public function register(){
//            Will load form and when the form is submitted ie POST request is what we are checking for.
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
//                Process the form

            }else{
//                Init Data
                $data = ['name'=>'','email'=>'','password'=>'','confirm_password'=>'','name_err'=>'','email_err'=>'','password_err'=>'','confirm_password_err'=>''];
//                Load view
                $this->view('users/register', $data);

            }
        }

        public function login(){
//            Will load form and when the form is submitted ie POST request is what we are checking for.
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
//                Process the form

            }else{
//                Init Data
                $data = ['email'=>'','password'=>'','email_err'=>'','password_err'=>'',];
//                Load view
                $this->view('users/login', $data);

            }
        }
    }