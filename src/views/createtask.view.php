<?php
require('partials/header.view.php');
?>


        <div class="breadcrumb">
            <div><a href="/index">Home</a></div>/<div><a href="/dashboard">Dashboard</a></div>/<div><a href="/createtask">Task Creation</a></div>
        </div>
        <br>

        <main>
            <form action="?url=createtask_action" method="post">
                <label for="list">Select your list</label>
                <select name="list">
                    <option value=""></option>
                    <option value="list">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select>
                <br/>
                <label for="list">Initialize your Imperial task</label> <input type="text" name="task" placeholder="">
                <button type="submit">Create</button>
            </form>
            
        </main>