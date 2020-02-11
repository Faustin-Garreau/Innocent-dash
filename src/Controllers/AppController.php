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
                    'firstname' => ['requires', 'alpha'],
                ]);
        
                if ($this->validator->errors()) {
                    $_SESSION["errors"] = $this->validator->errors();
                    $this->redirect('/dashboard/nouveau');
                }
        
                $titre = $this->manager->find($_POST["title"]);
        
                if ($titre) {
                    $_SESSION["errors"]["title"] == "Ce titre est déja utilisé";
                    $this->redirect('/dashboard/nouveau');
                }
        
                $this->manager->store();
                $this->redirect('/dashboard/'. $_POST["title"]);
            }
        
        
    }