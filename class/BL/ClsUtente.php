<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/components/mysql.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/class/DB/Utente.php";


    class clsUtenteBL {


        public static function getUser($email, &$error = null) {

            $params = array(strtolower($email));
            $error = "";

            $result = executeQuery("SELECT * FROM utenti WHERE email = ?", $params, $error);
            
            if ($result == false)
                return false;
            else
            {
                if (count($result) == 1)
                {
                    // $nome, $cognome, $dataNascita, $genere, $citta_residenza, $email, $password
                    $user = new clsUtenteDB($result[0]["nome"], $result[0]["cognome"], $result[0]["data_nas"], $result["genere"], $result["citta_residenza"], $result[0]["email"], $result[0]["password"]);

                    if (isset($result[0]["id_istituto"]))
                        $user->setIdIstituto($result[0]["id_istituto"]);

                    return $user;
                }
                else
                    return false;
            }
        }

        public static function createUser($nome, $cognome, $dataNascita, $genere, $citta_residenza, $email, $password) {

            $params = array(
                ucfirst($nome),
                ucfirst($cognome), 
                $dataNascita,
                $genere,
                $citta_residenza,
                strtolower($email), 
                hash("md5", $password));
            $error = "";

            $result = executeQuery("INSERT INTO utenti (nome, cognome, dataNascita, email, password) VALUES (?, ?, ?, ?, ?)", $params, $error);

            if ($result == false || strpos($error, "Duplicate entry") !== false)
                return false;
            else
                return new clsUtenteDB($nome, $cognome, $dataNascita, $genere, $citta_residenza, $email, $password);


        }

    }

?>
