<?php
    declare(strict_types = 1);
    class Users extends Controller{

        public function __construct()
        {
        }

        public function register(){
//            Will load form and when the form is submitted ie POST request is what we are checking for.
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
//                Process the form

//                Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//                Init Data
                $data = [
                    'name'=> trim($_POST['name']),
                    'email'=> trim($_POST['email']),
                    'password'=> trim($_POST['password']),
                    'confirm_password'=> trim($_POST['confirm_password']),
                    'name_err'=>'',
                    'email_err'=>'',
                    'password_err'=>'',
                    'confirm_password_err'=>''
                ];

//                Validate Email
//                first checking to see if email is empty
                if(empty($data['email'])){
                    $data['email_err'] = "Please enter email";
                }

//                Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = "Please enter name";
                }

//                Validate password
                if(empty($data['password'])){
                    $data['password_err'] = "Please enter password";
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = "Password must be at least six characters";
                }

//                Vaidate confirm_password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = "Please enter password";
                }else{
                    if($data['confirm_password'] !== $data['password']){
                        $data['confirm_password_err'] = "Password must match";
                    }
                }

//                Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
//                    Validated
                    die("SUCCESS");
                }else{
//                    Load view with errors
                $this->view('users/register', $data);
                }


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