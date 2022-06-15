<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
use App\Database\Connection;
require('src/helpers.php');

class RegisterController extends Controller {

    public function index() {
        return view('register');
    }

    public function register() {

        if(isset($_POST['username']) && isset($_POST['passwd']) && isset($_POST['email']) && isset($_POST['role'])) {
            $user = filter_input(INPUT_POST, 'username');
            $passwd = filter_input(INPUT_POST, 'passwd');
            $role = filter_input(INPUT_POST, 'role');
            $email = filter_input(INPUT_POST, 'email');
            $course = filter_input(INPUT_POST, 'course');
            $usertype = filter_input(INPUT_POST, 'usertype');
            $hashedPasswd = password_hash($passwd, PASSWORD_BCRYPT);

            $db = Registry::get('database');
            try {
                $statement = $db->query("INSERT INTO users(username, password, email, course, role, usertype) VALUES(?, ?, ?, ?, ?, ?)");
                $statement->execute([$user, $hashedPasswd, $email, $course, $role, $usertype]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
            $this->redirectTo("index");
            
        }
    }
}
