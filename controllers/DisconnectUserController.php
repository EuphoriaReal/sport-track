<?php
require_once 'Controller.php';
require_once 'model/User.php';

class DisconnectUserController extends Controller {

    public function get($request) {
        // Afficher le formulaire d'ajout d'utilisateur
        $this->render('user_disconnect', []);
    }

}

?>
