<?php
session_start();
include "connessione.php";

if (isset($_POST['mail']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $mail = validate($_POST['mail']);
    $password = validate($_POST['password']);

    if (empty($mail)) {
        header("Location: login.php?error=La mail è obbligatoria");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=La password è obbligatoria");
        exit();
    } else {
        $sql = "SELECT * FROM utente WHERE mail='$mail' AND password='$password'";
        $result = mysqli_query($db_conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['mail'] === $mail && $row['password'] === $password) {
                echo "Login avvenuto con successo";
                $_SESSION['mail'] = $row['mail'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=indirizzo email o password incorretti");
                exit();
            }
        } else {
            header("Location: login.php?error=indirizzo email o password incorretti");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">

        <style>
            body{
                background: url(https://wallpaperaccess.com/full/3159237.jpg);
                background-size: cover;
            }

            .form{
                border: 2px solid crimson;
                background-color: black;
                color: white;
                height: 550px;
                width: 300px;
                position: absolute;
                top: 50%;
                transform: translate(-50%, -50%);
                left: 50%;
                border-radius: 5px;
            }
            
           
            div{
                font-size: larger;
                min-width: 300px;

            }

            #login{
                transform: translateY(100%);
                font-size: larger;
                text-align: center;
            }

            #btnLogin{
                margin-left: 25px;
                height: 40px;
                transform: translateY(400%);
                color: white;
                width: 250px;
                border-radius: 20px;
                background-color: red;
                font-size: medium;
            }

            #loginIn{
                color: white;
                background-color: #2b2d2f;
                width: 250px;
                height: 30px;
                margin-bottom: 30px;
                border-radius: 10px;
                border-color: red;
                margin-left: 25px;
                font-size: medium;
                transform: translateY(250%);
            }

            #registrati{
                text-align: center;
                font-size: x-small;
                transform: translateY(1500%);
            }

            a{
                text-decoration: none;
                color: white;
            }

        </style>
    </head>



    <body>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form">
                <div style="margin-top: 20px" id="login">
                    <span>Login</span>
                </div>

                <br>
                <div >
                    <input id="loginIn" type="email" name="mail" placeholder="mail" required>
                </div>

                <div>
                    <input id="loginIn" type="password" name="password" placeholder="password" required>
                </div>

                <div>     
                    <button type="submit" id="btnLogin">Conferma</button>
                </div>
                <div id="registrati">
                    <span>Non sei registrato?</span>
                </div>
                <div id="registrati">
                    <a href="registrazione.php">Registrati</a>
                </div>
            </div>
        </form>
    </body>

</html>
