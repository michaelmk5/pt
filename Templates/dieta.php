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
                $pre = $db->dieta_prescritta($_SESSION['login']['id'], $_SESSION['login']['tipo']);
                // var_dump($pre);
                // die();
        }catch(PDOException $e){
            echo $e;
        }
?>
<main class="container-fluid px-0 position-relative main-profilo" >
	<!-- <img src="Img\bg-img.jpg" class="bg-img position-absolute top-0 start-0"> -->
	<div class="row" style="--bs-gutter-x: 0rem;">
		
		<div class="col-12  d-flex py-3 ">
			<div class="container-fluid">
				<div class="row w-100">
					<h1> Dieta: </h1><br>
				</div>
				<div class="row w-100">
					 
                        <table>
                            <tr>
                                <th> Descrizione: <?php echo $pre[0]['descrizione'] ?></th>
                            </tr>
                            <tr>
                            <th> Durata: <?php echo $pre[0]['durata'] ?></th>
                            <th> Tipo:  <?php echo $pre[0]['tipo'] ?></th>
                            </tr>
                        </table>
                    </div>
			</div>
			<br>
		</div>
	</div>
	
</main>
