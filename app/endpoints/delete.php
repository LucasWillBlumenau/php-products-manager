<?php
    include "json_response.php";
    include "../../models/Product.php";

    if (!isset($_POST["id"])) {
        json_response(["message" => "you must pass an id"], 401);
    }

    $product = new Product(["id" => $_POST["id"]]);
    $product->delete();
    json_response(["message" => "record deleted sucessfuly"], 203);
?>