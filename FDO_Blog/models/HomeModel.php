<?php

class HomeModel extends BaseModel
{
    function createComment($id, $username, $content)
    {
        $statement = self::$db->prepare(
            "INSERT INTO comments (post_id, username, content)".
            "VALUES (?, ?, ?)");
        $statement->bind_param("iss", $id, $username, $content);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
    
    function getLatestPosts(int $maxCount)
    {
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, full_name ".
            "FROM posts ".
            "LEFT JOIN users ".
            "On posts.user_id = users.id ".
            "ORDER BY date DESC ".
            "LIMIT ". $maxCount);
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getPostById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT posts.id, title, content, date, full_name ".
            "FROM posts LEFT JOIN users On posts.user_id = users.id ".
            "WHERE posts.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }
    
    function getPostComments($id)
    {
        $statement = self::$db->query(
            "SELECT comments.id, comments.content, comments.date, comments.username " .
            "FROM comments LEFT JOIN posts ON comments.post_id = posts.id ".
            "WHERE comments.post_id = $id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
