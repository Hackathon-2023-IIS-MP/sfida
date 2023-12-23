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