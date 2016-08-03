<?php

class HomeModel extends BaseModel
{
    public function getAllPosts(){
        $statement = self::$db->query(
            "SELECT p.id, p.title, p.content, p.date, u.full_name "
            ."FROM posts p LEFT JOIN users u "
            ."ON p.user_id = u.id ");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    function createComment($id, $user_id, $content)
    {
        $statement = self::$db->prepare(
            "INSERT INTO comments (post_id, author_id, comment_body )".
            "VALUES (?, ?, ?)");
        $statement->bind_param("iss", $id, $user_id, $content);
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
            "UPDATE posts SET views_count = views_count + 1 ".
            "WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

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
            "SELECT c.comment_body, c.id, c.date, u.full_name, c.post_id, c.author_id "
            ."FROM comments c "
            ."LEFT JOIN users u ON c.author_id = u.id "
            ."WHERE c.post_id = $id");
//        $statement->bind_param("i", $id);
//        $statement->execute();
//
//        $result = $statement->get_result()->fetch_assoc();
//        return $result;

        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
