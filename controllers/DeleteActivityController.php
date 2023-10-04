<?php

require_once(__ROOT__.'/controllers/Controller.php');
require_once(__ROOT__.'/model/ActivityDAO.php');
require_once(__ROOT__.'/model/UserDAO.php');
require_once(__ROOT__.'/model/ActivityEntryDAO.php');


class DeleteActivityController extends Controller {

    public function post($request) {
        // Récupérer l'ID de l'activité à supprimer depuis le formulaire
        $idActivity = $request['idActivity'];

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

            // Supprimez l'activité
            $activityDAO->deleteActivity($idActivity);

            //Supprimer les data de l'activité
            $activityEntryDAO = ActivityEntryDAO::getInstance();
            $activityEntryDAO->deleteEntryByActivity($idActivity);

            $activities = $activityDAO->getAllActivitiesByUser($mail);

            // Affichez la liste des activités dans une vue
            $this->render('list_activities', ['activities' => $activities]);
        }

    }
}

?>
