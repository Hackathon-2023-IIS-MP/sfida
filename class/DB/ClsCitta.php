<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/mysql.php";

class ClsCittaDB {

    public static function getList() {
        
        $res = executeQuery("SELECT * FROM citta");
        return $res;
    }


    public static function getFilterList($provincia) {
        
        $param = array($provincia);
        $res = executeQuery("SELECT * FROM citta WHERE provincia_sigla=?", $param);
        return $res;
    }

    

    // Other methods for querying the database can be added here
}
?>