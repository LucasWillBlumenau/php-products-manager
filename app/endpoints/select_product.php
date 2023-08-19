<?php 

    include "json_response.php";
    include "../../models/Product.php";

    if (!isset($_GET["id"])) {
        json_response(["message" => "you must pass an id"], 401);
    }
    $product = Product::from_id($_GET["id"]);

    if ($product == null) {
        json_response(array("message" => "No record with this id"), 404);
    }
    json_response($product);

?>