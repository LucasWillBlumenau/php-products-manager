<?php 
    include 'credentials.php';
    
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    mysqli_set_charset ($conn,"utf8");
?>