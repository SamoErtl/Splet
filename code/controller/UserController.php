<?php

require_once("model/UserDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");

class UserController {

    public static function loginForm() {
        ViewHelper::render("view/user-login-form.php", ["formAction" => "login"]);
    }

    public static function login() {
        $rules = [
            "username" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS]
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        $user = UserDB::getUser($data["username"], $data["password"]);

        $errorMessage =  empty($data["username"]) || empty($data["password"]) || $user == null ? "Invalid username or password." : "";

        if (empty($errorMessage)) {
            User::login($user);

            $vars = [
                "username" => $data["username"]
            ];

            ViewHelper::render("view/user-login-success.php", $vars);
        } else {
            ViewHelper::render("view/user-login-form.php", [
                "errorMessage" => $errorMessage,
                "formAction" => "login"
            ]);
        }
    }

    public static function logout() {
        User::logout();

        ViewHelper::redirect(BASE_URL . "bowl");
    }

    public static function register(){
        $rules = [
            "username" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS]
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        
        $errorMessage =  empty($data["username"]) || empty($data["password"]) ? "empty username or password." : "";

        if (empty($errorMessage)) {
            UserDB::makeUser($data["username"], $data["password"]);
            $user = UserDB::getUser($data["username"], $data["password"]);
            User::login($user);

            $vars = [
                "username" => $data["username"]
            ];

            ViewHelper::render("view/user-register-success.php", $vars);
        } else {
            ViewHelper::render("view/user-register-form.php", [
                "errorMessage" => $errorMessage,
                "formAction" => "register"
            ]);
        }


    }

    public static function registerForm()
    {
        ViewHelper::render("view/user-register-form.php", ["formAction" => "register"]);
    }
}