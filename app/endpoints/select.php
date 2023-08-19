<?php
    include "json_response.php";
    include "../../models/Product.php";

    $data = Product::get_all();
    json_response($data);
?>