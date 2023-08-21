<?php 

    include "../controllers/UserController.php";

    $username = $_GET["u"];
    $password = $_GET["p"];

    UserController::check_token("9fd6d837e9288b9382777dbe208667470fa9024033a77b18d93fd05bced3f075");
?>