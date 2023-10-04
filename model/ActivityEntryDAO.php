<?php
require_once 'SqliteConnection.php'; // Inclure la classe de connexion à la base de données
require_once 'Data.php'; // Inclure la classe Data
require_once 'control/CalculDistance.php';
require_once 'control/CalculDistanceImpl.php';


class ActivityEntryDAO {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = SqliteConnection::getConnection();
        //
        
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }




    public function updateEntry(Data $entry) {
        $stmt = $this->connection->prepare("UPDATE data SET time = :idData, :time, cardioFrequency = :cardioFrequency, latitude = :latitude, longitude = :longitude,  altitude = :altitude WHERE idData = :idData");
        $stmt->bindValue(':idData', $entry->getIdData());
        $stmt->bindValue(':time', $entry->getTime());
        $stmt->bindValue(':latitude', $entry->getLatitude());
        $stmt->bindValue(':longitude', $entry->getLongitude());
        $stmt->bindValue(':cardioFrequency', $entry->getCardioFrequency());
        $stmt->bindValue(':altitude', $entry->getAltitude());
        $stmt->bindValue(':idData', $entry->getIdData());
        return $stmt->execute();
    }

    

    public function getDataById($idData) {
        $stmt = $this->connection->prepare("SELECT * FROM data WHERE idData = :idData");
        $stmt->bindValue(':idData', $idData);
        $stmt->execute();
        return $stmt->fetchObject('Data');
    }

    public function deleteEntry($idData) {
        $stmt = $this->connection->prepare("DELETE FROM data WHERE idData = :idData");
        $stmt->bindValue(':idData', $idData);
        return $stmt->execute();
    }

    public function deleteEntryByActivity($idActivity) {
        $stmt = $this->connection->prepare("DELETE FROM data WHERE idActivity = :idActivity");
        $stmt->bindValue(':idActivity', $idActivity);
        return $stmt->execute();
    }

    public function getEntriesByActivity($idActivity) {
        $stmt = $this->connection->prepare("SELECT * FROM data WHERE idActivity = :idActivity");
        $stmt->bindValue(':idActivity', $idActivity);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Data');
    }

    public function getAllEntries() {
        $stmt = $this->connection->prepare("SELECT * FROM data");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Data');
    }

    public function getNbData() {
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM data");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function addEntry(Data $entry) {
        $stmt = $this->connection->prepare("INSERT INTO data (idData, cardioFrequency, time, latitude, longitude,  altitude, idActivity) VALUES (:idData, :cardioFrequency, :time, :latitude, :longitude,  :altitude, :idActivity)");
        $stmt->bindValue(':idData', $entry->getIdData());
        $stmt->bindValue(':time', $entry->getTime());
        $stmt->bindValue(':latitude', $entry->getLatitude());
        $stmt->bindValue(':longitude', $entry->getLongitude());
        $stmt->bindValue(':cardioFrequency', $entry->getCardioFrequency());
        $stmt->bindValue(':altitude', $entry->getAltitude());
        $stmt->bindValue(':idActivity', $entry->getIdActivity());
    
        $result = $stmt->execute();
    
        // Après avoir inséré une nouvelle entrée, recalculez la distance pour l'activité parente
        if ($result) {
            $activityDAO = ActivityDAO::getInstance();
            $activity = $activityDAO->getActivityById($entry->getIdActivity());
    
            if ($activity) {
                // Récupérez toutes les entrées associées à cette activité
                $entries = $this->getEntriesByActivity($entry->getIdActivity());
    
                // Calculez la nouvelle distance du parcours en utilisant les entrées existantes
                $parcours = [];
                foreach ($entries as $entry) {
                    $parcours[] = [$entry->getLatitude(), $entry->getLongitude()];
                }

                $calc = new CalculDistanceImpl();

                $distance = $calc->calculDistanceTrajet($parcours);
    
                // Mettez à jour la distance dans l'activité parente
                $activity->setDistance($distance);
                $activityDAO->updateActivity($activity);
            }
        }
    
        return $result;
    }
}
?>