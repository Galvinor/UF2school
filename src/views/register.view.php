<?php
require('partials/header.view.php');
?>


        <div class="breadcrumb">
            <div><a href="/index">Home</a></div>/<div><a href="/register">Register</a></div>
        </div>
        
        <h2>Welcome, visitor! You're only one step afar from becoming an imperial cadet</h2>
        
        <main>
            <form action="register/register" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="passwd" placeholder="Password" />
                <input type="email" name="email" placeholder="Email" />
                <select name="course">
                    <option value="Imperial Pilot">Imperial Pilot</option>
                    <option value="Assault Division">Assault Division</option>
                    <option value="Communications">Communications</option>
                </select>
                <select name="usertype">
                    <option value="student">Cadet</option>
                    <option value="teacher">Instructor</option>
                    
                </select>

                <input type="hidden" name="role" value="user"/>
                <input type="submit" value="REGISTER NOW" />


            </form>
            
        </main>
    </body>
</html>