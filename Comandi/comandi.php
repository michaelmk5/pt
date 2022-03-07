<?php

class DB
{
	public $pdo; //Collegamento con il DB

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findByEmail($user)
	{
		$sql = "SELECT * FROM credenziali WHERE username = :user";
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('user', $user, PDO::PARAM_STR);
		$stm->execute();
		$res = $stm->fetchAll();
		return $res;
	}

	public function profilo($user)
	{
		$var = $this->findByEmail($user);
<<<<<<< HEAD
		$sql = "SELECT * FROM clienti, credenziali  WHERE  credenziali.username = :utente";
=======
		$sql = "SELECT * FROM clienti INNER JOIN credenziali ON credenziali_id = credenziali.id WHERE  credenziali.username = :utente";
>>>>>>> 2b667e297de74da549666cec83371a23a5d335b2
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('utente', $var[0]['username'], PDO::PARAM_STR);
		$stm->execute();
		$ris = $stm->fetchAll();
		if (!empty($ris)) {
			return $ris;
		} else {
<<<<<<< HEAD
			$sql = "SELECT * FROM trainer, credenziali  WHERE  credenziali.username = :utente";
=======
			$sql = "SELECT * FROM trainer INNER JOIN credenziali ON credenziali_id = credenziali.id WHERE  credenziali.username = :utente";
>>>>>>> 2b667e297de74da549666cec83371a23a5d335b2
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam('utente', $var[0]['username'], PDO::PARAM_STR);
			$stm->execute();
			$ris = $stm->fetchAll();
			return $ris;
		}
	}

	public function registrazione_cliente($nome, $cognome, $user, $email, $password, $eta, $peso, $altezza, $cod_trainer)
	{
		$sql = "INSERT INTO clienti SET nome = :nome, cognome = :cognome, email = :email, peso = :peso, eta = :eta, altezza = :altezza, trainer_id = :trainer_id, credenziali_id = :id;";
<<<<<<< HEAD
		$sql2 = "INSERT INTO credenziali SET username = :username, password = :password tipo = 0;";
=======
		$sql2 = "INSERT INTO credenziali SET username = :username, password = :password;";
>>>>>>> 2b667e297de74da549666cec83371a23a5d335b2
		try {
			$this->pdo->beginTransaction();
			$stm2 = $this->pdo->prepare($sql2);
			$stm2->bindParam('username', $user, PDO::PARAM_STR);
			$stm2->bindParam('password', $password, PDO::PARAM_STR);
			$stm2->execute();
			$last_id = $this->pdo->lastInsertId();
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam('id', $last_id, PDO::PARAM_INT);
			$stm->bindParam('nome', $nome, PDO::PARAM_STR);
			$stm->bindParam('cognome', $cognome, PDO::PARAM_STR);
			$stm->bindParam('email', $email, PDO::PARAM_STR);
			$stm->bindParam('eta', $eta, PDO::PARAM_INT);
			$stm->bindParam('peso', $peso, PDO::PARAM_INT);
			$stm->bindParam('altezza', $altezza, PDO::PARAM_INT);
			$stm->bindParam('trainer_id', $cod_trainer, PDO::PARAM_INT);
			$stm->execute();

			$this->pdo->commit();
		} catch (PDOException $error) {
			$this->pdo->rollback();
		}
	}

