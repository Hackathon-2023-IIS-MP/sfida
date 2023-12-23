<?php
    class ClsProgettoDB{
        // Attributi
        private $_id;
        private $_nome;
        private $_descrizione;
        private $_immagine_principale;

        // Costruttore
        function __construct(){

        }

        // Metodi
        public function setId($id){
            if($id >= 0)
                $this->_id = $id;
            else
                throw new Exception("L'ID di un progetto non può essere minore di 0.");
        }
        public function getId(){
            return $this->_id;
        }

        public function setNome($nome){
            $nome = trim($nome);

            if(!is_null($nome))
                $this->_nome = $nome;
            else
                throw new Exception("Il nome di un progetto non può essere vuoto.");
        }
        public function getNome(){
            return $this->_nome;
        }

        public function setDescrizione($descrizione){
            $descrizione = trim($descrizione);

            if(!is_null($descrizione))
                $this->_descrizione = $descrizione;
            else
                throw new Exception("La descrizione di un progetto non può essere vuoto.");
        }
        public function getDescrizione(){
            return $this->_descrizione;
        }

        public function setImmaginePrincipale($immagine_principale){
            $immagine_principale = trim($immagine_principale);

            if(!is_null($immagine_principale))
                $this->_immagine_principale = $immagine_principale;
            else
                throw new Exception("Il link all'immagine di un progetto non può essere vuoto.");
        }
        public function getImmaginePrincipale(){
            return $this->_immagine_principale;
        }
    }
?>