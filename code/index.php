<?php

session_start();

require_once("controller/UserController.php");
require_once("controller/BowlController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "login" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::login();
        } else {
            UserController::loginForm();
        }
    },
    "logout" => function () {
        UserController::logout();
    },
    "bowl" => function () {
        BowlController::index();
    },
    "bowl/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            BowlController::add();
        } else {
            BowlController::addForm();
        }
    },
    "bowl/privat" => function(){
        BowlController::indexPrivate();

    },
    "bowl/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            BowlController::edit();
        } else {
            BowlController::editForm();
        }
    },
    "bowl/delete" => function () {
        BowlController::delete();
    },
    "register" => function(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::register();
        } else {
            UserController::registerForm();
        }
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "bowl");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    //ViewHelper::error404();
} 
