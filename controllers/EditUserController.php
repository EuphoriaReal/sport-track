<?php

require_once 'Controller.php';
require_once 'model/User.php';
require_once 'model/UserDAO.php';

class EditUserController extends Controller {
    
    public function get($request) {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            $this->render("connect_form", []);
        }else{

        $data = $_SESSION['user'];
            
            $mail = $data->getMail();
            $password = $data->getPassword();

            try {
                $user = UserDAO::getInstance()->getUserByEmail($mail);
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
                return;
            }
        
            
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $dateNaissance = $user->getDateNaissance();
            $sexe = $user->getSexe();
            $taille = $user->getTaille();
            $poids = $user->getPoids();

            $this->render('edit_user_form', ['nom' => $nom, 'prenom' => $prenom, 'dateNaissance' => $dateNaissance, 'sexe' => $sexe, 'taille' => $taille, 'poids' => $poids, 'mail' => $mail]);
        }

    }
    

    public function post($request) {

        $nom = $request['nom'];
        $prenom = $request['prenom'];
        $dateNaissance = $request['dateNaissance'];
        $sexe = $request['sexe'];
        $taille = $request['taille'];
        $poids = $request['poids'];
        $mail = $request['mail'];
        $password = $request['password'];

        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $user = new User();
        try {
            $user->init($nom, $prenom, $dateNaissance, $sexe, $taille, $poids, $mail, $password);

            $userDAO = UserDAO::getInstance();

            $userDAO->updateUser($user);

            $_SESSION['user'] = $user;

        } catch (InvalidArgumentException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $this->render('edit_user_valid', []);
    }
}
    
?>
