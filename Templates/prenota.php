<?php
	include_once('Comandi/comandi.php');
if(!isset($_SESSION['login'])){
	?>
	<script> location.href = "index.php" </script>
	<?php
}
        try{
            //Collega il DB
            $col = new PDO('mysql:host=localhost;dbname=sito_trainer;charset=utf8','root','password');
                $db = new DB($col);
				$ris = $db->findIdFromCredenziali($_SESSION['login']['id'], $_SESSION['login']['tipo']);
				$id = $ris[0]['id'];
                $pre = $db->sel_prenotazioni($id, $_SESSION['login']['tipo']);
        }catch(PDOException $e){
            echo $e;
        }
?>
<main class="container-fluid px-0 position-relative main-profilo" >
	<!-- <img src="Img\bg-img.jpg" class="bg-img position-absolute top-0 start-0"> -->
	<div class="row" style="--bs-gutter-x: 0rem;">
		
		<div class="col-7 offset-1 d-flex justify-content-around py-3 ">
			<div class="container-fluid">
				<div class="row w-100">
					<h1> Prenotazioni: </h1><br>
				</div>
				<div class="row w-100">
					<?php 
						foreach($pre as $i){
							echo $i['data_ora']." - Durata: ";
							echo $i['durata']. "<br>";
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

