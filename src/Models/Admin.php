<?php
namespace App\Models;

class User {
    private $admin;
    private $password;
    private $id;

    public function getAdmin(){
        return $this->admin;
    }

    public function getId(){
        return $this->id;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setUsername($admin){
        }

    public function setPassword(String $password){
    }
}