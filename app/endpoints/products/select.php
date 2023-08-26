<?php

    require '../../../models/Database.php';
    require '../../../models/Product.php';
    require '../../../controllers/Response.php';
    require '../../../controllers/ProductController.php';

    $response = ProductController::select_all();
    $response->send();
?>