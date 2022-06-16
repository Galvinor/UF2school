<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;
require('src/helpers.php');

class ManagerController extends Controller
{

    function index()
    {
        $user = $_SESSION['user']['username'];
        $db=Registry::get('database');
        $tasks = NULL;

        try {
            $stmt = $db->query("SELECT listname FROM lists WHERE username=?");
            $stmt->execute([$user]);
            $lists = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        if (isset ($_POST['listSelection'])) {

            $user = $_SESSION['username'];
            $listName = filter_input(INPUT_POST, 'listSelection');
        
            try {
                $stmt = $db->query("SELECT taskName FROM tasks t1 INNER JOIN lists t2 ON t1.list = t2.listname WHERE listname = ?;");
                $stmt->execute([$listName]);
                $tasks = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
                
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } 
            try {
                $stmt = $db->query("SELECT listname FROM lists WHERE  listname = ?");
                $stmt->execute([$listName]);
                $listId = $stmt->fetchAll();
                $_SESSION['currentList']=$listId[0]['listname'];
        
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } 
        }

    return view('manager', ['lists' => $lists , 'tasks' => $tasks]);
    }

    function taskcreation(){

        if (isset ($_POST['taskname'])) {
    
            $user = $_SESSION['user']['username'];
            $taskname = filter_input(INPUT_POST, 'taskname');
            $currentList = $_SESSION['currentList']; 
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO tasks (list, taskname) VALUES(?,?)");
                $stmt->execute([$currentList, $taskname]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("manager");
        }
    }

    function listcreation() {
        if (isset ($_POST['listname'])) {
            $user = $_SESSION['user']['username'];
            $listName = filter_input(INPUT_POST, 'listname');
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO lists(username, listname) VALUES(?,?)");
                $stmt->execute([$user, $listName]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("manager"); 
        }
    }
}