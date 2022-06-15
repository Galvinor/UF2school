<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../public/css/a1.css" rel="stylesheet">
    </head>
    <body>

        <header>
            <img class="logo" src="/public/img/empire.png"> 
            <h1>Welcome to the Imperial Academy of Carida</h1>
            <img class="logo" src="/public/img/empire.png">
        </header>
        <aside>

            <ul>
            <?php if(isset($_SESSION['logged'])): ?>
                <li>
                    <a href="#" onclick="window.location.href='/login/logout'">Log out</a>

                </li>
            </ul>
            <?php else: ?>
                <li>
                    <a href="#" onclick="window.location.href='/login'">Login</a>

                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" onclick="window.location.href='/register'">Register</a>

                </li>
            </ul>
            <?php endif;?>
            <ul>
                <?php if(isset($_SESSION['logged'])): ?>
                <li>
                    <a href="#" onclick="window.location.href='/dashboard'">Dashboard</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#" onclick="window.location.href='/manager/index'">Manager</a>
                </li>
            </ul>
            <ul>
                <?php if($_SESSION['role'] == 'admin'): ?>
                <li>
                    <a href="#" onclick="window.location.href='/admin'">Admin Panel</a>
                </li>
                <?php endif;?>
            </ul>
                <?php else: ?>
            <ul>
                <li>
                    <a href="#" onclick="window.location.href='/index'">Home</a>
                </li>
            </ul>
                <?php endif;?>
            

        </aside>
      
        
    