<?php

require_once 'Controller.php';
require_once 'model/User.php';
require_once 'model/Activity.php';
require_once 'model/ActivityDAO.php';
require_once 'model/ActivityEntryDAO.php';

class UploadActivityController extends Controller {

    public function get($request) {
        // Display the upload form
        $this->render('upload_activity_form', []);
    }

    public function post($request) {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user'])) {
            // Handle the case where the user is not logged in.
            // You may want to redirect them to a login page or display an error message.
            // Replace this with your desired behavior.
            $this->render('connect_form', []);
            return;
        }

        $user = $_SESSION['user'];
        $mail = $user->getMail();
        
        // Check if a file was uploaded and if there were no errors
        if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
            // Recupération des données du fichier
            $file = $_FILES['fichier'];
            $file['name'] = str_replace(' ', '_', $file['name']);
            
            $json = file_get_contents($file['tmp_name']);
            $data = json_decode($json, true);

            if ($data === null) {
                // Handle JSON decoding error
                echo "Error decoding JSON data.";
                return;
            }

           

            $activity = new Activity();

            // Obtenez l'identifiant actuel le plus élevé dans la table activities
            $activityDAO = ActivityDAO::getInstance();
            $currentMaxId = $activityDAO->getNbActivities();

            // Incrémentez l'identifiant actuel pour obtenir le nouvel identifiant
            $newIdActivity = $currentMaxId + 1;

            $date = $data['activity']['date'];
            $date = explode("/", $date);
            $date = $date[2] . "-" . $date[1] . "-" . $date[0];

            $activity->init(
                $newIdActivity, // Utilisez le nouvel identifiant
                $date,
                $data['activity']['description'],
                $data['activity']['duree'],
                $data['activity']['minCardioFrequency'],
                $data['activity']['maxCardioFrequency'],
                $data['activity']['moyCardioFrequency'],
                $data['activity']['distance'],
                $mail
            );

            $activityDAO->createActivity($activity);

            $activityEntryDAO = ActivityEntryDAO::getInstance();

            // Obtenez l'identifiant actuel le plus élevé dans la table Data
            $currentMaxIdData = $activityEntryDAO->getNbData();

            // Incrémentez l'identifiant actuel pour obtenir le nouvel identifiant
            $newIdData = $currentMaxIdData + 1;

            foreach ($data['data'] as $entry) {
                $dataEntry = new Data();

                // Utilisez le nouvel identifiant pour l'entrée de données
                $dataEntry->init(
                    $newIdData,
                    $entry['time'],
                    $entry['cardio_frequency'],
                    $entry['latitude'],
                    $entry['longitude'],
                    $entry['altitude'],
                    $newIdActivity
                );

                $activityEntryDAO->addEntry($dataEntry);

                // Incrémentez l'identifiant pour la prochaine entrée de données
                $newIdData++;
            }

            $activity = $activityDAO->getActivityById($newIdActivity);

            // Affichez la liste des activités dans une vue
            $this->render('upload_activity_valid', ['activity' => $activity]);


        } else {
            // Handle the case where the file upload failed
            echo "Error uploading file.";
        }
    }
}


?>
