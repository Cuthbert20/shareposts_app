<?php
declare(strict_types = 1);
    class User {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function register(array $data){
//            prepare statement
            $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
//            Bind params
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
//          If we are doing an INSERT, UPDATE, or DELETE we need to run execute which is invoked in Database Class.
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

//        Find user by email, this method will be passed the $email param from the controller.
        public function findUserByEmail($email){
//            calling the query method that is coming from our instance of class Database which was created in our constructor above.
            $this->db->query('SELECT * FROM users WHERE email = :email');

//            bind values using bind method from Database class.
            $this->db->bind(':email', $email);

//            invoking single method from Database Class.
            $row = $this->db->single();

//            Check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }