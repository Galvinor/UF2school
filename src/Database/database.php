<?php



function insert($db,$table,$usr,$pass,$email):bool 
    {
       if ($usr!=null and $pass !=null and $email != null){
        $stmt= $db->prepare("INSERT INTO $table(userame,passwd,email) VALUES (?,?,?)");
            $stmt->bindParam(1,$usr);
            $stmt->bindParam(2,password_hash($pass,PASSWORD_BCRYPT));
            $stmt->bindParam(3,$email);
            $stmt->execute([$usr,password_hash($pass,PASSWORD_BCRYPT),$email]);
            
            
            return true;
            }
            return false;
        }

function insertList($db, $table, $username, $list) {

    if ($list!=null){
        $stmt= $db->prepare("INSERT INTO $table(username,listname) VALUES (?,?)");
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$list);
            $stmt->execute([$username,$list]);
            
            
            return true;
            }
            return false;


}

function insertTask($db, $table, $task, $list) {

    if ($list!=null){
        $stmt= $db->prepare("INSERT INTO $table(taskname,list) VALUES (?,?)");
            $stmt->bindParam(1,$task);
            $stmt->bindParam(2,$list);
            $stmt->execute([$task,$list]);
            
            
            return true;
            }
            return false;


}

function showList($db,$uname){
    $stmt=$db->prepare('SELECT * FROM LISTS WHERE username=:username ');
    $stmt->execute([':username'=>$uname]);
    $count=$stmt->rowCount();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['userlists']=$count;

    
    if($count>=1){    
        foreach($row as $fila){
            for ($i=0;$i<$count;$i++) {
                echo $fila[$i][1];
                
            }
        }   
    }
}

function showTask($db,$ulist){
    $stmt=$db->prepare('SELECT * FROM TASKS WHERE list=:list ');
    $stmt->execute([':list'=>$ulist]);
    $count=$stmt->rowCount();
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['usertasks']=$count;

    
    if($count>=1){    
        foreach($row as $fila){
            for ($i=0;$i<$count;$i++) {
                echo $fila[$i][0];
                
            }
        }   
    }
}
    