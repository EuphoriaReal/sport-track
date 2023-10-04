<?php
require_once 'SqliteConnection.php'; // Inclure la classe de connexion à la base de données
require_once 'Activity.php'; // Inclure la classe Activity

class ActivityDAO {
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

    public function createActivity(Activity $activity) {
        $stmt = $this->connection->prepare("INSERT INTO activity (idActivity, date, description,  duree,  minCardioFrequency, maxCardioFrequency, moyCardioFrequency,distance, unMail) VALUES (:idActivity, :date, :description,  :duree,  :minCardioFrequency, :maxCardioFrequency, :moyCardioFrequency, :distance,:unMail)");
        $stmt->bindValue(':idActivity', $activity->getIdActivity());
        $stmt->bindValue(':description', $activity->getDescription());
        $stmt->bindValue(':date', $activity->getDate());
        $stmt->bindValue(':duree', $activity->getDuree());
        $stmt->bindValue(':minCardioFrequency', $activity->getMinCardioFrequency());
        $stmt->bindValue(':maxCardioFrequency', $activity->getMaxCardioFrequency());
        $stmt->bindValue(':moyCardioFrequency', $activity->getMoyCardioFrequency());
        $stmt->bindValue(':distance', $activity->getDistance());
        $stmt->bindValue(':unMail', $activity->getUnMail());
        return $stmt->execute();
    }

    public function updateActivity(Activity $activity) {
        $stmt = $this->connection->prepare("UPDATE activity SET idActivity = :idActivity, date = :date, description = :description,  duree = :duree,  minCardioFrequency = :minCardioFrequency, maxCardioFrequency = :maxCardioFrequency, moyCardioFrequency = :moyCardioFrequency, distance = :distance, unMail = :unMail WHERE idActivity = :idActivity");
        $stmt->bindValue(':idActivity', $activity->getIdActivity());
        $stmt->bindValue(':description', $activity->getDescription());
        $stmt->bindValue(':date', $activity->getDate());
        $stmt->bindValue(':duree', $activity->getDuree());
        $stmt->bindValue(':minCardioFrequency', $activity->getMinCardioFrequency());
        $stmt->bindValue(':maxCardioFrequency', $activity->getMaxCardioFrequency());
        $stmt->bindValue(':moyCardioFrequency', $activity->getMoyCardioFrequency());
        $stmt->bindValue(':distance', $activity->getDistance());
        $stmt->bindValue(':unMail', $activity->getUnMail());
        return $stmt->execute();
    }

    public function deleteActivity($idActivity) {
        $stmt = $this->connection->prepare("DELETE FROM activity WHERE idActivity = :idActivity");
        $stmt->bindValue(':idActivity', $idActivity);
        return $stmt->execute();
    }

    public function getActivityById($idActivity) {
        $stmt = $this->connection->prepare("SELECT * FROM activity WHERE idActivity = :idActivity");
        $stmt->bindValue(':idActivity', $idActivity);
        $stmt->execute();
        return $stmt->fetchObject('Activity');
    }

    public function getAllActivities() {
        $stmt = $this->connection->prepare("SELECT * FROM activity");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');
    }

    public function getAllActivitiesByUser($unMail) {
        $stmt = $this->connection->prepare("SELECT * FROM activity WHERE unMail = :unMail");
        $stmt->bindValue(':unMail', $unMail);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Activity');
    }

    public function getNbActivitiesByUser($unMail) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM activity WHERE unMail = :unMail");
        $stmt->bindValue(':unMail', $unMail);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getNbActivities() {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM activity");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getNbActivitiesByDate($date) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM activity WHERE date = :date");
        $stmt->bindValue(':date', $date);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getNbActivitiesByDateAndUser($date, $unMail) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM activity WHERE date = :date AND unMail = :unMail");
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':unMail', $unMail);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getNbActivitiesByMonth($month) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM activity WHERE strftime('%m', date) = :month");
        $stmt->bindValue(':month', $month);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getNbActivitiesByMonthAndUser($month, $unMail) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM activity WHERE strftime('%m', date) = :month AND unMail = :unMail");
        $stmt->bindValue(':month', $month);
        $stmt->bindValue(':unMail', $unMail);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>