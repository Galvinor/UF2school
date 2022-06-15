<?php
require('partials/header.view.php');
?>



        <div class="breadcrumb">
            <div><a href="/index">Home</a></div>/<div><a href="/dashboard">Dashboard</a></div>/<div><a href="/createlist">List Creation</a></div>
        </div>
        <br>

        <main>
            <form action="?url=createlist_action" method="post">
                <label for="list">Create your tasklist to serve the emperor</label> <input type="text" name="list" placeholder="">
                <button type="submit">Create</button>
            </form>

            
        </main>