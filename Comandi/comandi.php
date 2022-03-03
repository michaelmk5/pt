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
    }