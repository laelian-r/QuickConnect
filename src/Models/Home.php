<?php
namespace App\Models;

/** Class Home **/
class Home {
    private $id_user;
    private $id_post;
    private $image;
    private $description;
    private $date;

    public function getIdUser() {
        return $this->id_user;
    }

    public function getIdPost() {
        return $this->id_post;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }


    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function setIdPost($id_post) {
        $this->id_post = $id_post;
    }

    public function setImage(String $image) {
        $this->image = $image;
    }

    public function setDescription(String $description) {
        $this->description = $description;
    }

    public function setDate(Date $date) {
        $this->date = $date;
    }
}