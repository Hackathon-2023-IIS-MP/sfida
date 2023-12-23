<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/mysql.php";

class ClsCittaBL {

    public static function getById($id) {

        $error = "";
        $params = array($id);
        $res = executeQuery("SELECT * FROM citta WHERE id = ?", $params, $error);
        echo $error;
        return $res;
        
    }
    
    // Other methods for querying the database can be added here
}
?>