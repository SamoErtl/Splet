<?php

require_once("model/BowlDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");

class BowlController {

    public static function index() {
        ViewHelper::render("view/bowl-list.php", [
            "games" => BowlDB::getAllPublic(), 
            "loggedIn" => User::isLoggedIn()
        ]);
    }

    // Function can be called without providing arguments. In such case,
    // $data and $errors paramateres are initialized as empty arrays
    public static function addForm($data = [], $errors = []) {
          if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        // If $data is an empty array, let's set some default values
        if (empty($data)) {
            $data = [
                "game_date" => date("Y-m-d"),
            ];
        }

        // If $errors array is empty, let's make it contain the same keys as
        // $data array, but with empty values
        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }

        $vars = ["bowl" => $data, "errors" => $errors];
        ViewHelper::render("view/bowl-add.php", $vars);
    }

    public static function add() {
          if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $rules = [
            "game_date" => [
                "filter" => FILTER_CALLBACK,
                "options" => function ($value) {
                    $date = explode("-", $value);

                    if (checkdate($date[1], $date[2], $date[0])) {
                        return $value;
                    } else {
                        return false;
                    }
                }
            ],
            "field1-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field1-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field2-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field2-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field3-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field3-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field4-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field4-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field5-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field5-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field6-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field6-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field7-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field7-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field8-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field8-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field9-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field9-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field10-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field10-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field10-3" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field_result" => FILTER_SANITIZE_SPECIAL_CHARS,
            "public_box" => FILTER_SANITIZE_SPECIAL_CHARS
            
        ];
        $data = filter_input_array(INPUT_POST, $rules);
        
        $data["game_score"] = $data["field1-1"] . "," . $data["field1-2"]. "," . $data["field2-1"]. "," . $data["field2-2"]
                                . "," . $data["field3-1"]. "," . $data["field3-2"]
                                . "," . $data["field4-1"]. "," . $data["field4-2"]
                                . "," . $data["field5-1"]. "," . $data["field5-2"]
                                . "," . $data["field6-1"]. "," . $data["field6-2"]
                                . "," . $data["field7-1"]. "," . $data["field7-2"]
                                . "," . $data["field8-1"]. "," . $data["field8-2"]
                                . "," . $data["field9-1"]. "," . $data["field9-2"]
                                . "," . $data["field10-1"]. "," . $data["field10-2"]. "," . $data["field10-3"]
                                . "," . $data["field_result"];


        $errors["game_date"] = $data["game_date"] === false ? "Invalid date." : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            BowlDB::insert($data["game_date"], $data["public_box"], $data["game_score"],UserDB::userID(User::getUsername()));
            if($data["public_box"] == null){
                ViewHelper::redirect(BASE_URL . "bowl/privat");
            } else{
                ViewHelper::redirect(BASE_URL . "bowl");

            }
        } else {
            self::showAddForm($data, $errors);
        }
    }

    public static function editForm($data = [], $errors = []) {
        if (empty($data)) {
            $data = BowlDB::get($_GET["ID_game"]);
        }

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }
        
        ViewHelper::render("view/bowl-edit.php", ["game" => $data, "errors" => $errors]);
    }

    public static function indexPrivate()
    {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        ViewHelper::render("view/bowl-list-privat.php", [
            "games" => BowlDB::getAll(), 
            "loggedIn" => User::isLoggedIn()
        ]);
    }    

    public static function edit() {
          if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $rules = [
            "game_date" => [
                "filter" => FILTER_CALLBACK,
                "options" => function ($value) {
                    $date = explode("-", $value);

                    if (checkdate($date[1], $date[2], $date[0])) {
                        return $value;
                    } else {
                        return false;
                    }
                }
            ],
            "field1-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field1-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field2-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field2-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field3-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field3-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field4-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field4-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field5-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field5-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field6-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field6-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field7-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field7-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field8-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field8-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field9-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field9-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field10-1" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field10-2" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field10-3" => FILTER_SANITIZE_SPECIAL_CHARS,
            "field_result" => FILTER_SANITIZE_SPECIAL_CHARS,
            "public_box" => FILTER_SANITIZE_SPECIAL_CHARS,
            "ID_game" => FILTER_SANITIZE_SPECIAL_CHARS
            
        ];
        $data = filter_input_array(INPUT_POST, $rules);

        $data["game_score"] = $data["field1-1"] . "," . $data["field1-2"]. "," . $data["field2-1"]. "," . $data["field2-2"]
                                . "," . $data["field3-1"]. "," . $data["field3-2"]
                                . "," . $data["field4-1"]. "," . $data["field4-2"]
                                . "," . $data["field5-1"]. "," . $data["field5-2"]
                                . "," . $data["field6-1"]. "," . $data["field6-2"]
                                . "," . $data["field7-1"]. "," . $data["field7-2"]
                                . "," . $data["field8-1"]. "," . $data["field8-2"]
                                . "," . $data["field9-1"]. "," . $data["field9-2"]
                                . "," . $data["field10-1"]. "," . $data["field10-2"]. "," . $data["field10-3"]
                                . "," . $data["field_result"];

        $errors["game_date"] = $data["game_date"] === false ? "Invalid date." : "";
        $errors["ID_game"] = empty($data["ID_game"]) ? "ID is missing." : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            BowlDB::update($data["ID_game"], $data["game_date"], $data["public_box"], $data["game_score"]);
            if($data["public_box"] == null){
                ViewHelper::redirect(BASE_URL . "bowl/privat");
            } else{
                ViewHelper::redirect(BASE_URL . "bowl");
            }
        } else {
            var_dump($errors);
        }
    }

    public static function delete() {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }

        $rules = [
            "ID_game" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1]
            ],
            "delete_confirmation" => [
                "filter" => FILTER_VALIDATE_BOOLEAN
            ]
        ];
        $data = filter_input_array(INPUT_POST, $rules);
       
        $errors["ID_game"] = $data["ID_game"] === null ? "Cannot delete without a valid ID." : "";
        $errors["delete_confirmation"] = $data["delete_confirmation"] === null ? "Forgot to check the delete box?" : "";

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }
        if ($isDataValid) {
            BowlDB::delete($data["ID_game"]);
            $url = BASE_URL . "bowl";
        } else {
            if ($data["ID_game"] !== null) {
                $url = BASE_URL . "bowl/edit?ID_game=" . $data["ID_game"];
            } else {
                $url = BASE_URL . "bowl";
            }
        }

        ViewHelper::redirect($url);
    }
}