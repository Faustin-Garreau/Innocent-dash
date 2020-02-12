<?php 

namespace App\Models;
class User {
    private $pseudo;
    private $password;
    private $id;

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getId(){
        return $this->id;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setUsername($username){
        }

    public function setPassword(String $password){
    }
}