<?php
    include 'json_response.php';
    include 'connection.php';

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    $response = array('message' => 'record deleted sucessfuly');
    
    $conn->close();
    json_response($response, 203);
?>