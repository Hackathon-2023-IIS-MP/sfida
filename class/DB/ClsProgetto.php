<?php
    class ClsProgettoDB{
        // Attributi
        private $_id;
        private $_nome;

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
    }
?>