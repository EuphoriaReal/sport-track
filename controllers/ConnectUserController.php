<?php

require_once(__ROOT__.'/controllers/Controller.php');
require_once(__ROOT__.'/model/User.php');
require_once(__ROOT__.'/model/UserDAO.php');

class ConnectUserController extends Controller{
    // Méthode pour gérer la requête GET (afficher le formulaire de connexion)
    public function get($request) {
        $this->render('connect_form', [$request['mail'], $request['mdp']]);
    }

    // Méthode pour gérer la requête POST (établir la connexion de l'utilisateur)
    public function post($request) {
        // Récupérer les données soumises depuis le formulaire
        $email = $_POST['mail'];
        $motDePasse = $_POST['mdp'];

        // Vérifier si l'utilisateur existe dans la base de données
        $userDAO = UserDAO::getInstance();
        $user = $userDAO->getUserByEmail($email);

        if (!$user) {
            $_SESSION['error_message'] = 'L\'utilisateur n\'existe pas.';
            $this->render('connect_form', []);
        }elseif($motDePasse !== $user->getPassword()) {
            // Le mot de passe est incorrect
            $_SESSION['error_message'] = 'Mot de passe incorrect.';
            $this->render('connect_form', []);
        }else{
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $userObject = new User();
            $userObject->init($user->getNom(), $user->getPrenom(), $user->getDateNaissance(), $user->getSexe(), $user->getTaille(), $user->getPoids(), $user->getMail(), $user->getPassword());
            $_SESSION['user'] = $userObject;

            // Créer une instance de la classe User et initialiser les données
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $dateNaissance = $user->getDateNaissance();
            $sexe = $user->getSexe();
            $taille = $user->getTaille();
            $poids = $user->getPoids();
            $mail = $user->getMail();
            $password = $user->getPassword();

            // Rediriger l'utilisateur vers une page de connexion réussie ou afficher un message d'erreur
            $this->render('user_connect_valid', ['lastname' => $nom,'email' => $email, 'firstname' => $prenom]);
        }
    }
}

?>
