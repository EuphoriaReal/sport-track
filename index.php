<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define("__ROOT__", __DIR__);

// Configuration
require_once(__ROOT__ . '/config.php');

// ApplicationController
require_once(CONTROLLERS_DIR . '/ApplicationController.php');

// Add routes here
ApplicationController::getInstance()->addRoute('connect', CONTROLLERS_DIR . '/connect.php');
ApplicationController::getInstance()->addRoute('AProposController', CONTROLLERS_DIR . '/AProposController.php');
ApplicationController::getInstance()->addRoute('AddUserController', CONTROLLERS_DIR . '/AddUserController.php');
ApplicationController::getInstance()->addRoute('EditUserController', CONTROLLERS_DIR . '/EditUserController.php');
ApplicationController::getInstance()->addRoute('reset', CONTROLLERS_DIR . '/reset.php');
ApplicationController::getInstance()->addRoute('ConnectUserController', CONTROLLERS_DIR . '/ConnectUserController.php');
ApplicationController::getInstance()->addRoute('DisconnectUserController', CONTROLLERS_DIR . '/DisconnectUserController.php');
ApplicationController::getInstance()->addRoute('testController', CONTROLLERS_DIR . '/testController.php');
ApplicationController::getInstance()->addRoute('UploadActivityController', CONTROLLERS_DIR . '/UploadActivityController.php');
ApplicationController::getInstance()->addRoute('ListActivityController', CONTROLLERS_DIR . '/ListActivityController.php');
ApplicationController::getInstance()->addRoute('DeleteActivityController', CONTROLLERS_DIR . '/DeleteActivityController.php');


// Process the request
ApplicationController::getInstance()->process();

?>
