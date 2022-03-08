<?php
    session_start();
    include_once("comandi.php");
    if(isset($_SESSION["login"])){
        if(empty($_POST['giorno']) || empty($_POST['lezione'])){
        $_SESSION['error'] = "Bisogna inserire tutti i campi per la registrazione";
        header("Location: ../index.php");
        }
        //Dichiaro le variabili per il cliente
        $giorno = $_POST['giorno'];
        $lezione = $_POST['lezione'];
        
        try{
            //Collega il DB
            $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','password');
    
                $db = new DB($col);
                $db-> conferma_prenotaz($giorno, $lezione, $_SESSION['login']['id'], $_SESSION['login']['tipo']);
                header("Location: ../index.php?action=tab");
        }catch(PDOException $e){
            echo $e;
        }
    }else{
        header("Location: ../index.php");
    }