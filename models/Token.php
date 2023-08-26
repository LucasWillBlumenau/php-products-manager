<?php 

    class Token {
        
        public $id;
        public $token;
        public $user_id;

        public function __construct($args) {
            $this->id = isset($args["id"])? $args["id"]: null;
            $this->token = isset($args["token"])? $args["token"]: null;
            $this->user_id = isset($args["user_id"])? $args["user_id"]: null;
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
            $stmt->bind_param("si", $token, $this->user_id);
            $stmt->execute();
            $this->id = mysqli_insert_id($conn);
            $this->token = $token;
            $conn->close();
        }

        public function select() {
            $sql = "SELECT * FROM tokens WHERE token = ?";
            $conn = get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $this->token);
            $stmt->execute();
            $result = $stmt->get_result();
            $token_info = $result->fetch_assoc();
            $this->id = $token_info["id"];
            $this->user_id = $token_info["user_id"];
            $conn->close();
        }
    }

?>