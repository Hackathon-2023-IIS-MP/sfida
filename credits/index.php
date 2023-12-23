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
        </div>
    </nav>

    <!-- Content div -->
    <div id="home-jumbotron" class="p-5 text-center bg-body-secondary d-flex flex-column vh-100">
        <h1>Credits</h1>
    </div>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>

</html>