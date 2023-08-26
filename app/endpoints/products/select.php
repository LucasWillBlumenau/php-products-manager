<?php

    require '../../../models/Database.php';
    require '../../../models/Product.php';
    require '../../../models/Token.php';
    require '../../../controllers/Response.php';
    require '../../../controllers/UserController.php';
    require '../../../controllers/ProductController.php';

    UserController::check_token();
    $response = ProductController::select_all();
    $response->send();
?>