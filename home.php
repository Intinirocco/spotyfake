<?php
session_start();
?>

<!doctype html>
<html lang="it">
    <head>
        <title>
            Home
        </title>
        <meta charset ="UTF-8">
        <link rel="stylesheet"
              href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <style>
           
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
                text-decoration: none;
                list-style: none;
            }
           
            body{
                background-image: url(https://wallpapercave.com/wp/wp6934543.png);
                width: 100%;
                height: 100%;
            }
           
            header{
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
                background: transparent;
            }
           
           
       
           
            .navbar{
                display: flex;      
            }
           
            .navbar a{
                font-size: 20px;
                padding: 5px 10px;
                margin: 0 5px;
                color: #f5f5f5;
                transition: all .45s ease;
                border-radius: 5px;
            }
            .logo {
             display: flex;
             align-items: center;
             
            }
           
            .logo a{
                color: #fff;
                font-size: 20px;
            }
           
            .navbar a:hover{
                background: #18191A;
            }
           
            .header-btn a{
                padding: 5px 10px;
                color: #fff;
                font-size: 15px;
            }
           
            .header-btn .registrati{
                background: #18191A;
                border: 2px solid transparent;
                border-radius: 5px;
                transition: all .50s ease;
            }
            .header-btn .registrati:hover{
                border: 2px solid #18191A;
                background: transparent;
            }
           
            #menu-icon{
                font-size: 30px;
                z-index: 10001;
                color: white;
                cursor: pointer;
                display: none;
            }
           
           
           

        </style>
    </head>

    <body>
        <header>
           
            <div class="logo">
                <a href="#"><img src="./image/logo.png" style="width: 50px;height: 50px"></a>
                <a href="#" style="padding-left: 5px">Spotyfake</a>
            </div>
           
            <div class="bx bx-menu" id="menu-icon"></div>
           
            <ul class="navbar">
                <a href="ricerca.php">Ricerca canzone</a>
                <a href="insCanzone.php">Aggiungi canzone</a>
                <a href="insPlaylist.php">Aggiungi playlist</a>
                <a href="playlistStorage.php">Le mie playlist</a>
            </ul>
           
            <div class="header-btn">
                <a href="login.php" class="accedi">Accedi</a>
                <a href="registrazione.php" class="registrati">Registrati</a>
            </div>
        </header>

    </body>


</html>
