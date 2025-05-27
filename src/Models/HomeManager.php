<?php
namespace App\Models;

use App\Models\Home;
/** Class HomeManager **/
class HomeManager {

    private $bdd;

    //----------------------------------------------------
    private $id_posts; // Define the property explicitly
    //----------------------------------------------------
    
    public function __construct($id_posts = null) {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        //-----------------------------
        $this->id_posts = $id_posts;
        //-----------------------------
    }

    public function getBdd() {
        return $this->bdd;
    }

    public function all() {
        $stmt = $this->bdd->query('SELECT * FROM posts');

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "App\Models\Home");
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $_FILES['image']['name'] ?? '';
            $description = $_POST['description'] ?? '';

            // Validate inputs
            if (empty($image) || empty($description)) {
                throw new \Exception("Ce champ est requis !");
            }

            // Move uploaded file to the desired directory
            $uploadDir = dirname(__DIR__, 2) . '/public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $targetFile = $uploadDir . basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

            // Insert into database
            $stmt = $this->bdd->prepare('INSERT INTO posts (id_user, description, image) VALUES (1, :description, :image)');
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
        }
    }
}