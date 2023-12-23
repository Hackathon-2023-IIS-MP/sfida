<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
include_once 'lang.php';
include_once $root . "/class/DB/ClsProvincia.php";
include_once $root . "/class/DB/ClsIstituto.php";

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <?php include $root . '/inc/Head.php'; ?>
</head>

<body class="d-flex flex-column vh-100">

    <!-- Content div -->
    <div class="mb-auto mt-5 ms-3 ms-lg-5 pt-3">

        <div class="container px-5 py-4" style="max-width: 500px; background-color: #e8e8e8; border-radius: 8px;">
            <h2 class="text-center mb-3"><?php echo getTranslation($title) ?></h2>

            <form method="post" name='formRegistrazione' action="register.php" onsubmit="return controllaForm()">

                <!-- GRUPPO -->
                <div class="row">
                    <!-- Nome -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_nome" class="required"><?php echo getTranslation($nameLabel) ?></label>
                        <input type="text" class="form-control" name='formInput_nome' placeholder="<?php echo getTranslation($nameLabel) ?>" isValid="false" required autofocus>
                    </div>
                    <!-- Cognome -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_cognome" class="required"><?php echo getTranslation($surnameLabel) ?></label>
                        <input type="text" class="form-control" name='formInput_cognome' isValid="false" placeholder="<?php echo getTranslation($surnameLabel) ?>" required>
                    </div>
                </div>

                <div class="row ">
                    <!-- Data di nascita -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_dataNascita" class="required"><?php echo getTranslation($birthayLabel) ?></label>
                        <input type="date" class="form-control" name='formInput_dataNascita' isValid="false" placeholder="<?php echo getTranslation($birthayLabel) ?>" required>
                    </div>
                    <!-- Genere -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_genre" class="required"><?php echo getTranslation($genreLabel) ?></label>
                        <select name="formInput_genre" class="form-select" aria-label="Default select example">
                            <option value="na" selected disabled><?php echo getTranslation($label_unselected) ?></option>
                            <option value="m"><?php echo getTranslation($genreLabel_male) ?></option>
                            <option value="f"><?php echo getTranslation($genreLabel_female) ?></option>
                            <option value="a"><?php echo getTranslation($genreLabel_other) ?></option>
                        </select>
                    </div>
                </div>



                <div class="row ">
                    <!-- Provincia -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_provincia" class="required"><?php echo getTranslation($provinceLabel) ?></label>
                        <select name="formInput_provincia" id="provincia" class="form-select" aria-label="Default select example">
                            <option selected disabled><?php echo getTranslation($label_unselected) ?></option>
                            <?php 
                                foreach ( ClsProvinciaDB::getList() as $provincia) {
                                     echo "<option value='" . $provincia["sigla"] . "'>" . $provincia["sigla"] . " (" . $provincia["nome"] .")" . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Città -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_citta" class="required"><?php echo getTranslation($cityLabel) ?></label>
                        <select id="citta" name="formInput_citta" class="form-select" aria-label="Default select example">
                            <option selected disabled><?php echo getTranslation($label_unselected) ?></option>
                            <!------ POPOLA DA AJAX ------>
                        </select>
                    </div>
                </div>

                <!-- ISTITUTO -->
                <div class="form-group mt-2">
                    <label for="formInput_institute" class="required"><?php echo getTranslation($instituteLabel) ?></label>
                    <select name="formInput_institute" class="form-select" aria-label="Default select example">
                        <option selected disabled><?php echo getTranslation($label_unselected) ?></option>
                        <?php 
                                foreach ( ClsIstitutoDB::getList() as $istituto) {
                                     echo "<option value='" . $istituto["id"] . "'>" . $istituto["nome"] . "</option>";
                                }
                            ?>
                    </select>
                </div>

                <!-- Telefono -->
                <div class="form-group ">
                    <label for="formInput_genre" class="required mt-2"><?php echo getTranslation($phoneLabel) ?></label>
                    <input type="tel" class="form-control" name='formInput_telefono' isValid="false" placeholder="<?php echo getTranslation($phoneLabel) ?>" required>
                </div>




                <!-- Email -->
                <div class="form-group mt-2">
                    <label for="formInput_email" class="required">Email</label>
                    <input type="email" class="form-control" name='formInput_email' isValid="false" placeholder="Email" required>
                </div>

                <!-- GRUPPO -->
                <div class="row">
                    <!-- Password -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_password" class="required"><?php echo getTranslation($passwordLabel) ?></label>
                        <input type="password" class="form-control" name='formInput_password' isValid="false" placeholder="<?php echo getTranslation($passwordLabel) ?>" required>
                    </div>

                    <!-- Conferma password -->
                    <div class="form-group col-md-6 mt-2">
                        <label for="formInput_confermaPassword" class="required"><?php echo getTranslation($confirmPasswordLabel) ?></label>
                        <input type="password" class="form-control" name='formInput_confermaPassword' isValid="false" placeholder="<?php echo getTranslation($confirmPasswordLabel) ?>" data-parsley-equalto="#formInput_password" required>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary mx-auto d-block mt-5 px-5"><?php echo getTranslation($registerBtn) ?></button>
                <p class="text-end m-0 mt-2"><?php echo getTranslation($otherwise1) ?> <a href="/auth/login"><?php echo getTranslation($otherwise2) ?></a></p>
            </form>
        </div>


    </div>

    <!-- Include footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Footer.php" ?>
</body>
<style>
    .required:after {
        content: " *";
        color: red;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('#provincia').change(function(){
        var provincia_id = $(this).val();
        if(provincia_id != ""){
            $.ajax({
                url:"/ws/getCitta.php",
                method:"POST",
                data:{siglaProvincia:provincia_id},
                success:function(data){
                    console.log(data)
                    $('#citta').html(data);
                }
            });
        }else{
            $('#citta').html('<option value="">Seleziona Città</option>');
        }
    });
});
</script>

</html>