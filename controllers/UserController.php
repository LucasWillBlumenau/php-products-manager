<?php
    class UserController {

        public static function save_user($username, $password) {
            $user = new User(["username" => $username, "password" => $password]);
            $user->save();
            return new Response($user, 200);
        }

        public static function check_token($exit_if_token_doesnt_exit = true) {
            $headers = getallheaders();
            $token = $headers['Authorization-Token'];
            if (!isset($token)) {
                if (!$exit_if_token_doesnt_exit) {
                    return null;
                }
                $response = new Response(["content" => "credentials were not provided"], 401);
                $response->send();
            }
            $token = new Token(["token" => $token]);
            $token->select();
            if ($token->id == null) {
                $response = new Response(["content" => "wrong credentials"], 401);
                $response->send();
            }
            return $token;
        }

        public static function check_credentials($username, $password) {
            $user = new User(["username" => $username, "password" => $password]);
            $data = $user->select_with_credentials();
            if ($data == null) {
                $response = new Response(["content" => "wrong crendentials"], 400);
                $response->send();
            }
            $response = new Response(new Token($data), 200);
            return $response;
        }
    }
    
?>