<?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include $root . '/inc/Head.php'; ?>
</head>
<body class="d-flex flex-column vh-100 bg-body-tertiary">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">bynd</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="#">Su di noi</a>
                    <a class="nav-link" href="#">Scopri</a>
                </div>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php if (isset($_COOKIE["email"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/profile/" id="profileLink">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/auth/logout/" id="logOutLink">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/auth/login/" id="signInLink">Login</a>
                        </li>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </nav>

    <!-- Content div -->
    <div id="home-jumbotron" class="p-5 text-center bg-body-secondary">
        <div class="container py-5">
            <h1 class="text-body-emphasis"><b>Inserire motto</b></h1>
            <p class="col-lg-8 mx-auto lead">
                Breve testo introduttivo per <b>motivare l'utente ad iscriversi</b>.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="d-inline-flex gap-2 mb-5">
                <a class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" href="/auth/register/">
                    Registrati ora
                </a>
                <a class="btn btn-outline-secondary btn-lg px-4 rounded-pill" href="#">
                    ...o scopri di più
                </a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <!-- CONTENT GOES HERE -->
        

        <?php
            if (isset($_COOKIE["email"]))
                echo "Welcome " . $_COOKIE["email"] . " <a href='/auth/logout/'>Logout</a>";
            else
                echo "You are not logged in";
        ?>

        <ul>
            <li>
                <a href="/auth/login/">login</a>
            </li>
            <li>
                <a href="/auth/register/">register</a>
            </li>
            <li>
                <a href="/project/insert/index.php">insert product</a>
            </li>
        </ul>
        
    </div>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>

</html>