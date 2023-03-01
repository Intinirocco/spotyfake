<?php
include 'connessione.php';

$con = 0;
?>

<!DOCTYPE html>
<html lang=""it>
    <head>
        <title>Ricerca canzoni</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
            if (isset($_POST['btnRicerca'])) {
                $ricerca = trim(($_POST['txtRicerca']));

                $query = "SELECT titolo, genere, autore "
                        . "from canzone "
                        . "WHERE titolo LIKE '%$ricerca%' OR"
                        . "autore LIKE '%$ricerca%'";

                $resultset = @mysqli_query($db_conn, $query);
                if (@mysqli_num_rows($resultset) != 0) {
                    ?>
                    <table>
                        <thread>
                            <tr>
                                <th>#</th>
                                <th>Titolo</th>
                                <th>Genere</th>
                                <th>Artista</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
                                $con += 1;
                                $idCanzone = $row["idCanzone"];
                                $titolo = utf8_decode($row["titolo"]);
                                $autore = utf8_decode($row["autore"]);
                                $genere = utf8_decode($row["genere"]);
                                ?>
                                <tr>
                                    <th><?php echo $con ?></th>
                                    <th><?php echo $titolo ?></th>
                                    <th><?php echo $autore ?></th>
                                    <th><?php echo $genere ?></th>
                                </tr>
                                <?php
                            }
                            ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">Torna indietro</a>
        <?php
                
       
        }else{
            $message="Nessuna canzone presente";
                    echo $message;
                    header("refresh:3; index.php");
        }
            
        }else{
         ?>
        <form name="frmRicerca" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <table>
                <tr>
                    <td>Ricerca</td>
                    <td>
                        <input type="text" name="txtRicerca">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                                    <input type="submit" name="btnRicerca" value="Ricerca">
                                    <input type="button" name="btnAnnulla" value="Annulla" onClick="javascript:location.reload()">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        }
        }else{
            echo $error_message;
            header("refresh:3; index.php");
        }
        ?>
    </body>
</html>

