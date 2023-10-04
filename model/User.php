<?php
class User {
    private $mail;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $sexe;
    private $taille;
    private $poids;
    private $password;

    public function __construct() {
        // Constructeur sans paramètres
    }

    // Getters et setters pour les attributs
    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function getTaille() {
        return $this->taille;
    }

    public function setTaille($taille) {
        $this->taille = $taille;
    }

    public function getPoids() {
        return $this->poids;
    }

    public function setPoids($poids) {
        $this->poids = $poids;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function init($nom, $prenom, $dateNaissance, $sexe, $taille, $poids, $mail, $password) {
        // Vérifier la longueur du nom et du prénom
        if (strlen($nom) <= 50 && strlen($prenom) <= 50) {
            $this->nom = $nom;
            $this->prenom = $prenom;
        } else {
            // Gérer l'erreur
            throw new InvalidArgumentException("Le nom et le prénom doivent avoir moins de 50 caractères.");
        }
    
        // Vérifier la date de naissance
        if ($dateNaissance >= 1900 && $dateNaissance <= 2020) {
            $this->dateNaissance = $dateNaissance;
        } else {
            // Gérer l'erreur
            throw new InvalidArgumentException("La date de naissance doit être comprise entre 1900 et 2020.");
        }
    
        // Vérifier le sexe
        if (in_array($sexe, [0, 1, 2])) {
            $this->sexe = $sexe;
        } else {
            // Gérer l'erreur
            throw new InvalidArgumentException("Le sexe doit être 0, 1 ou 2.");
        }
    
        // Vérifier la taille
        if ($taille >= 50 && $taille <= 250) {
            $this->taille = $taille;
        } else {
            // Gérer l'erreur
            throw new InvalidArgumentException("La taille doit être comprise entre 50 et 250.");
        }
    
        // Vérifier le poids
        if ($poids >= 4 && $poids <= 200) {
            $this->poids = $poids;
        } else {
            // Gérer l'erreur
            throw new InvalidArgumentException("Le poids doit être compris entre 4 et 200.");
        }
    
        // Vérifier l'adresse email
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $this->mail = $mail;
        } else {
            // Gérer l'erreur
            throw new InvalidArgumentException("L'adresse email n'est pas valide.");
        }
        if (preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
            $this->password = $password;
        } else {
            
            throw new InvalidArgumentException("Le mot de passe doit contenir au moins 1 chiffre, 1 minuscule, 1 majuscule, 1 caractère spécial et être d'au moins 8 caractères.");
        }
    }
}
?>