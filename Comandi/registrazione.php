<?php
    session_start();
    if($_POST['tipo_utente'] == 'cliente'){
        if(empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['eta']) || empty($_POST['peso']) || empty($_POST['altezza']) || empty($_POST['id_trainer'])){
        $_SESSION['error'] = "Bisogna inserire tutti i campi per la registrazione";
        header("Location: ../index.php");
        }else if($_POST['tipo_utente'] == 'trainer'){
            if(empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
                $_SESSION['error'] = "Bisogna inserire tutti i campi per la registrazione";
                header("Location: ../index.php");
            }
        }
    }
    
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $eta = $_POST['eta'];
    $peso = $_POST['peso'];
    $altezza = $_POST['altezza'];
    $cod_trainer = $_POST['id_trainer'];
    try{
        //Prova la chiamata con la variabile "col" passando nome-caratteri-user-password
        $col = new PDO('mysql:host=localhost;dbname=accesso_online;charset=utf8','root','root');
        try{
            $col->beginTransaction();
            $db = new DB($col);
            $db->regAccesso($email, $password, $nome, $cognome, $nick, $datanascita);
            $col->commit();
        }catch(PDOException $error){
            $col->rollback();
            echo $error;
        }
    }catch(PDOException $e){
        echo $e;
    }