<?php 
    include "../../controllers/ProductController.php";

    $response = ProductController::select_one($_GET["id"]);
    $response->send();
?>