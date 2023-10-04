<?php
class Data {
    private $idData;
    private $time;
    private $latitude;
    private $longitude;
    private $cardioFrequency;
    private $altitude;
    private $idActivity;

    public function __construct() {
        // Constructeur sans paramètres
    }

    // Getters et setters pour les attributs
    public function getIdData() {
        return $this->idData;
    }

    public function setIdData($idData) {
        $this->idData = $idData;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function getCardioFrequency() {
        return $this->cardioFrequency;
    }

    public function setCardioFrequency($cardioFrequency) {
        $this->cardioFrequency = $cardioFrequency;
    }
    

    public function getLatitude() {
        return $this->latitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    

    public function getAltitude() {
        return $this->altitude;
    }

    public function setAltitude($altitude) {
        $this->altitude = $altitude;
    }

    public function getIdActivity() {
        return $this->idActivity;
    }

    public function setIdActivity($idActivity) {
        $this->idActivity = $idActivity;
    }

    public function init($idData, $time, $cardioFrequency, $latitude, $longitude, $altitude, $idActivity) {
        // Vérifier l'heure (time)
        if (preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $time)) {
            $this->idData = $idData;
            $this->time = $time;
            
            // Vérifier la fréquence cardiaque (cardioFrequency)
            if ($cardioFrequency >= 0 && $cardioFrequency <= 250) {
                $this->cardioFrequency = $cardioFrequency;
                
                // Vérifier la latitude (latitude)
                if ($latitude >= -90 && $latitude <= 90) {
                    $this->latitude = $latitude;
                    
                    // Vérifier la longitude (longitude)
                    if ($longitude >= -180 && $longitude <= 180) {
                        $this->longitude = $longitude;
                        
                        // Vérifier l'altitude (altitude)
                        if ($altitude >= -100 && $altitude <= 10000) {
                            $this->altitude = $altitude;
                            $this->idActivity = $idActivity;
                        } else {
                            throw new InvalidArgumentException("L'altitude doit être comprise entre -100 et 10000.");
                        }
                    } else {
                        throw new InvalidArgumentException("La longitude doit être comprise entre -180 et 180.");
                    }
                } else {
                    throw new InvalidArgumentException("La latitude doit être comprise entre -90 et 90.");
                }
            } else {
                throw new InvalidArgumentException("La fréquence cardiaque doit être comprise entre 0 et 250.");
            }
        } else {
            throw new InvalidArgumentException("L'heure doit être au format HH:MM:SS.");
        }
    }
}
?>