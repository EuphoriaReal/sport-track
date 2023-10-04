<?php
require_once 'Controller.php';

class AProposController extends Controller{
    
    public function get($request){
        

        // Inclure le fichier de vue apropos.php
        $this->render('apropos',[]);
    }
}

?>
