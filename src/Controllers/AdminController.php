<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
require('src/helpers.php');

class AdminController extends Controller {

    public function index() {
        $user = $_SESSION['user']['id'];

        if(!$_SESSION['role'] == 'admin') {
            $this->redirectTo("index");
        }

        $db = Registry::get('database');

        try {
            $statement = $db->query("SELECT id, username, email, role FROM users;");
            $statement->execute([$user]);
            $users = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT id, subject, course FROM subjects;");
            $statement->execute([$user]);
            $subjects = $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        return view('admin', ['users' => $users, 'subjects' => $subjects]);
    }

    public function delete(){
        $db = Registry::get('database');
        $id= filter_input(INPUT_POST, 'delete');
        $statement = $db->query("DELETE FROM users where id=$id;");
        $statement->execute();

        return view('index');
    }

}