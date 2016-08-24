<?php

class VoteModel extends BaseModel
{
    function vote(int $post_id, int $user_id){
        $statement = self::$db->prepare
        ("UPDATE posts ".
            "SET points = points + 1 ".
            "WHERE id = ?");
        $statement->bind_param("i", $post_id);
        $statement->execute();

        $statement = self::$db->prepare(
            "INSERT INTO post_user_status (post_id, user_id) VALUES (?, ?)"
        );
        $statement->bind_param("ii", $post_id, $user_id);
        $statement->execute();

        return $statement->affected_rows == 1;
    }

    function unVote(int $post_id, int $user_id){
        $statement = self::$db->prepare
        ("UPDATE posts ".
            "SET points = points - 1 ".
            "WHERE id = ?");
        $statement->bind_param("i", $post_id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM post_user_status WHERE post_id = ? AND user_id = ?"
        );
        $statement->bind_param("ii", $post_id, $user_id);
        $statement->execute();

        return $statement->affected_rows == 1;

    }

    function isVote(int $post_id, int $user_id) {
        $statement = self::$db->prepare(
            "SELECT post_id, user_id FROM post_user_status WHERE user_id = ? AND id = ?"
        );
        $statement->bind_param("ii", $post_id, $user_id);
        $statement->execute();

        return $statement->num_rows==1;
    }
}