<?php
    if(!isset($_SESSION['login'])){
       echo "Errore";
?>
    <script> location.href = "../index.php" </script>
<?php
    }
?>
<main class="container-fluid px-0 position-relative main-profilo" >
    <!-- <img src="Img\bg-img.jpg" class="bg-img position-absolute top-0 start-0"> -->
    <div class="row" style="--bs-gutter-x: 0rem;">
        <div class="col-7 offset-1 d-flex justify-content-around py-3 ">
            <?php
                if(isset($_SESSION['login']['eta'])){
            ?>
            <div class="container-fluid">
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="prenotazioni" role="tabpanel" aria-labelledby="prenotazioni-tab">
						<?php
							include 'prenota.php';
						?>
                    </div>
                    <div class="tab-pane fade" id="scheda_allenamento" role="tabpanel" aria-labelledby="profile-tab">
                    <?php
							include 'allenamenti.php';
						?>
                    </div>
                    <div class="tab-pane fade" id="documenti" role="tabpanel" aria-labelledby="document-tab">
                    <?php
							include 'documenti.php';
						?>
                    </div>
                    <div class="tab-pane fade" id="dieta" role="tabpanel" aria-labelledby="dieta-tab">
                    <?php
							include 'dieta.php';
						?>
                    </div>
                </div>
            </div>
            <?php
                }else{echo "Sbagliato";
            ?>
            <div class="container-fluid">
                
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</main>