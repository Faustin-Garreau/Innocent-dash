<?php 

namespace App;
use App\Controllers\UserController;
use App\Controllers\AppController;


class Router {
    private $method;
    private $url;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function run() {
        $controllerUser = new UserController();
        $controllerApp = new AppController();

        if ($this->url=='/' && $this->method == 'GET') {
            var_dump('home');
            die();
            $controllerUser->home();
        } 
        else if ($this->url == '/register' && $this->method == 'GET') {
            var_dump('register');
            die();
            $controllerUser->showRegister();
        }
        else if ($this->url == '/register' && $this->method == 'POST') {
            $controllerUser->register();
        }
        else if ($this->url == '/login' && $this->method == 'GET') {
            var_dump('login');
            die();
            $controllerUser->showLogin();
        }
        else if ($this->url == '/login' && $this->method == 'POST') {
            $controllerUser->login();
        }
        else if ($this->url == '/dashboard' && $this->method == 'GET') {
            var_dump('dashboard');
            die();
            $controllerApp->index();
        }
        else if ($this->url == '/dashboard/candidature' && $this->method == 'GET') {
            var_dump('candidate');
            die();
            $controllerApp->create();
        }
        else if ($this->url == '/dashboard/nouveau' && $this->method == 'POST') {
            $controllerApp->store();
        }
        else if (preg_match('#^\/dashboard\/([a-z0-9A-Z-%]+)$#',$this->url, $matches) && $this->method == 'GET'){
            var_dump('show');
            die();
            $controllerApp->show($matches[1]);
        }
        else if (preg_match('#^\/dashboard\/([a-z0-9A-Z-]+)\/delete$#' ,$this->url, $matches) && $this->method == 'GET') {
            var_dump('delete');
            die();
            $controllerApp->delete($matches[1]);
        }
        else if (preg_match('#^\/dashboard\/([a-z0-9A-Z-]+)\/profile$#' ,$this->url, $matches) && $this->method == 'GET') {
            var_dump('profile');
            die();
            $controllerApp->showProfil($matches[1]);
        }
        else if (preg_match('#^\/dashboard\/([a-z0-9A-Z-]+)\/profile$#' ,$this->url, $matches) && $this->method == 'POST') {
            $controllerApp->profil($matches[1]);
        }
    }

}