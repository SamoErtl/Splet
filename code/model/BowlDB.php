<?php

require_once "DBInit.php";

class BowlDB {

    public static function getAllPublic() {
        $db = DBInit::getInstance();

        $statement = $db->prepare(
        "SELECT b.ID_game, b.game_date, b.game_score , u.username 
         FROM bowl_games as b , user2 as u
         WHERE public_box = 'on'  and  b.user_ID = u.id");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAll(){
         $db = DBInit::getInstance();

        $statement = $db->prepare(
        "SELECT b.ID_game, b.game_date, b.game_score , u.username 
         FROM bowl_games as b , user2 as u
         WHERE b.user_ID = u.id");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM bowl_games WHERE ID_game = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT b.ID_game,b.game_date,b.public_box,b.game_score, u.username
         FROM bowl_games as b, user2 as u
            WHERE b.user_ID = u.id and ID_game =:id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public static function insert($game_date, $public_box , $game_score , $user) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO bowl_games (game_date, public_box , game_score , user_ID)
            VALUES (:game_date, :public_box , :game_score , :user_ID)");
        $statement->bindParam(":game_date", $game_date);
        $statement->bindParam(":public_box", $public_box);
        $statement->bindParam(":game_score", $game_score);
        $statement->bindParam(":user_ID", $user);
        $statement->execute();
    }

    public static function update($ID_game, $game_date, $public_box , $game_score) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE bowl_games SET game_date = :game_date,
            public_box = :public_box , game_score = :game_score WHERE ID_game =:ID_game");
        $statement->bindParam(":game_date", $game_date);
        $statement->bindParam(":public_box", $public_box);
        $statement->bindParam(":game_score", $game_score);
        $statement->bindParam(":ID_game", $ID_game, PDO::PARAM_INT);
        $statement->execute();
    }

}

