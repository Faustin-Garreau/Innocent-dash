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
                    'pseudo' => ['required', 'alpha', 'min:2'],
                    'password' => ['required', 'alphaNumDash', 'min:6'],
                    'birthday' => ['required'],
                    'confirm' => ['required']
                ]);

                

                if ($this->validator->errors()) {
                    $_SESSION["errors"] = $this->validator->errors();
                    $_SESSION["old"] = $_POST;
                    $this->redirect('/register');
                }

                if ($_POST["birthday"] < 18) {
                    $_SESSION["errors"]["birthday"] = "Tu dois être majeur pour te connecté";
                    $this->redirect('/register');
                    //$this->redirect('/register');
                }

                if ($_POST["password"] !== $_POST["confirm"]) {
                    $_SESSION["errors"]["confirm"] = "Le confirmation de mot de passe doit etre egale au mot de passe saisie";
                    //$this->redirect('/register');
                }

                if ($_POST["birthday"] < 18) {
                    $_SESSION["errors"]["birthday"] = "Tu dois être majeur pour te connecter";
                    //$this->redirect('/register');
                }
                
                $user = $this->manager->find($_POST["pseudo"]);

                if (!$user && empty($_SESSION['errors'])) {
                    $id = $this->manager->store();
                    $_SESSION["user"] = ["pseudo" => $_POST['pseudo'], "id" => $id];
                    $this->redirect('/dashboard/candidature');
                    
                }
                $_SESSION["errors"]["pseudo"] = "Cet username est déja utilisé";
                $this->redirect('/register');
                
            }

            public function login() {
                $this->validator->validate([
                    'pseudo' => ['required', 'alpha', 'min:2'],
                    'password' => ['required', 'alphaNumDash', 'min:6']
                ]);
        
                if ($this->validator->errors()) {
                    $_SESSION["errors"] = $this->validator->errors();
                    $_SESSION["old"] = $_POST;

                    $this->redirect('/login');
                }
        
                $user = $this->manager->find($_POST["pseudo"]);
        
                if (!$user || ($user && !password_verify($_POST["password"], $user->getPassword()))) {
                    $_SESSION["errors"]["password"] = "Les identifiant ne sont pas bon";
                    $this->redirect('/login');
                
                }
                $_SESSION["user"] = ["pseudo" => $user->getPseudo(), "id" => $user->getId()];
                $this->redirect('/dashboard/candidature');
            }

            public function showRegister() {
                require VIEW .'Auth/register.php';
        }
        
            public function showLogin() {
                require VIEW .'Auth/login.php';
        }

            
        public function home() {
            require VIEW .'index.php';
        }
    }