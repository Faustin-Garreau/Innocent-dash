<?php 
    namespace App\Controllers; 
    use App\Models\AppManager;
    use App\Validator;

    class AppController extends Controllers {
            private $manager;
            function __construct()
            {
                $this->manager = new AppManager(); 
                parent::__construct();
            }
        
            public function index()
            {
                $candidate = $this->manager->all();
                require VIEW.'dashboard.php';
            }

            public function create()
            {
                require VIEW.'candide.php';
            }

            public function store() {
                $this->validator->validate([
                    'name' => ['required', 'alpha'],
                    'firstname' => ['required', 'alpha'],
                    'link' => ['required', 'alphaNumDash']
                ]);
        
                if ($this->validator->errors()) {
                    $_SESSION["errors"] = $this->validator->errors();
                    $this->redirect('/dashboard/candidature');
                }
                
                $this->manager->store($user_id);
                $this->redirect('/dashboard/valide');
            }

            public function show($firstname)
            {
                $candidature = $this->manager->find($firstname);
                require VIEW.'show.php';
            }
        
            public function showProfil($user) {
                $profil = $this->manager->find($user);
                require VIEW.'profile.php';
            }
        
            public function profil($firstname) {
                $this->validator->validate([
                    'firstname' => ['required', 'alpha'],
                    'email' => ['required', 'email'],
                    'discord' => ['required', 'alphaNumDash'],
                    'birthday' => ['required', 'alphaNum'],
                ]);

                if ($this->validator->errors()) {
                    $_SESSION["errors"] = $this->validator->errors();
                    $this->redirect('/dashboard/'. $firstname.'/profile');
                }

                $firstname = $this->manager->find($_POST["firstname"]);

                if ($_SESSION["errors"]) {
                    $this->redirect('/dashboard/'. $firstname.'/profile');
                }
                
                $this->manager->store();
                $this->redirect('/dashboard/'. $_POST["firstname"]);
            }

            public function archive()
            {
                $candidate = $this->manager->all();
                require VIEW.'archivedash.php';
            }

            public function showValid()
            {
                require VIEW.'valide.php';
            }
    }