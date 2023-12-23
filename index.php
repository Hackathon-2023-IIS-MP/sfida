<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php'; 
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php
    include $root . '/inc/Head.php';
    include $root . "/class/BL/ClsUtente.php";
    ?>
</head>
<body class="d-flex flex-column vh-100 bg-body-tertiary">
    <!-- Include navbar -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Navbar.php" ?>

    <!-- Content div -->
    <?php
    if (!isset($_COOKIE["email"]))
    {
        echo '
        <div class="p-5 text-center bg-body-secondary shadow-lg">
            <div class="container py-5">
                <h1 class="text-body-emphasis"><b>Connessione ed innovazione.</b></h1>
                <p class="col-lg-8 mx-auto lead">
                    Uniamo progetti e idee in un\'unica dimensione.
                </p>
                <div class="d-inline-flex gap-2 mb-5">
                    <a class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" href="/auth/register/">
                        Registrati ora
                    </a>
                    <a class="btn btn-outline-secondary btn-lg px-4 rounded-pill" href="/auth/login/">
                        Accedi
                    </a>
                </div>
            </div>
        </div>
        ';
    }
    else
    {
        $u = clsUtenteBL::getUser($_COOKIE["email"]);

        echo '
        <div class="container my-3 py-3">
            <h1>Bentornato, <b>' . $u->getNome() . '</b>!</h1>
            <h4>Ecco alcuni progetti che potrebbero interessarti.</h4>

            <div class="form-floating my-3">
                <input type="text" id="searchbar" class="form-control rounded-pill" placeholder="Search...">
                <label for="searchbar">Cerca</label>
            </div>

            <div class="card mb-3 shadow-sm" style="max-width: 480px;">
                <div class="row g-0">
                    <div class="col-md-4" style="background: #0f7;">
                        <img src="" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nome Progetto</h5>
                            <p class="card-text text-body-secondary">
                                Breve descrizione progetto.
                                Breve descrizione progetto.
                                Breve descrizione progetto.
                                Breve descrizione progetto.
                                Breve descrizione progetto.
                            </p>
                            <p class="card-text">
                                <small class="text-body-tertiary">
                                    <img style="width: 24px" class="rounded-pill border border-secondary d-inline-block mx-1 shadow-sm" src="/img/placeholder.png"> Luca Panieracci ·
                                    Aggiornato 3 minuti fa
                                </small>
                            </p>
                        </div>
                        <div class="card-footer p-1 pt-0">
                            <span class="badge bg-secondary">Biologia</span>
                            <span class="badge bg-secondary">Informatica</span>
                            <span class="badge bg-secondary">Economia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    ?>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>

</html>