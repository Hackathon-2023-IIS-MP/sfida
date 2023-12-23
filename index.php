<?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include $root . '/inc/Head.php'; ?>
</head>
<body class="d-flex flex-column vh-100">

    <!-- Content div -->
    <div class="mb-auto mt-5 ms-3 ms-lg-5 pt-4">

        <!-- CONTENT GOES HERE -->
        <h1 class="text-center mb-5">Main page</h1>

        <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

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
        </ul>
        
    </div>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>

</html>