<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/components/mysql.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/class/DB/ClsUtente.php";


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
                    $user = new clsUtenteDB($result[0]["nome"], $result[0]["cognome"], $result[0]["data_nas"], $result[0]["genere"], $result[0]["citta_residenza"], $result[0]["email"], $result[0]["password"], $result[0]["numero_telefono"], $result[0]["username"]);

                    if (isset($result[0]["istituto_id"]))
                        $user->setIdIstituto($result[0]["istituto_id"]);

                    return $user;
                }
                else
                    return false;
            }
        }

        public static function createUser($nome, $cognome, $dataNascita, $genere, $citta_residenza, $email, $password, $telefono, $username) {

            $params = array(
                ucfirst($nome),
                ucfirst($cognome), 
                $dataNascita,
                $genere,
                $citta_residenza,
                strtolower($email), 
                hash("md5", $password),
                $telefono,
                $username);
            $error = "";

            $result = executeQuery("INSERT INTO utenti (nome, cognome, data_nas, genere, citta_residenza, email, password, numero_telefono, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", $params, $error);

            // return $error;

            if ($result == false || strpos($error, "Duplicate entry") !== false)
                return false;
            else
                return new clsUtenteDB($nome, $cognome, $dataNascita, $genere, $citta_residenza, $email, $password, $telefono, $username);


        }

        public static function updateUser($nome, $cognome, $password, $int1, $int2, $int3)
{
    // Create an associative array for easy handling of fields
    $fields = array(
        'nome' => ucfirst($nome),
        'cognome' => ucfirst($cognome),
        'password' => hash("md5", $password),
        'int1' => $int1,
        'int2' => $int2,
        'int3' => $int3
    );

    // Filter out empty fields
    $nonEmptyFields = array_filter($fields, function ($value) {
        return !empty($value);
    });

    // If there are no non-empty fields, return false or handle accordingly
    if (empty($nonEmptyFields)) {
        return false;
    }

    // Construct the SET part of the query
    $setClause = implode(', ', array_map(function ($key) {
        return "$key = ?";
    }, array_keys($nonEmptyFields)));

    // Construct the parameter array for the query
    $params = array_values($nonEmptyFields);

    // Add the email as a parameter
    $params[] = $_COOKIE["email"];

    // Construct the full query
    $query = "UPDATE utenti SET $setClause WHERE email = ?";

    // Execute the query
    $error = "";
    $result = executeQuery($query, $params, $error);

    // Handle the result as needed
    if ($result === false || strpos($error, "Duplicate entry") !== false) {
        return false;
    } else {
        // Return something meaningful based on your implementation
        return true;
    }
}



    }

?>
