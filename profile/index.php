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

    <!-- Content div -->
    <div class="mb-auto mt-5 ms-3 ms-lg-5 pt-4">

        <div class="container px-5 py-4 col-12" style="background-color: #e8e8e8; border-radius: 8px;">
            <h1 class="text-center">Il mio profilo</h1>

            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Nome</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php echo $user->getNome() ?>"   style="max-width: 300px;">
            </div>
            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Cognome</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php echo $user->getCognome() ?>"   style="max-width: 300px;">
            </div>
            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Email</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php echo $user->getEmail() ?>" disabled  style="max-width: 300px;">
            </div>

            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Password</label>
                <input type="password" class="form-control" name='formInput_email' isValid="false" placeholder="password"   style="max-width: 300px;">
                <input type="submit" class="form-control" name='formInput_email' isValid="false" value="Cambia"   style="max-width: 150px;">
            </div>
            
            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Data di nascita</label>
                <input type="date" class="form-control" name='formInput_email' isValid="false" value="<?php echo $user->getDataNascita() ?>" disabled  style="max-width: 300px;">
            </div>

            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Genere</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php
                
                if ($user->getGenere() == "m") {
                    echo "Maschio";
                } else if ($user->getGenere() == "f") {
                    echo "Femmina";
                } else {
                    echo "Non specificato";
                }

                ?>" disabled  style="max-width: 300px;">

            </div>

            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Numero di telefono</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php echo $user->getTelefono() ?>" disabled  style="max-width: 300px;">
            </div>

            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Città di residenza</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php echo ClsCittaBL::getById( $user->getCittaResidenza())[0]["nome"] ?>" disabled  style="max-width: 300px;">
            </div>

            <div class="form-group mt-3 inline-form" style="display: flex; align-items: center; gap: 10px;">
                <label for="formInput_email ">Istituto</label>
                <input type="email" class="form-control" name='formInput_email' isValid="false" value="<?php echo clsIstitutoBL::getById($user->getIdIstituto())[0]["nome"] ?>" disabled  style="max-width: 300px;">
        </div>

    </div>

    <!-- Include footer -->
    <?php include_once $root . "/inc/Footer.php" ?>
</body>

</html>