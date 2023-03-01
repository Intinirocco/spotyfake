<?php
include 'connessione.php';
?>


<!DOCTYPE html> 
<html lang="it">
    <head>
        <title>
            Inserimento Playlist
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
                $nome = ucwords(strtolower(trim(($_POST['txtNome']))));
                $descrizione = ucwords(strtolower(trim(($_POST['txtDescrizione']))));

                $query = "INSERT INTO playlist (nome, descrizione) VALUES('$nome', '$descrizione')";
                $insert = mysqli_query($db_conn, $query);

                if ($insert != null) {
                    $message = "Playlist creata con successo";
                } else {
                    $message = "Playlist gia esistente";
                }

                echo $message;

            } else {
                ?>

        <form name="insPlaylist" action="#" method="POST">
                    <table>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                <input placeholder="inserisci il nome" name="txtNome" type="text">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Descrizione
                            </th>
                            <th>
                                <input type="text" placeholder="descrizione" name="txtDescrizione">
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2">
                                <button type="submit" name="inserisci" value="inserisci">Inserisci</button>
                                <button type="button" name="annulla" value="annulla" onclick="javascript:history.back()">annulla</button>
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