	public function registrazione_trainer($nome, $cognome, $user, $email, $password, $p_iva, $citta, $indirizzo)
	{
		$sql = "INSERT INTO trainer SET nome = :nome, cognome = :cognome, email = :email, piva = :piva, citta = :citta, indirizzo = :indirizzo, credenziali_id = :id";
<<<<<<< HEAD
		$sql2 = "INSERT INTO credenziali SET username = :username, password = :password, tipo = 1;";
=======
		$sql2 = "INSERT INTO credenziali SET username = :username, password = :password;";
>>>>>>> 2b667e297de74da549666cec83371a23a5d335b2
		try {
			$this->pdo->beginTransaction();
			$stm2 = $this->pdo->prepare($sql2);
			$stm2->bindParam('username', $user, PDO::PARAM_STR);
			$stm2->bindParam('password', $password, PDO::PARAM_STR);
			$stm2->execute();
			$last_id = $this->pdo->lastInsertId();
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam('id', $last_id, PDO::PARAM_INT);
			$stm->bindParam('nome', $nome, PDO::PARAM_STR);
			$stm->bindParam('cognome', $cognome, PDO::PARAM_STR);
			$stm->bindParam('email', $email, PDO::PARAM_STR);
			$stm->bindParam('piva', $p_iva, PDO::PARAM_STR);
			$stm->bindParam('citta', $citta, PDO::PARAM_STR);
			$stm->bindParam('indirizzo', $indirizzo, PDO::PARAM_STR);
			$stm->execute();

			$this->pdo->commit();
		} catch (PDOException $error) {
			$this->pdo->rollback();
			echo $error;
		}

	}
<<<<<<< HEAD
	public function findIdFromCredenziali($id, $tipo){
		if($tipo == 0){
			$sql = "SELECT id FROM clienti WHERE credenziali_id = :id;";
		}else{
			$sql = "SELECT id FROM trainer WHERE credenziali_id = :id;";
		}
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('id', $id, PDO::PARAM_INT);
		$stm->execute();
		$ris = $stm->fetchAll();
		return $ris;
	}

	public function sel_prenotazioni($id, $tipo)
	{
		if($tipo == 0){
			$sql = "SELECT * FROM prenotazioni WHERE cliente_id = :id ORDER BY data_ora;";
		}else{
			$sql = "SELECT * FROM prenotazioni WHERE trainer_id = :id ORDER BY data_ora;";
		}
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('id', $id, PDO::PARAM_INT);
		$stm->execute();
		$ris = $stm->fetchAll();
		return $ris;
	}

	public function scheda_allenamento($scheda, $id){
		$sql = "SELECT * FROM scheda INNER JOIN clienti ON scheda.id = clienti.scheda_id WHERE clienti.scheda_id = :scheda AND clienti.id = :id;";
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('scheda', $scheda, PDO::PARAM_INT);
		$stm->bindParam('id', $id, PDO::PARAM_INT);
		$stm->execute();
		$ris = $stm->fetchAll();
		return $ris;
	}

	public function esercizio($scheda, $id){
		$scheda = $this->scheda_allenamento($scheda, $id);
		$id_scheda = $scheda[0]['id'];
		$sql = "SELECT * FROM scheda_esercizio INNER JOIN scheda ON scheda.id = scheda_id WHERE scheda_esercizio.scheda_id = :id;";
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('id', $id_scheda, PDO::PARAM_INT);
		$stm->execute();
		$ris = $stm->fetchAll();
		return $ris;

	}
}
=======

	public function sel_prenotazioni($id)
	{
		$var = $this->sel_prenotazioni($user);
		$sql = "SELECT * FROM cliente INNER JOIN prenotazioni ON cliente_id = cliente.id WHERE  prenotazioni.cliente_id = :utente";
		$stm = $this->pdo->prepare($sql);
		$stm->bindParam('utente', $var[0]['cliente_id'], PDO::PARAM_STR);
		$stm->execute();
		$ris = $stm->fetchAll();
		if (!empty($ris)) {
			return $ris;
		} else {
			$sql = "SELECT * FROM trainer INNER JOIN prenotazioni ON trainer_id = trainer.id WHERE  prenotazioni.trainer_id = :utente";
			$stm = $this->pdo->prepare($sql);
			$stm->bindParam('utente', $var[0]['trainer_id'], PDO::PARAM_STR);
			$stm->execute();
			$ris = $stm->fetchAll();
			return $ris;
		}
	}
>>>>>>> 2b667e297de74da549666cec83371a23a5d335b2
