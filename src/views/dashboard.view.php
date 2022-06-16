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
                    <hr>
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
                    <div>
                        <h3>Manage your lists and tasks:</h3><br>
                        <br>
                        <a href="/manager"><button>Management</button></a><br><br><hr><br>
                        <h3>Here are the subjects of your course:</h3><br>
                        <?php 
                            foreach($subjects as $subject) { 
                        
                            if ($course==$subject['course']){?>
                        <tr>
                            <td><?= $subject['subject']; ?></td><td></td><br>
                        </tr>
                    <?php }} ?>

                    </div>
                    
                </div>
                
            </article>
        </section>



        
    </body>
</html>