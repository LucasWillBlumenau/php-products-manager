<?php 
    require '../../../models/Database.php';
    require '../../../models/Token.php';
    require '../../../models/User.php';
    require '../../../controllers/Response.php';
    require '../../../controllers/UserController.php';

    $response = UserController::save_user($_POST['username'], $_POST['password']);
    $response->send();
?>