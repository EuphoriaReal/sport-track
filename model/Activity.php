<?php
class Activity {
    private $idActivity;
    private $date;
    private $description;
    private $duree;
    private $distance;
    private $minCardioFrequency;
    private $maxCardioFrequency;
    private $moyCardioFrequency;
    private $unMail;

    public function __construct() {
        // Constructeur sans paramètres
    }

    // Getters et setters pour les attributs
    public function getIdActivity() {
        return $this->idActivity;
    }

    public function setIdActivity($idActivity) {
        $this->idActivity = $idActivity;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description= $description;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date= $date;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function setDuree($duree) {
        $this->duree= $duree;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function setDistance($distance) {
        $this->distance= $distance;
    }

    public function getMinCardioFrequency() {
        return $this->minCardioFrequency;
    }

    public function setMinCardioFrequency($minCardioFrequency) {
        $this->minCardioFrequency= $minCardioFrequency;
    }

    public function getMaxCardioFrequency() {
        return $this->maxCardioFrequency;
    }

    public function setMaxCardioFrequency($maxCardioFrequency) {
        $this->maxCardioFrequency= $maxCardioFrequency;
    }

    public function getMoyCardioFrequency() {
        return $this->moyCardioFrequency;
    }

    public function setMoyCardioFrequency($moyCardioFrequency) {
        $this->moyCardioFrequency= $moyCardioFrequency;
    }

    public function getUnMail() {
        return $this->unMail;
    }

    public function setUnMail($unMail) {
        $this->unMail= $unMail;
    }

    public function init($idActivity, $date, $description,  $duree, $minCardioFrequency, $maxCardioFrequency, $moyCardioFrequency, $distance, $unMail) {
        // Vérifier l'année de la date dans le format aaaa-mm-jj
        $annee = substr($date, 0, 4);

        if ($annee >= 2023 && $annee <= 2033) {
            $this->idActivity = $idActivity;
            $this->description = $description;
            $this->date = $date;
            $this->duree = $duree;
            
            // Vérifier la distance
            if ($distance >= 0 && $distance <= 10000) {
                $this->distance = $distance;
            } else {
                throw new InvalidArgumentException("La distance doit être comprise entre 0 et 10000 km.");
            }
            
            // Vérifier les fréquences cardiaques
            if ($minCardioFrequency >= 0 && $minCardioFrequency <= 250 &&
                $maxCardioFrequency >= 0 && $maxCardioFrequency <= 250 &&
                $moyCardioFrequency >= 0 && $moyCardioFrequency <= 250) {
                $this->minCardioFrequency = $minCardioFrequency;
                $this->maxCardioFrequency = $maxCardioFrequency;
                $this->moyCardioFrequency = $moyCardioFrequency;
            } else {
                throw new InvalidArgumentException("Les fréquences cardiaques doivent être comprises entre 0 et 250.");
            }
            
            // Assurez-vous que l'adresse email est valide
            if (filter_var($unMail, FILTER_VALIDATE_EMAIL)) {
                $this->unMail = $unMail;
            } else {
                throw new InvalidArgumentException("L'adresse email n'est pas valide.");
            }
        } else {
            throw new InvalidArgumentException("L'année de la date doit être comprise entre 2023 et 2033.");
        }
    }
}
?>