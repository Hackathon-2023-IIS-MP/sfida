<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
    include_once 'lang.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include $root . '/inc/Head.php'; ?>
</head>
<body class="d-flex flex-column vh-100">

    <!-- Content div -->
    <div class="mb-auto mt-5 ms-3 ms-lg-5 pt-4">

        <div class="container p-4 mt-5" style="max-width: 500px; background-color: #e8e8e8; border-radius: 8px;">
        <!-- TITOLO -->
        <h2 class="text-center mb-4"> <?php echo getTranslation($title); ?></h2>

        <!-- FORM -->
        <form id="form" method="post" name='formLogin' action="authenticate.php" onsubmit="return controllaForm()">

            <!-- Email -->
            <div class="form-group mt-3">
                <label for="formInput_email">Email</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" placeholder="Email" required autofocus>
            </div>

            <!-- Password -->
            <div class="form-group mt-3">
                <label for="formInput_password">Password</label>
                <input type="password" class="form-control" name='formInput_password' isValid="false" placeholder="Password" required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary mx-auto d-block mt-4 px-5"><?php echo getTranslation($loginBtn); ?></button>
            <p class="text-end m-0 mt-3"><?php echo getTranslation($otherwise1); ?> <a href="/auth/register"><?php echo getTranslation($otherwise2); ?></a></p>
        </form>
    </div>


    </div>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>

</html>