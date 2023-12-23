<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bynd - Credits</title>

    <!-- Include default headers -->
    <?php include $root . '/inc/Head.php'; ?>

    <!-- Center div -->
    <style>
        #container{
            position:absolute;
            left:50%;
            top:50%;
            transform:translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <!-- Include navbar -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/inc/Navbar.php" ?>

    <div id="container">
        <h1>Credits del progetto:</h1>

        <ul>
            <li>Bartocci Alessandro</li>
            <li>De Luca Yuri</li>
            <li>Filonzi Jacopo</li>
            <li>Piccinini Simone</li>
            <li>Rinaldi Michele</li>
            <li>Sebastianelli Tomas</li>
        </ul>
    </div>
</body>
</html>