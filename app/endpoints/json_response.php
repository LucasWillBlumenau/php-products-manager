<?php

    function json_response($data, $status = 200) {
        header_remove();
        header("Content-Type: Application/JSON; charset: UTF-8");

        http_response_code($status);
        echo json_encode($data);
        exit(1);
    }
?>