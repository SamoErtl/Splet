<?php

require_once "DBInit.php";

class UserDB {

    public static function getUser($username, $password) {
        /* This function is more secure because
            1) It uses prepared statements and it binds variables;
            2) It does not store passwords in plain-text in the database

            For creating passwords, use: http://php.net/manual/en/function.password-hash.php
            For checking passwords, use: http://php.net/manual/en/function.password-verify.php
            For more information, see: http://php.net/manual/en/ref.password.php
        */
        $dbh = DBInit::getInstance();
        $stmt = $dbh->prepare("SELECT id, username, password FROM user2 
            WHERE username = :username");
        $stmt->bindValue(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch();

        if (password_verify($password, $user["password"])) {
            unset($user["password"]);
            return $user;
        } else {
            return false;
        }
    }

    public static function makeUser($username, $password)
    {
        $dbh = DBInit::getInstance();
        $statement = $dbh->prepare("INSERT INTO user2 (username, password)
            VALUES (:username, :password)");
        $usernameLowerd = strtolower($username);
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $statement->bindParam(":username", $usernameLowerd);
        $statement->bindParam(":password", $passwordHashed);
        $statement->execute();
        
    }

    public static function userID($username){
        $dbh = DBInit::getInstance();
        $stmt = $dbh->prepare("SELECT id FROM user2 
            WHERE username = :username");
        $stmt->bindValue(":username", $username);
        $stmt->execute();

        $userid = $stmt->fetch();

        return $userid["id"];
    }
}
