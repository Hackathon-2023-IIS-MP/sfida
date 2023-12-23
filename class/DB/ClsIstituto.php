<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/mysql.php";

class ClsIstitutoDB {

    public static function getList() {
        $res = executeQuery("SELECT * FROM istituti");
        return $res;
    }
    

    // Other methods for querying the database can be added here
}
?>