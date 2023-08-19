<?php
    include "json_response.php";
    include "../../models/Product.php";

    $product = new Product(["name" => $_POST["name"], "price" => $_POST["price"]]);
    $product->save();
    
    json_response($product, 201);
?>