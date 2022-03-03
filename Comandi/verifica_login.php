<?php
    session_start();
    require_once("comandi.php");
    $user = $_POST['user'];
    $password = $_POST['password'];
    if(empty($_POST['user']) || empty($_POST['password'])){
            $_SESSION['error'] = "Bisogna inserire tutti i campi per il login";
            header("Location: ../index.php");
        }
    try{
        $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','root');
        $db = new DB($col);
        $res = $db->profilo($user);
        if(!empty($res)){
            //var_dump($res); //Stampa a video il contenuto della variabile passata
            if($res[0]['password'] == $password){
                $_SESSION['login'] = $res[0];
                header("Location: ../index.php?action=tab");
                
            }else{
                $_SESSION['error'] = "Password non corretta";
                header("Location: ../index.php");
            }
        }else{
            $_SESSION['error'] = "Utente non registrato";
            header("Location: ../index.php");
        }
          
    }catch(PDOException $error){
        echo $error;
    }