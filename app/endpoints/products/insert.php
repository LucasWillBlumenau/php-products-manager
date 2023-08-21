<?php
    include "../../../controllers/ProductController.php";

    $response = ProductController::save($_POST["name"], $_POST["price"]);
    $response->send();
?>