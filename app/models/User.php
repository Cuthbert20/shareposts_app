<?php
    class User {
        private $db;

        public function __construct(){
            $this->db = new Database();
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