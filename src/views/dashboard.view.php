<?php
require('partials/header.view.php');
?>


        <div class="breadcrumb">
            <div><a href="/index">Home</a></div>/<div><a href="/dashboard">Dashboard</a></div>
        </div>
        <br>
        <section class='dashboard'>
            <h2 id='welcome' >Welcome, recruit <?= $_SESSION['username']??'User';?>!</h2>
            <h3>You're registered in <?= $course;?> course</h3>

            <article class="tasklists">
                <div class="overview"> 
                    <h3>Overview</h3> <br>
                    <hr><br>
                    <h4>Lists</h4><br>
                    <?php foreach($lists as $list) { ?>
                        <tr>
                            <td><?= $list; ?></td><td></td><br>
                        </tr>
                    <?php } ?>
                    <br><h4>Tasks</h4><br>
                    <?php 
                            foreach($tasks as $task) { 
                        foreach($lists as $list) { 
                            if ($list==$task['list']){?>
                        <tr>
                            <td><?= $task['taskname']; ?></td><td></td><br>
                        </tr>
                    <?php }}} ?>
                </div>
                <div class="lists">
                    <div class="card">
                        <h3>Manage your lists and tasks:</h3><br>
                        <hr><br>
                        <a href="/manager"><button>Management</button></a>
                    </div>
                    
                </div>
                
            </article>
        </section>



        
    </body>
</html>