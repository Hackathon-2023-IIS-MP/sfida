<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/class/DB/ClsCitta.php';

if(isset($_POST["siglaProvincia"])){
    $siglaProvincia = $_POST["siglaProvincia"];
    $cities = ClsCittaDB::getFilterList($siglaProvincia);

    foreach ($cities as $city) {
        echo "<option value='" . $city["id"] . "'>" . $city["nome"] . "</option>";
    }
}
?>