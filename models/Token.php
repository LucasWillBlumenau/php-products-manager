<?php 

    include "Database.php";

    
    class Token {
        
        public $id;
        public $token;
        public $user;

        public function __construct($args) {
            $this->id = isset($args["id"])? $args["id"]: null;
            $this->token = isset($args["token"])? $args["token"]: null;
            $this->user = isset($args["user"])? $args["user"]: null;
        }

        private function generate_token() {
            $length = 32;
            $random_bytes = random_bytes($length);
            $token = bin2hex($random_bytes);
            return $token;
        }

        public function save() {
            $token = $this->generate_token();
            $conn = get_connection();
            $sql = "INSERT INTO tokens(token, user_id) VALUES(?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $token, $this->user->id);
            $stmt->execute();
            $this->id = mysqli_insert_id($conn);
            $this->token = $token;
            $conn->close();
        }
    }

?>