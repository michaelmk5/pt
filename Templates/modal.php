<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<div class="modal fade" id="accedi_modal" tabindex="-1" aria-labelledby="accedi_modallabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="accedi_modallabel">Accedi</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-principal">
                <main >
                    <!-- <img src="Img\bg-login.jpg" class="bg-img position-absolute top-0 start-0"> -->
                    <div class="row" style="--bs-gutter-x: 0rem">
                        <div class="form py-5 px-5 text-center bg-principal d-flex flex-column justify-content-center">
                            <h1 class="text-light"> Accedi </h1>
                            <form action="Comandi/verifica_login.php" method='POST'>
                                <input type="text" placeholder="Username" class="form-control campo my-2 w-100" name="user" required>
                                <input type="password" placeholder="Password" class="form-control campo my-2 w-100" name="password" required>
                                <button type="submit" id="accedi" class="forma btn-light"> Accedi </button>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modale registrazione -->
<div class="modal fade" id="registrati_modal" tabindex="-1" aria-labelledby="registrati_modallabel" aria-hidden="true">
    <script>
        $(document).ready(function(){
            $(".trainer").hide();
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrati_modallabel">Registrati</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-principal">
                <div class="form-check col-5 form-check-inline">
                        <input class="form-check-input" type="radio" name="scelta_utente" id="cliente" value="cliente" checked>
                        <label class="form-check-label" for="cliente">Cliente</label>
                    </div>
                    <div class="form-check col-5 form-check-inline">
                        <input class="form-check-input" type="radio" name="scelta_utente" id="trainer" value="trainer">
                        <label class="form-check-label" for="trainer">Trainer</label>
                    </div>
                    <div class="box cliente">
                        <form class="row g-3" action="Comandi/registrazione.php" method="POST">
                            <input type="hidden" name="tipo_utente" value="cliente">
                        <div>
                            <input type="email" class="form-control my-2" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="username" placeholder="Username" name="username" required>
                        </div>
                        <div>
                            <input type="password" class="form-control my-2" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="nome" placeholder="Nome" name="nome" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="cognome" placeholder="Cognome" name="cognome" required>
                        </div>
                                 
                        <div>
                            <input type="number" class="form-control my-2" id="eta" placeholder="Età" name="eta" required>
                        </div>
                        <div>
                            <input type="number" id="peso"  class="form-control my-2" placeholder="Peso" name="peso" required>
                        </div>
                        <div>
                            <input type="number" id="altezza" class="form-control my-2" placeholder="Altezza"  name="altezza" required>
                        </div>
                        <div>
                            <input type="text" id="id_trainer" class="form-control my-2" placeholder="Codice Trainer" name="id_trainer" required>
                        </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Registrati</button>
                    </div>
                </form>
            </div>
            <div class="box trainer">
                        <form class="row g-3" action="Comandi/registrazione.php" method="POST">
                            <input type="hidden" name="tipo_utente" value="trainer">
                        <div>
                            <input type="email" class="form-control my-2" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="username" placeholder="Username" name="username" required>
                        </div>
                        <div>
                            <input type="password" class="form-control my-2" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="nome" placeholder="Nome" name="nome" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="cognome" placeholder="Cognome" name="cognome" required>
                        </div>
                        <div>
                            <input type="text" class="form-control my-2" id="citta" placeholder="Città" name="citta" required>
                        </div>
                        <div>
                            <input type="text" id="indirizzo"  class="form-control my-2" placeholder="Indirizzo" name="indirizzo" required>
                        </div>
                        <div>
                            <input type="text" id="piva" class="form-control my-2" placeholder="P.Iva"  name="piva" required>
                        </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Registrati</button>
                    </div>
                </form>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>