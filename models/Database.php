<?php 
    include "credentials.php";
    
    function get_connection() {
        $conn = new mysqli($GLOBALS["DB_HOST"], $GLOBALS["DB_USER"], $GLOBALS["DB_PASS"], $GLOBALS["DB_NAME"]);
        mysqli_set_charset ($conn, "utf8");
        return $conn;
    }
?>