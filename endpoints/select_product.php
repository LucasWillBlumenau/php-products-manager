<?php 

    include "json_response.php";
    include "connection.php";

    $product_id = $_GET["id"];
    

    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    $conn->close();

    if ($data == null) {
        json_response(array("message" => "No record with this id"), 404);
    }
    json_response($data);

?>