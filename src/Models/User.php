<?php 

namespace App\Models;

class User{
    private $id;
    private $pseudo;
    private $password;

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
    public function setPassword(){
        
    }
}