<?php 
    namespace App\Controllers; 
    use App\Models\UserManager;
    use App\Validator;

        class UserController extends Controllers  {

            function __construct()
            {
                $this->manager = new UserManager(); 
                parent::__construct();
            }
            public function register() {
                $this->validator->validate([
                    'username' => ['required', 'alpha', 'min:2'],
                    'password' => ['required', 'alphaNumDash', 'min:6'],
                    'age' => ['required'],
                    'confirm' => ['required']
                ]);

                if ($_POST["age"] < 18) {
                    $_SESSION["errors"]["age"] = "Tu dois être majeur pour te connecter";
                    $this->redirect('/register');
                }
        
                if ($this->validator->errors()) {
                    $_SESSION["errors"] = $this->validator->errors();
                    $this->redirect('/register');
                }
                $user = $this->manager->find($_POST["username"]);

                if ($user) {
                    $_SESSION["errors"]["username"] = "Cet username est déja utilisé";
                    $this->redirect('/register');
                }
                $id = $this->manager->store();
                $_SESSION["user"] = ["username" => $_POST['username'], "id" => $id];
                $this->redirect('/dashboard');
            }
    }