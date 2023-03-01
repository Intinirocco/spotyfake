
<?php
session_start();
include './connessione.php';
?>


<!DOCTYPE html> 
<html lang="it">
    <head>
        <title>
            Registrazione
        </title>
        <meta charset ="UTF-8">    
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
                width: 600px;
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

            #registrati{
                transform: translateY(100%);
                font-size: larger;
                text-align: center;
            }

            #btnRegister{
                margin-left: 25px;
                height: 40px;
                transform: translate(60%, 300%);

                color: white;
                width: 250px;
                border-radius: 20px;
                background-color: red;
                font-size: medium;
            }

            #registerIn{
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

            #login{
                text-align: center;
                font-size: small;
                transform: translateY(800%);
            }

            a{
                text-decoration: none;
                color: white;
            }

        </style>
    </head>

    <body>
        <?php
        $message = "";
        if (!isset($error_message)){
            if (isset($_POST["registrati"])) {
                $nome = ucwords(strtolower(trim(($_POST['nome']))));
                $cognome = ucwords(strtolower(trim(($_POST['cognome']))));
                $nazionalita = strtolower(trim(($_POST['nazionalita'])));
                $password = strtolower((trim($_POST['password'])));
                $mail = $_POST['email'];

                $result = mysqli_query($db_conn, "SELECT * FROM utente WHERE mail='$mail'");
                $row = mysqli_fetch_array($result);
                if(empty($row)){
                    $query = "INSERT INTO utente (nome, cognome, nazionalita, mail, password) VALUES('$nome', '$cognome', '$nazionalita', '$mail', '$password')";
                    $insert = mysqli_query($db_conn, $query);
                    
                    if ($insert != null) {
                        $message = "utente inserito con successo";
                        header("Location: home.php");
                    }
                }
                
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form">
                    <div id="registrati">
                        <span>Registrati</span>
                    </div>
                    <div>
                        <input type="text" name="nome" placeholder="nome" id="registerIn" required>
                    </div>
                    <div style="float: right; margin-top: -65px">
                        <input type="text" name="cognome" placeholder="cognome" id="registerIn" required>
                    </div>
                    <div>
                        <input type="text" name="nazionalita" placeholder="nazionalità" id="registerIn" required>
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="indirizzo email" id="registerIn" required>
                    </div>
                    <div style="float: right; margin-top: -65px">
                        <input type="password" name="password" placeholder="password" id="registerIn" required>
                    </div>
                    <div>
                        <button type="submit" name="registrati" id="btnRegister">Conferma</button>
                    </div>
                    <div id="login">
                        <span>Hai già un account?</span>
                    </div>
                    <div id="login">
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </form>

            <?php
        } else {
            echo $error_message;

            header("refresh:3; registrazione.php");
        }
        ?>


    </body>
</html>



<?php
    session_abort();
?>