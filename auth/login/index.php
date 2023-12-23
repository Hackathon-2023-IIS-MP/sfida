<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
    include_once 'lang.php';
    include_once $root . "/class/BL/ClsUtente.php";


    //if called with post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //get email and password
        $email = $_POST["formInput_email"];
        $password = $_POST["formInput_password"];

        //get user from db
        $user = clsUtenteBL::getUser($email, $error);

        //if user exists
        if ($user != false) {

            //if password is correct
            if ($user->comparePassword($password)) {

                //set session variables on cookies
                setcookie("email", $user->getEmail(), time() + (86400 * 30), "/"); // 86400 = 1 day

                //redirect to home
                header("Location: /");
                exit();
            }
            else {
                $error = $wrongPassword;
            }
        }
        else {
            $error = $wrongEmail;
        }
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include $root . '/inc/Head.php'; ?>
</head>
<body class="d-flex flex-column vh-100">
    <!-- Include navbar -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Navbar.php" ?>

    <!-- Content div -->
    <div class="my-3 py-3">

        <div class="container p-4 mt-5" style="max-width: 500px; background-color: #e8e8e8; border-radius: 8px;">
        <!-- TITOLO -->
        <h2 class="text-center mb-4"> <?php echo getTranslation($title); ?></h2>

        <!-- FORM -->
        <form id="form" method="post" name='formLogin' action="index.php" onsubmit="return true">

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