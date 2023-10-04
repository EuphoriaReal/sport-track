<?php
class SqliteConnection {
    private static $instance = null;
    private $connection;

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct() {
        try {
            $this->connection = new PDO('sqlite' . ':' . __DIR__ . '/../db/sport_track.db');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    // Méthode pour obtenir une instance de connexion (singleton)
    public static function getConnection() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->connection;
    }
}
?>