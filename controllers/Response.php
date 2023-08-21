<?php

    class Response {

        private $content;
        private $status;

        public function __construct($content, $status) {
            $this->content = $content;
            $this->status = $status;
        }

        public function send() {
            header_remove();
            header("Content-Type: Application/JSON; charset: UTF-8");
            http_response_code($this->status);
            echo json_encode($this->content);
            exit(1);
        }
    }

?>