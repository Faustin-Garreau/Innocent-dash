<?php
namespace App\Models;

class UserManager {
    private $table = 'user';
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=127.0.0.1;dbname='. DATABASE . ';charset=utf8', USER, PASSWORD);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function store(){
        $request = $this->pdo->prepare('INSERT INTO user(pseudo,password,birthday) VALUES(:pseudo,:password,:birthday)');
        $request->execute([
            "pseudo" => $_POST["pseudo"],
            "password" => password_hash($_POST["password"],PASSWORD_DEFAULT),
            "birthday" => $_POST["birthday"]
        ]);
        return $this->pdo->lastInsertId();
    }

    public function find($username){
        $request = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE pseudo = :pseudo');
        $request->execute([
            "pseudo" => $username
        ]);
        $request->setFetchMode(\PDO::FETCH_CLASS, 'App\Models\User');
        return $request->fetch();
    }

    public function findById($id)
    {
        $request = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $request->execute([
            "id" => $id
        ]);
        $request->setFetchMode(\PDO::FETCH_CLASS, 'App\Models\User');
        return $request->fetch();
    }
}