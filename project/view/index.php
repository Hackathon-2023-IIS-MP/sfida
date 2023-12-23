<?php
    // Initial setup
    include $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';

    // Require Project class
    require_once $root . "/class/DB/ClsProgetto.php";
    require_once $root . "/class/BL/ClsProgetto.php";
    
    // Verify if there's a project to show
    if( isset($_SESSION["projectToShow"]) ){
        // Get the project
        $project = ClsProgettoBL::getProjectById( $_SESSION["projectToShow"] );

        // Get the subjects of the project
        $subjectsOfProject = ClsProgettoBL::getSubjectsOfProject( $_SESSION["projectToShow"] );

        // Get people potentially interested in the project
        ClsProgettoBL::getInterestedPeopleToProject( $subjectsOfProject );
    }
    else
        die("Errore: Il progetto richiesto non esiste.");
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
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid" src=" <?php echo $project->getImmaginePrincipale() ?> ">
            </div>
            <div class="col-sm-8">
                <h2> <?php echo $project->getNome() ?> </h2>
                <p> <?php echo $project->getDescrizione() ?></p>
            </div>
        </div>
    </div>

    <!-- Include footer -->
    <?php include_once $root . "/inc/Footer.php" ?>
</body>
</html>