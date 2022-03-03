<?php
    session_start();
    include_once("comandi.php");
    if($_POST['tipo_utente'] == 'cliente'){
        if(empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['eta']) || empty($_POST['peso']) || empty($_POST['altezza']) || empty($_POST['id_trainer'])){
        $_SESSION['error'] = "Bisogna inserire tutti i campi per la registrazione";
        header("Location: ../index.php");
        }
        //Dichiaro le variabili per il cliente
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
            //Collega il DB
            $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','root');
    
                $db = new DB($col);
                $db->registrazione_cliente($nome, $cognome, $user, $email, $password, $eta, $peso, $altezza, $cod_trainer);
        }catch(PDOException $e){
            echo $e;
        }
    }else if($_POST['tipo_utente'] == 'trainer'){
        if(empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
            $_SESSION['error'] = "Bisogna inserire tutti i campi per la registrazione";
            header("Location: ../index.php");
        }
        //Dichiaro le variabili per il trainer
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $user = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $p_iva = $_POST['piva'];
        $citta = $_POST['citta'];
        $indirizzo = $_POST['indirizzo'];
        try{
            //Collega il DB
            $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','root');
            
                $db = new DB($col);
                $db->registrazione_trainer($nome, $cognome, $user, $email, $password, $p_iva, $citta, $indirizzo);
        }catch(PDOException $e){
            echo $e;
        }
    }
    $_SESSION['success'] = "Registrazione avvenuta con successo!";
    header("Location: ../index.php");
    
    