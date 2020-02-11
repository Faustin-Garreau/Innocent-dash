<?php 

namespace App\Models;

class User{
    private $id;
    private $username;
    private $password;

    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getId(){
        return $this->username;
    }
    public function setUsername(){

    }
    public function setPassword(){
        
    }
}