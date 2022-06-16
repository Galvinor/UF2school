<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
require('src/helpers.php');

class DashboardController extends Controller {
    
    public function index() {
        $user = $_SESSION['user']['username'];
        $course = $_SESSION['user']['course'];

        if(!$user) {
            $this->redirectTo("index");
        }

        $db = Registry::get('database');

        try {
            $statement = $db->query("SELECT listname FROM lists WHERE username = ?");
            $statement->execute([$user]);
            $lists = $statement->fetchAll(\PDO::FETCH_COLUMN, 0);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT taskname, list FROM tasks;");
            $statement->execute([$user]);
            $tasks = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $statement = $db->query("SELECT subject, course FROM subjects;");
            $statement->execute([$user]);
            $subjects = $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
       
        return view('dashboard', ['lists' => $lists, 'tasks' => $tasks, 'course' => $course, 'subjects' => $subjects]);
    }
}