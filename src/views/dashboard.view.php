<?php
require('partials/header.view.php');
?>


        <div class="breadcrumb">
            <div><a href="/index">Home</a></div>/<div><a href="/dashboard">Dashboard</a></div>
        </div>
        <br>
        <section class='dashboard'>
            <h2 id='welcome' >Welcome, recruit <?= $_SESSION['username']??'User';?>!</h2>

            <article class="tasklists">
                <div class="overview"> 
                    <h3>Overview</h3> 
                
                </div>
                <div class="lists">
                    <div class="card">
                        <h3>Manage your lists:</h3><br>
                        <a href="/manager"><button>Task Management</button></a>
                    </div>
                    
                </div>
                <div class="tasks">
                    <h3>Tasks</h3>
                    <div>
                    <?= showTask($gdb,$ulist) ?>
                    </div>
                    <br/>
                    <a href="?url=createtask"><button type="submit" id="create_task">Create Task</button></a>
                </div>
            </article>
        </section>



        
    </body>
</html>