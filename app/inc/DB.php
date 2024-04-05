<?php
// Identifiants de connexion
$serverName     = 'jo-db';     // Cf. docker-compose pour avoir le nom du container mysql
$database       = 'jo';          // Cf. fichier d'environnement pour les variables
$username       = 'sio';
$password       = 'azertysio-01';

class DB{
    private $serverName;
    private $database;
    private $username;
    private $password;
    private $conn;

    public function __construct($serverName, $database, $username, $password)
    {
        $this->serverName = $serverName;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie au serveur de base de données !";
        } catch (PDOException $e) {
            echo "Erreur de connexion au serveur de base de données : " . $e->getMessage();
        }
    }

    public function getConn(){
        return $this->conn;
    }
}