<?php

require_once 'Controller.php';
require_once 'model/ActivityDAO.php';
require_once 'model/UserDAO.php';

class ListActivityController extends Controller {

    public function get($request) {


        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            $this->render("connect_form", []);
        }else{
            $data = $_SESSION['user'];
            $mail = $data->getMail();         

            try {
                $user = UserDAO::getInstance()->getUserByEmail($mail);
            } catch (Exception $e) {
                $this->render("connect_form", []);
            }

            $mail = $user->getMail();

            // Récupérez la liste des activités
            $activityDAO = ActivityDAO::getInstance();

            $activities = $activityDAO->getAllActivitiesByUser($mail);

            // Affichez la liste des activités dans une vue
            $this->render('list_activities', ['activities' => $activities]);
        }
    }
    
    // Ajoutez la méthode POST si nécessaire

}

?>
