<?php
    class DB{
        public $pdo; //Collegamento con il DB
        public function __construct($pdo){
            $this->pdo = $pdo;
        }
        
        public function findByEmail($user){
            $sql = "SELECT * FROM credenziali WHERE username = :user";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam('user',$user,PDO::PARAM_STR);
            $stm->execute();
            $res = $stm->fetchAll();
            return $res;
        }

        public function profilo($user){
            $var = $this->findByEmail($user);
            $sql = "SELECT * FROM clienti INNER JOIN credenziali ON credenziali_id = credenziali.id WHERE  credenziali.username = :utente";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam('utente',$var[0]['username'],PDO::PARAM_STR);
            $stm->execute();
            $ris = $stm->fetchAll();
            if(!empty($ris)){
                return $ris;
            }else{
                $sql = "SELECT * FROM trainer INNER JOIN credenziali ON credenziali_id = credenziali.id WHERE  credenziali.username = :utente";
                $stm = $this->pdo->prepare($sql);
                $stm->bindParam('utente',$var[0]['username'],PDO::PARAM_STR);
                $stm->execute();
                $ris = $stm->fetchAll();
                return $ris;
            }
        }
        public function registrazione_cliente($nome, $cognome, $user, $email, $password, $eta, $peso, $altezza, $cod_trainer){
            $sql = "INSERT INTO clienti SET nome = :nome, cognome = :cognome, email = :email, peso = :peso, eta = :eta, altezza = :altezza, trainer_id = :trainer_id, credenziali_id = :id;";
            $sql2 = "INSERT INTO credenziali SET username = :username, password = :password;";
            try{
                $this->pdo->beginTransaction();
                $stm2 = $this->pdo->prepare($sql2);
                $stm2->bindParam('username',$user,PDO::PARAM_STR);
                $stm2->bindParam('password',$password,PDO::PARAM_STR);
                $stm2->execute();
                $last_id = $this->pdo->lastInsertId();
                $stm = $this->pdo->prepare($sql);
                $stm->bindParam('id',$last_id,PDO::PARAM_INT);
                $stm->bindParam('nome',$nome,PDO::PARAM_STR);
                $stm->bindParam('cognome',$cognome,PDO::PARAM_STR);
                $stm->bindParam('email',$email,PDO::PARAM_STR);
                $stm->bindParam('eta',$eta,PDO::PARAM_INT);
                $stm->bindParam('peso',$peso,PDO::PARAM_INT);
                $stm->bindParam('altezza',$altezza,PDO::PARAM_INT);
                $stm->bindParam('trainer_id',$cod_trainer,PDO::PARAM_INT);
                $stm->execute();
                
                $this->pdo->commit();
            }catch(PDOException $error){
                $this->pdo->rollback();
            }
        }
        public function registrazione_trainer($nome, $cognome, $user, $email, $password, $p_iva, $citta, $indirizzo){
            $sql = "INSERT INTO trainer SET nome = :nome, cognome = :cognome, email = :email, piva = :piva, citta = :citta, indirizzo = :indirizzo, credenziali_id = :id";
            $sql2 = "INSERT INTO credenziali SET username = :username, password = :password;";
            try{
                $this->pdo->beginTransaction();
                $stm2 = $this->pdo->prepare($sql2);
                $stm2->bindParam('username',$user,PDO::PARAM_STR);
                $stm2->bindParam('password',$password,PDO::PARAM_STR);
                $stm2->execute();
                $last_id = $this->pdo->lastInsertId(); 
                $stm = $this->pdo->prepare($sql);
                $stm->bindParam('id', $last_id,PDO::PARAM_INT);
                $stm->bindParam('nome',$nome,PDO::PARAM_STR);
                $stm->bindParam('cognome',$cognome,PDO::PARAM_STR);
                $stm->bindParam('email',$email,PDO::PARAM_STR);
                $stm->bindParam('piva',$p_iva,PDO::PARAM_STR);
                $stm->bindParam('citta',$citta,PDO::PARAM_STR);
                $stm->bindParam('indirizzo',$indirizzo,PDO::PARAM_STR);
                $stm->execute();
                
                $this->pdo->commit();
            }catch(PDOException $error){
                $this->pdo->rollback();
                echo $error;
            }
            
        }
    }