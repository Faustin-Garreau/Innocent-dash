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

    public function store($user_id){
        $request = $this->pdo->prepare('INSERT INTO application(name,firstname,googleDocs,user_id) VALUES(:name,:firstname,:googleDocs,:user_id)');
        $request->execute([
            "name" => $_POST["name"],
            "firstname" => $_POST["firstname"],
            "googleDocs" => $_POST["link"],
            "user_id" => $_SESSION["user"]["id"]
        ]);
        return $this->pdo->lastInsertId();
    }

}
