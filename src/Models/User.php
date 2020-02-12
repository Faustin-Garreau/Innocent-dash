<?php 

namespace App\Models;
class User {
    private $pseudo;
    private $password;
    private $id;

    public function getPseudo(){
        return $this->pseudo;
=======
        return $this->username;
    }
    public function getPassword(){
        return $this->password;

    }

    public function getId(){
        return $this->id;
    }

    public function setPseudo(){

    public function getPassword(){
        return $this->password;
    }

    public function setUsername($username){
        }

    public function setPassword(String $password){
    }
}