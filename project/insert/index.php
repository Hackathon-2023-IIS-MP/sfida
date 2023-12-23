<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
    include_once 'lang.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . "/class/BL/ClsUtente.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/class/BL/ClsProgetto.php";

    // Insert the project if the user pressed the insert button
    if( isset($_POST["inserisci"]) ){
        $insertResult = ClsProgettoBL::insertProject($_POST["name"], $_POST["description"], $_POST["mainImage"]);

        $insertError = var_dump($insertResult);

        if( is_null($insertError) )
            header("location: ../view/index.php");
        else
            echo "Errore di inserimento";
    }
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

            <form method="post" name='formRegistrazione' action="index.php" onsubmit="return true">
                <div>
                    <label class="required" name="name" ><?php echo getTranslation($nameLabel) ?></label>
                    <input type="text" class="form-control" name='name' placeholder="<?php echo getTranslation($nameLabel) ?>" isValid="false" required autofocus>
                </div>

                <div>
                    <label class="required" name="description"><?php echo getTranslation($descriptionLabel) ?></label>
                    <textarea class="form-control" name="description" rows="4" cols="60" placeholder="<?php echo getTranslation($descriptionLabel) ?>" isValid="false" required autofocus></textarea>
                </div>

                <div>
                    <label class="required" name="main_image" ><?php echo getTranslation($mainImageLabel) ?></label>
                    <input type="text" class="form-control" name='mainImage' placeholder="<?php echo getTranslation($mainImageLabel) ?>" isValid="false" required autofocus>
                </div>

                <button type="submit" name="inserisci" class="btn btn-primary mx-auto d-block mt-5 px-5"> <?php echo getTranslation($registerBtn) ?></button>
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