<?php
namespace App\Controllers;

use App\Models\HomeManager;
use App\Validator;

class HomeController {
    private $manager;

    public function __construct() {
        $this->manager = new HomeManager();
    }

    public function index() {
        $data = $this->manager->all();
        require VIEWS . 'App/homepage.php';
    }

    public function addPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->manager->add();
                header('Location: /');
                exit;
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        require VIEWS . 'App/addPost.php';
    }
}