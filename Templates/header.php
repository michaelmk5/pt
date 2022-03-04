<?php
    session_start();
    include_once('modal.php');
    if(isset($_SESSION['login']))
        unset($_SESSION['error']); 
?>
<header>
    <nav class="navbar navbar-dark bg-principal text-light container-fluid">
        <div class="container-fluid">
            <h1>Personal Trainer</h1>
            <div class="navbar-nav flex-row">
				<?php
				if(!isset($_SESSION['login'])){		//se sessione login non è settata

				?>
                <a class="nav-link mx-2" href="index.php">Home</a>
				<?php
				}else{
				?>
				<a class="nav-link mx-2" href="index.php?action=tab">Home</a>
				<?php
				}
				?>
                <a class="nav-link mx-2" href="#">Chi siamo</a>
                <a class="nav-link mx-2" href="#">I nostri trainer</a>
                <a class="nav-link mx-2" href="#">Come funziona?</a>
            </div>
        </div>
        <?php
            if(!isset($_SESSION['login'])){
        ?>

				<div class="d-flex container-fluid justify-content-end">

				<button type="button" id="accedi" class="forma btn-light mx-2" data-bs-toggle="modal" data-bs-target="#accedi_modal"> Accedi </button>
				<button type="button" id="registrati" class="forma btn-light" data-bs-toggle="modal" data-bs-target="#registrati_modal"> Registrati </button>
				</div>

        <?php
            }else if(isset($_SESSION['login'])){
        ?>
		<div class="d-flex container-fluid justify-content-beetween">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="scheda nav-link"  id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>
				<div>
					<button type="button" id="registrati" class="forma btn-light mx-2" onclick="location.href = 'Comandi/logout.php'"> Logout </button>
					<button type="button" id="registrati" class="forma btn-light" onclick="location.href = 'index.php?action=profilo'"> Profilo </button>
				</div>
		</div>
        <?php
            }else if($_GET['action'] == 'profilo'){
        ?>
		<div class="d-flex container-fluid justify-content-end">
        <button type="button" id="registrati" class="forma btn-light mx-2" onclick="location.href = 'Comandi/logout.php'"> Logout </button>
        <button type="button" id="registrati" class="forma btn-light" onclick="location.href = 'index.php?action=tab'"> Home </button>
		</div>
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
                }else if(isset($_SESSION['success'])){
            ?>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success text-dark" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto"> <i class="fa-solid fa-circle-info"></i> Complimenti!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <?php
                            echo $_SESSION['success'];
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
    </nav>
</header>