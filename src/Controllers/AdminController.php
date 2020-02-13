<?php
namespace App\Controllers; 
use App\Models\AppManager;

    class AdminController extends Controllers {
            private $manager;
            function __construct()
            {
                if (!isset($_SESSION['user']) || !$_SESSION['user']->getAdmin()) {
                    $this->redirect('/');
                }
                $this->manager = new AppManager(); 
                parent::__construct();
            }

                public function adminDashboard()
            {
                $candidate = $this->manager->all();
                require VIEW.'dashboard.php';
            }

            public function showApplication($firstname)
            {
                $candidature = $this->manager->find($firstname);
                require VIEW.'show.php';
            }

            public function ArchiveApplication()
            {
                $candidate = $this->manager->all();
                require VIEW.'archivedash.php';
            }

            public function DeleteApplication($firstname)
            {
                $this->manager->delete($firstname);
                $this->redirect('/dashboard');
            }

        }