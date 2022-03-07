<?php
	include_once('Comandi/comandi.php');
if(!isset($_SESSION['login'])){
	?>
	<script> location.href = "index.php" </script>
	<?php
}
        try{
            //Collega il DB
            $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','root');
                $db = new DB($col);
				$scheda = $_SESSION['login']['scheda_id'];
                $ris = $db->findIdFromCredenziali($_SESSION['login']['id'], $_SESSION['login']['tipo']);
				$id = $ris[0]['id'];
                $scheda_all = $db->esercizio($scheda, $id);
                // var_dump($scheda_all);
                // die();
        }catch(PDOException $e){
            echo $e;
        }
?>
<main class="container-fluid px-0 position-relative main-profilo" >
	<!-- <img src="Img\bg-img.jpg" class="bg-img position-absolute top-0 start-0"> -->
	<div class="row" style="--bs-gutter-x: 0rem;">
		
		<div class="col-12 offset-1 d-flex justify-content-around py-3 ">
			<div class="container-fluid">
				<div class="row w-100">
					<h1> Prenotazioni: </h1><br>
				</div>
				<div class="row w-100">
                    <?php 
						foreach($scheda_all as $i){
                            echo "Scheda tipo: ";
							echo $i['tipo']." - Durata: ";
							echo $i['durata']." - Riposo: ";
                            echo $i['riposo']." - Sessioni: ";
                            echo $i['sessioni_settimanali']." - Esercizio: ";
                            echo $i['esercizio_cod_esercizio']." - Ripetizioni: ";
                            echo $i['rep_esercizio']."<br>";
						}
					?>
				</div>
			</div>
			<br>
		</div>
	</div>
	<div class="d-flex justify-content-center">
		<button type="button" class="my-2 btn btn-light btn-mod" name="mod_img"> <i class="fa-solid fa-pencil"></i> Prenota</button>
	</div>
</main>
