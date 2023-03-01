<?php
    include 'connessione.php';
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
            if (isset($_POST["inserisci"])) {
                $titolo = ucwords(strtolower(trim(($_POST['txtTitolo']))));
                $autore = ucwords(strtolower(trim(($_POST['txtAutore']))));
                $genere = strtolower(trim(($_POST['txtGenere'])));
                $query = "INSERT INTO canzone (genere, titolo, autore) VALUES('$genere', '$titolo', '$autore')";
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
                                <input placeholder="inserisci il titolo" name="txtTitolo" type="text">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Autore
                            </th>
                            <th>
                                <input placeholder="inserisci l'Autore" name="txtAutore" type="text">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Genere
                            </th>
                            <th>
                                <input placeholder="inserisci il genere" name="txtGenere" type="text">
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