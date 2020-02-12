<?php 
namespace App\Models;

class AppManager {
    private $table = 'application';
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=127.0.0.1;dbname='. DATABASE . ';charset=utf8', USER, PASSWORD);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    public function all(){

    }

    public function find(){
        
    }

    public function store(){
        $request = $this->pdo->prepare('INSERT INTO application(name,firstname,googleDocs) VALUES(:name,:firstname,:googleDocs)');
        $request->execute([
            "name" => $_POST["name"],
            "firstname" => $_POST["firstname"],
            "googleDocs" => $_POST["link"]
        ]);
        return $this->pdo->lastInsertId();
    }

}
