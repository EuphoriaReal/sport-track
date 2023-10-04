<?php
require_once 'Controller.php';
require_once 'model/User.php';
require_once 'model/UserDAO.php';

class AddUserController extends Controller {

    public function get($request) {
        // Afficher le formulaire d'ajout d'utilisateur
        $this->render('user_add_form', []);
    }

    public function post($request) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $dateNaissance = $_POST['dateNaissance'];
        $sexe = $_POST['sexe'];
        $taille = $_POST['taille'];
        $poids = $_POST['poids'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        // Créer une instance de la classe User et initialiser les données
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $user = new User();
        try {
            $user->init($nom, $prenom, $dateNaissance, $sexe, $taille, $poids, $mail, $password);

            // Vérifier si l'utilisateur existe déjà dans la base de données
            $userDAO = UserDAO::getInstance();
            $existingUser = $userDAO->getUserByEmail($mail);

            if ($existingUser) {
                $this->render('user_add_form', []);
            } else {
                // Créer l'utilisateur s'il n'existe pas déjà
                $userDAO->createUser($user);

                $_SESSION['user'] = $user;

                // Passer les données à la vue
                $this->render('user_add_valid', []);
            }

        } catch (InvalidArgumentException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

?>
