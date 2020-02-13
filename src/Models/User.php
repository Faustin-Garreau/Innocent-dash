<?php 

namespace App\Models;


class User {
    private $pseudo;
    private $password;
    private $id;
    private $admin;

    public function getPseudo(){
        return $this->pseudo;
    }
    public function getPassword(){
        return $this->password;
    }

    public function getId(){
        return $this->id;
    }
        
    public function setPseudo(){
        }

    public function getAdmin(){
        return $this->admin;
    }

        public function setUsername($username){
            
        }

        public function setPassword(String $password){


        }
    }