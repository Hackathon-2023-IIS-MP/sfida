<?php
class clsUtenteDB
{
    //proprietà
    private $nome;
    private $cognome;
    private $username;

    private $dataNascita;
    
    private $genere;
    private $citta_residenza;
    private $telefono;

    private $id_istituto;

    private $email;
    private $password;



    //costruttore
    public function __construct($nome, $cognome, $dataNascita, $genere, $citta_residenza, $email, $password, $telefono, $username)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->dataNascita = $dataNascita;
        $this->email = $email;
        $this->password = $password;
        $this->genere = $genere;
        $this->citta_residenza = $citta_residenza;
        $this->telefono = $telefono;
        $this->username = $username;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    //metodi
    public function getNome()
    {
        return $this->nome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return strtolower($this->username);
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setDataNascita($dataNascita)
    {
        $this->dataNascita = $dataNascita;
    }

    public function getDataNascita()
    {
        return $this->dataNascita;
    }

    public function setGener($genere)
    {
        $this->genere = $genere;
    }

    public function getGenere()
    {
        return $this->genere;
    }

    public function setCittaResidenza($citta_residenza)
    {
        $this->citta_residenza = $citta_residenza;
    }

    public function getCittaResidenza()
    {
        return $this->citta_residenza;
    }

    public function setIdIstituto($id_istituto)
    {
        $this->id_istituto = $id_istituto;
    }

    public function getIdIstituto()
    {
        return $this->id_istituto;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = hash("md5", $password);
    }

    public function comparePassword($passwd)
    {
        return $this->password == hash("md5", $passwd);
    }
}
?>
