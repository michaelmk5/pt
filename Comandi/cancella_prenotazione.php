<?php
     try {
        $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','password');
       
        $id = $_POST['cancella'];
        $ris = $col ->query($stampa);
     }catch(PDOException $e){
             echo $e;
     }
?>