<?php
    class ClsAziendaDB{
        // Attributi
        private $_id;
        private $_nome;
        private $_descrizione;
        private $_email;
        private $_numero_telefono;

        // Costruttore
        function __construct()
        {
            
        }

        // Proprietà
        public function setId($id){
            if($id >= 0)
                $this->_id = $id;
            else
                throw new Exception("L'ID di un'azienda non può essere minore di 0.");
        }
        public function getId(){
            return $this->_id;
        }

        public function setNome($nome){
            $nome = trim($nome);

            if(!is_null($nome))
                $this->_nome = $nome;
            else
                throw new Exception("Il nome di un'azienda non può essere vuoto.");
        }
        public function getNome(){
            return $this->_nome;
        }

        public function setDescrizione($descrizione){
            $descrizione = trim($descrizione);

            if(!is_null($descrizione))
                $this->_descrizione = $descrizione;
        }
        public function getDescrizione(){
            return $this->_descrizione;
        }

        public function setEmail($email){
            $email = trim($email);

            if( !is_null( $email ) &&
                strlen($email) <= 50 &&
                !( strpos( $email, '@' ) === false ) &&
                strpos( $email, '@' ) != 0 &&
                count( explode("@", $email) ) == 2 &&
                !( strpos( explode( "@", $email)[1] , "." ) === false ) &&
                explode("." , explode( "@", $email)[1])[0] != "" &&
                explode("." , explode( "@", $email)[1])[1] != ""
            )
                $this->_email = $email;
            else
                throw new Exception("Formato e-mail non valido.");
        }
        public function getEmail(){
            return $this->_email;
        }

        public function setNumeroDiTelefono($_numero_telefono){
            $_numero_telefono = trim($_numero_telefono);

            if(!is_null($_numero_telefono))
                $this->_numero_telefono = $_numero_telefono;
        }
        public function getNumeroDiTelefono(){
            return $this->_numero_telefono;
        }
    }
?>