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
        $data = $this->manager->add();
        require VIEWS . 'App/addPost.php';
    }
}