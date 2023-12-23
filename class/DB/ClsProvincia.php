<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/mysql.php";

class ClsProvinciaDB {

    public static function getList() {
        
        $res = executeQuery("SELECT * FROM province");

        $list = array();

        return $res;
    }


    

    // Other methods for querying the database can be added here
}
?>