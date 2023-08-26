<?php
    class User {

        public $id;
        public $username;
        public $password;
        public $token;

        public function __construct($args) {
            $this->id = null;
            $this->username = isset($args["username"])? $args["username"]: null;
            $this->password = isset($args["password"])? $args["password"]: null;
            $this->token = isset($args["token"])? $args["token"]: null;
        }

        public function save() {
            $conn = get_connection();
            $sql = "INSERT INTO users(username, password) VALUES(?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $this->username, $this->password);
            $stmt->execute();
            $this->id = mysqli_insert_id($conn);
            $conn->close();

            $token = new Token(["user_id" => $this->id]);
            $token->save();
            $this->token = $token->token;
        }

        public function select() {
            $conn = get_connection();
            $sql = "SELECT username, token FROM users INNER JOIN tokens on users.id = tokens.user_id WHERE token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $this->token->token);
            $stmt->execute();
            $result = $stmt->get_result();
            $conn->close();
            return $result->fetch_assoc();
        }

        public function select_with_credentials() {
            $conn = get_connection();
            $sql = "SELECT tokens.id, token, user_id FROM users INNER JOIN tokens on users.id = tokens.user_id WHERE username = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $this->username, $this->password);
            $stmt->execute();
            $result = $stmt->get_result();
            $conn->close();
            return $result->fetch_assoc();
        }
    } 

?>