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
        
                $name = $this->manager->find($_POST["name"]);
                $firstname = $this->manager->find($_POST["firstname"]);
        
                if ($name && $firstname) {
                    $_SESSION["errors"]["name"] == "Ce nom est déja utilisé";
                    $_SESSION["errors"]["firstname"] == "Ce prénom est déja utilisé";
                    $this->redirect('/dashboard/candidature');
                }
        
                $this->manager->store();
                $this->redirect('/dashboard/'. $_POST["pseudo"]);
            }

            public function show($name)
            {
                $todolist = $this->manager->find($name);
                require VIEW.'show.php';
            }
        
        
    }