<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/Top.php';
include_once $root . '/class/BL/ClsUtente.php';

// Assuming this script handles the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $password = $_POST["password"];
    $int1 = $_POST["int1"];
    $int2 = $_POST["int2"];
    $int3 = $_POST["int3"];

    // Use ClsUtenteBL::GetUser to retrieve user information based on form data
    $result = ClsUtenteBL::GetUser($nome, $cognome, $password, null, null, null);

    // Handle the result as needed
    echo "ciao" . var_dump($result);
}
?>
