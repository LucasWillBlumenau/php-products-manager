<?php
    include 'json_response.php';
    include 'connection.php';

    $result = mysqli_query($conn, "SELECT * FROM products");
    $data = mysqli_fetch_all($result);
    
    $conn->close();

    json_response($data);
?>