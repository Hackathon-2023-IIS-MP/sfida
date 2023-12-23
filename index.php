<?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include $root . '/inc/Head.php'; ?>
</head>
<body class="d-flex flex-column vh-100 bg-body-tertiary">
    <!-- Include navbar -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Navbar.php" ?>

    <!-- Content div -->
    <div id="home-jumbotron" class="p-5 text-center bg-body-secondary">
        <div class="container py-5">
            <h1 class="text-body-emphasis"><b>Connect & innovate</b></h1>
            <p class="col-lg-8 mx-auto lead">
                Uniamo progetti e idee in un'unica dimensione.
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

    <div class="container my-5">
        <?php
            if (isset($_COOKIE["email"]))
                echo "Welcome " . $_COOKIE["email"] . " <a href='/auth/logout/'>Logout</a>";
            else
                echo "You are not logged in";
        ?>
        
    </div>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>

</html>