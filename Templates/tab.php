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
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        pag 1
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        pag 2
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        pag 3
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