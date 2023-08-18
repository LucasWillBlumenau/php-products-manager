<?php
    include 'json_response.php';
    include 'connection.php';

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);
    
    $name = $data["name"];
    $price = $data["price"];
    
    $stmt = $conn->prepare("INSERT INTO products(name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);
    $stmt->execute();
    
    $conn->close();
    json_response($data, 201);
?>