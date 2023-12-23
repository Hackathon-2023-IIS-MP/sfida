<!-- Initial php setup -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
include_once $root . '/class/BL/ClsUtente.php';
include_once $root . '/class/BL/ClsIstituto.php';
include_once $root . '/class/BL/ClsCitta.php';
// include_once 'lang.php';

// Load user informations
if (isset($_COOKIE["email"])) {
    // Get the user
    $user = clsUtenteBL::getUser($_COOKIE["email"]);

    // ...
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <!-- Include default headers -->
    <?php include $root . '/inc/Head.php'; ?>
</head>

<body class="d-flex flex-column vh-100">
    <!-- Include navbar -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Navbar.php" ?>

    <!-- Content div -->
    <div class="mb-auto mt-5 ms-3 ms-lg-5 pt-4">
    <form action="/ws/UpdateUser.php" method="POST">

        <div class="container px-5 py-4 col-12">
            <h1 class="text-center">Il mio profilo</h1>

            <div class="mb-3">
                <label for="formInput_nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name='nome' value="<?php echo $user->getNome() ?>">
            </div>

            <div class="mb-3">
                <label for="formInput_cognome" class="form-label">Cognome</label>
                <input type="text" class="form-control" name='cognome' value="<?php echo $user->getCognome() ?>">
            </div>

            <div class="mb-3">
                <label for="formInput_email" class="form-label">Email</label>
                <input type="email" class="form-control" name='formInput_email' value="<?php echo $user->getEmail() ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formInput_password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name='password' placeholder="Nuova password">
                    <button type="submit" class="btn btn-secondary">Cambia</button>
                </div>
            </div>

            <div class="mb-3">
                <label for="formInput_dataNascita" class="form-label">Data di nascita</label>
                <input type="date" class="form-control" name='formInput_dataNascita'  value="<?php echo $user->getDataNascita() ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formInput_genere" class="form-label">Genere</label>
                <input type="text" class="form-control" name='formInput_genere' value="<?php
                    if ($user->getGenere() == "m") {
                        echo "Maschio";
                    } else if ($user->getGenere() == "f") {
                        echo "Femmina";
                    } else {
                        echo "Non specificato";
                    }
                ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formInput_telefono" class="form-label">Numero di telefono</label>
                <input type="text" class="form-control" name='formInput_telefono' value="<?php echo $user->getTelefono() ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formInput_cittaResidenza" class="form-label">Città di residenza</label>
                <input type="text" class="form-control" name='formInput_cittaResidenza' value="<?php echo ClsCittaBL::getById($user->getCittaResidenza())[0]["nome"] ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formInput_istituto" class="form-label">Istituto</label>
                <input type="text" class="form-control" name='formInput_istituto' value="<?php echo clsIstitutoBL::getById($user->getIdIstituto())[0]["nome"] ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="formInput_interesse1" class="form-label">Interesse 1</label>
                <input type="text" class="form-control" name='int1'>
            </div>

            <div class="mb-3">
                <label for="formInput_interesse2" class="form-label">Interesse 2</label>
                <input type="text" class="form-control" name='int2'>
            </div>

            <div class="mb-3">
                <label for="formInput_interesse3" class="form-label">Interesse 3</label>
                <input type="text" class="form-control" name='int3'>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


        </form>
    </div>

    <!-- Include footer -->
    <?php include_once $root . "/inc/Footer.php" ?>
</body>



</html>