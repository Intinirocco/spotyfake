<?php
session_start();
include 'connessione.php';
?>

<?php
?>


<!DOCTYPE html> 
<html lang="it">
    <head>
        <title>
            Inserimento Canzone
        </title>
        <meta charset ="UTF-8">   
        <style>
            body{
                background-image: url(https://wallpapermemory.com/uploads/627/red-background-hd-1920x1080-445407.jpg);
                background-size: cover;
                color: white;
            }
        </style>

    </head>

    <body>
<?php
if (!isset($error_message)) {
    if (isset($_POST["inserisci"]) && isset($_FILES['my_audio'])) {
        $titolo = ucwords(strtolower(trim(($_POST['txtTitolo']))));
        $autore = ucwords(strtolower(trim(($_POST['txtAutore']))));
        $genere = strtolower(trim(($_POST['txtGenere'])));

        $audio_name = $_FILES['my_audio']['name'];
        $tmp_name = $_FILES['my_audio']['tmp_name'];
        $error = $_FILES['my_audio']['error'];

        if ($error === 0) {
            $audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);

            $audio_ex_lc = strtolower($audio_ex);

            $allowed_exs = array("mp3", "m4a");

            if (in_array($audio_ex_lc, $allowed_exs)) {

                $new_audio_name = uniqid("audio-", true) . '.' . $audio_ex_lc;
                $audio_upload_path = 'uploads/' . $new_audio_name;
                move_uploaded_file($tmp_name, $audio_upload_path);
            } else {
                $em = "non puoi inserire questo tipo di file";
                header("Location: insCanzone.php?error=$em");
            }
        } else {
            header("Location: home.php");
        }

        $query = "INSERT INTO canzone (genere, titolo, autore, url) VALUES('$genere', '$titolo', '$autore', '$new_audio_name')";
        $insert = mysqli_query($db_conn, $query);
        echo $insert;
        if ($insert != null) {
            $message = "canzone inserita con successo";
        } else {
            $message = "canzone gia esistente";
        }

        echo $message;
    } else {
        ?>

                <form name="insCanzone" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <table>
                        <tr>
                            <th>
                                Titolo
                            </th>
                            <th>
                                <input placeholder="inserisci il titolo" name="txtTitolo" type="text" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Autore
                            </th>
                            <th>
                                <input placeholder="inserisci l'Autore" name="txtAutore" type="text" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Genere
                            </th>
                            <th>
                                <input placeholder="inserisci il genere" name="txtGenere" type="text" required>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Inserisci la canzone
                            </th>
                            <th>
                                <input type="file" name="my_audio" required>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <button type="submit" name="inserisci" value="inserisci">Invia</button>
                                <button type="button" name="annulla" value="annulla" onclick="javascript:location.reload()">Annulla</button>
                            </th>

                        </tr>

                    </table>
                </form>
        <?php
    }
} else {
    echo $error_message;
}
?>


    </body>




</html>
