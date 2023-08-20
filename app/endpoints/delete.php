<?php
    include "../../controllers/ProductController.php";

    $response =  ProductController::delete($_POST["id"]);
    $response->send();
?>