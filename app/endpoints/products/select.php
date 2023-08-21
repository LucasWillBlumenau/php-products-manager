<?php
    include "../../../controllers/ProductController.php";

    $response = ProductController::select_all();
    $response->send();
?>