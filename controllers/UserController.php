<?php
    include '../models/User.php';
    include 'Response.php';

    class UserController {

        public static function save_user($username, $password) {
            $user = new User(["username" => $username, "password" => $password]);
            $user->save();
            return new Response($user, 200);
        }

        public static function check_token($token) {

            if (!isset($token)) {
                $response = new Response(["content" => "credentials were not provided"], 401);
                $response->send();
            }

            $token = new Token(["token" => $token]);
            $user = new User(["token" => $token]);
            $result = $user->select();
            if ($result == null) {
                $response = new Response(["content" => "wrong credentials"], 401);
                $response->send();
            }
        }
    }
    
?>