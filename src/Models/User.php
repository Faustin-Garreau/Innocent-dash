<?php 

namespace App\Models;

class User{
    private $id;
    private $username;
    private $password;

    public function getPseudo(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getId(){
        return $this->username;
    }
    public function setPseudo(){

    }
    public function setPassword(){
        
    }
}