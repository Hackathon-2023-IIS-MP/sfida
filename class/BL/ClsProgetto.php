<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/class/DB/ClsProgetto.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/components/mysql.php";

    class ClsProgettoBL{
        // Constructor
        function __construct(){

        }

        // Methods
        public static function getProjectById($id){
            // Verify if the id is valid
            if($id >= 0){
                $error = "";

                // Obtain from DB the desired project
                $params = array($id);
                $query = "SELECT * FROM progetti WHERE id = ?";

                $result = executeQuery($query, $params, $error);

                // Verify if project was found
                if(count($result) == 1){
                    // If yes, create new project object and return it
                    $project = new ClsProgettoDB();

                    $project->setId($result[0]["id"]);
                    $project->setNome($result[0]["nome"]);
                    $project->setDescrizione($result[0]["descrizione"]);
                    $project->setImmaginePrincipale($result[0]["immagine_principale"]);

                    return $project;
                }
                else
                    return null;
            }
            else
                throw new Exception("Errore: Id del progetto specificato non valido.");
        }

        public static function insertProject($nome, $descrizione, $immagine_principale){
            // Messaggio
            $error = "";

            // Insert the project into DB
            $params = array(
                $nome,
                $descrizione,
                $immagine_principale
            );

            $sql = "INSERT INTO progetti (nome, descrizione, immagine_principale) VALUES (?, ?, ?)";

            $insertedRows = executeQuery($sql, $params, $error);

            // Return the result of operation
            return $error;
        }
    }
?>