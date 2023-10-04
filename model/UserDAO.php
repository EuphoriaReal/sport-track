<?php
require_once 'SqliteConnection.php'; // Inclure la classe de connexion à la base de données
require_once 'User.php'; // Inclure la classe User

class UserDAO {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = SqliteConnection::getConnection();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function createUser(User $user) {
        $stmt = $this->connection->prepare("INSERT INTO user (nom, prenom, dateNaissance, sexe, taille, poids, mail, password) VALUES (:nom, :prenom, :dateNaissance, :sexe, :taille, :poids, :mail, :password)");
        $stmt->bindValue(':nom', $user->getNom());
        $stmt->bindValue(':prenom', $user->getPrenom());
        $stmt->bindValue(':dateNaissance', $user->getDateNaissance());
        $stmt->bindValue(':sexe', $user->getSexe());
        $stmt->bindValue(':taille', $user->getTaille());
        $stmt->bindValue(':poids', $user->getPoids());
        $stmt->bindValue(':mail', $user->getMail());
        $stmt->bindValue(':password', $user->getPassword());
        return $stmt->execute();
    }

    public function updateUser(User $user) {
        $stmt = $this->connection->prepare("UPDATE user SET nom = :nom, prenom = :prenom, dateNaissance = :dateNaissance, sexe = :sexe, taille = :taille, poids = :poids, password = :password WHERE mail = :mail");
        $stmt->bindValue(':nom', $user->getNom());
        $stmt->bindValue(':prenom', $user->getPrenom());
        $stmt->bindValue(':dateNaissance', $user->getDateNaissance());
        $stmt->bindValue(':sexe', $user->getSexe());
        $stmt->bindValue(':taille', $user->getTaille());
        $stmt->bindValue(':poids', $user->getPoids());
        $stmt->bindValue(':mail', $user->getMail());
        $stmt->bindValue(':password', $user->getPassword());
        return $stmt->execute();
    }

    public function deleteUser($mail) {
        $stmt = $this->connection->prepare("DELETE FROM user WHERE mail = :mail");
        $stmt->bindValue(':mail', $mail);
        return $stmt->execute();
    }

    public function getUserByEmail($mail) {
        $stmt = $this->connection->prepare("SELECT * FROM user WHERE mail = :mail");
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        return $stmt->fetchObject('User');
    }

    public function getAllUsers() {
        $stmt = $this->connection->prepare("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }
    
}
?>