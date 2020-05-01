<?php
    declare(strict_types = 1);

    class Users extends Controller{

        public function __construct()
        {
//            Checking if in the model directory there is a file called User.php
            $this->userModel = $this->model('User');
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
                }else{
//                    Check email to see if it already exists in our users table using.
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = "Email is already in use";
                    }

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

//                Validate confirm_password
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
//                   Hash the password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

//                    Register User with model, will return true or false, using if statement to check
                    if($this->userModel->register($data)){
                        flash('register_success', "You are registered can log in");
                        redirect('users/login');
                    }else{
                        die("Something has gone WRONG!");
                    }

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

//                Sanitize the POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//                Init Data
                $data = [
                    'email'=> trim($_POST['email']),
                    'password'=> trim($_POST['password']),
                    'email_err'=>'',
                    'password_err'=>''
                ];

//                Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = "Please enter email";
                }

//                Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = "Please enter password";
                }

//                Make sure that the errors are empty
                if(empty($data['email_err']) && $data['password_err']){
//                    Validated
                    die('SUCCESS');
                }else{
//                    Load view with errors, remember view is a method that is coming from our parent class Controller
                    $this->view('/users/login', $data);
                }

            }else{
//                Init Data
                $data = ['email'=>'','password'=>'','email_err'=>'','password_err'=>'',];
//                Load view
                $this->view('users/login', $data);

            }
        }
    }