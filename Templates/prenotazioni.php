<?php
    if(!isset($_SESSION['login'])){
?>
    <script> location.href = "index.php" </script>
<?php
    }
?>
<main class="container-fluid px-0 position-relative main-profilo" >
    <!-- <img src="Img\bg-img.jpg" class="bg-img position-absolute top-0 start-0"> -->
    <div class="row" style="--bs-gutter-x: 0rem;">
        <div class="col-3 py-3 text-center">
            <img src="Img\bg-img.jpg" class="justify-content-center top-0 start-0 img-profilo" ><br>

        </div>
        <div class="col-7 offset-1 d-flex justify-content-around py-3 ">
            <?php
                if(isset($_SESSION['login']['eta'])){
            ?>
            <div class="container-fluid">
                <div class="row w-100">
                    <h1> Prenotazioni: </h1><br>
                </div>
                <div class="row w-100">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>data: <?php echo $_SESSION['login']['data']?></td>
                                <td>ora: <?php echo $_SESSION['login']['ora']?></td>

                            </tr>
                            <tr>
                                <td>Email: <?php echo $_SESSION['login']['email']?></td>
                                <td>Password: </td>
                            </tr>
                            <tr>
                                <td>Username: <?php echo $_SESSION['login']['username']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row w-100 mt-2">
                    <h1> Fisico </h1><br></div>
                    <div class="row w-100">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Età: <?php echo $_SESSION['login']['eta']?></td>
                                <td>Altezza: <?php echo $_SESSION['login']['altezza']?></td>
                            </tr>
                            <tr>
                                <td>Peso: <?php echo $_SESSION['login']['peso']?></td>
                                <td>Trainer: <?php echo $_SESSION['login']['trainer_id']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    }else{
                ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nome: <?php echo $_SESSION['login']['nome']?></td>
                            <td>Cognome: <?php echo $_SESSION['login']['cognome']?></td>
                        </tr>
                        <tr>
                            <td>Email: <?php echo $_SESSION['login']['email']?></td>
                            <td>Password: </td>
                        </tr>
                        <tr>
                            <td>Username: <?php echo $_SESSION['login']['username']?></td>
                            <td>P.Iva: <?php echo $_SESSION['login']['p.iva']?></td>
                        </tr>
                        <tr>
                            <td>Città: <?php echo $_SESSION['login']['citta']?></td>
                            <td>Indirizzo: <?php echo $_SESSION['login']['indirizzo']?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                    }
                ?>
            </div>
            <br>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="button" class="my-2 btn btn-light btn-mod" name="mod_img"> <i class="fa-solid fa-pencil"></i> Modifica Dati</button>
    </div>
</main>
