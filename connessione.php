<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         $db_host = 'localhost';
         $db_user = 'root';
         $db_pass = '';
         $db_name = 'my_spotyfake';
         
         try{
         
         
         $db_conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
         
         if($db_conn == null){
            throw new Exception(mysqli_connect_error(). 'Error n. '   . mysqli_connect_errno());
         }
         
         
         }catch(Exception $e){
             $error_message = $e->getMessage();
         }
         
        ?>
    </body>
</html>
