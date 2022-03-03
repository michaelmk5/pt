<?php
    session_start();
    include_once('modal.php');
    if(isset($_SESSION['login']))
        unset($_SESSION['error']); 
?>
<header>
    <nav class="navbar navbar-dark bg-principal text-light">
        <div class="container-fluid">
            <h1>Personal Trainer</h1>
            <div class="navbar-nav flex-row">
                <a class="nav-link mx-2" href="#">Home</a>
                <a class="nav-link mx-2" href="#">Chi siamo</a>
                <a class="nav-link mx-2" href="#">I nostri trainer</a>
                <a class="nav-link mx-2" href="#">Come funziona?</a>
            </div>
        </div>
        <div class="col d-flex justify-content-end p-2">
            <?php
                if(!isset($_SESSION['login'])){
            ?>
                <button type="button" id="accedi" class="forma btn-light mx-2" data-bs-toggle="modal" data-bs-target="#accedi_modal"> Accedi </button>
                <button type="button" id="registrati" class="forma btn-light" data-bs-toggle="modal" data-bs-target="#registrati_modal"> Registrati </button>
            <?php
            }else{
                ?>
                <button type="button" id="registrati" class="forma btn-light mx-2" onclick="location.href = 'Comandi/logout.php'"> Logout </button>
                <button type="button" id="registrati" class="forma btn-light" onclick="location.href = 'index.php?action=profilo'"> Profilo </button>
            <?php
            }
            ?>
            <div>
            <?php
                if(isset($_SESSION['error'])){
                    ?>
                    
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div id="liveToast" class="toast bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                            <strong class="me-auto"> <i class="fa-solid fa-triangle-exclamation"></i> ERROR!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                            <?php
                                echo $_SESSION['error'];
                            ?>
                            </div>
                        </div>
                        </div>
                        <script>
                        (function(){
                            var toastLiveExample = document.getElementById("liveToast");
                            var toast = new bootstrap.Toast(toastLiveExample);
                            toast.show();
                        })();
                    </script>
                    <?php
                }
            ?>
        </div>

        </div>
    </nav>
</header>