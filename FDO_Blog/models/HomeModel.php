<?php

class HomeModel extends BaseModel
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
            "SELECT COUNT(*) count FROM post_user_status WHERE post_id = ? AND user_id = ?"
        );
        $statement->bind_param("ii", $post_id, $user_id);
        $statement->execute();
        $result = $statement->get_result() ->fetch_assoc();

        return $result['count']==1;
    }


    public function getAllPosts(){
        $statement = self::$db->query(
            "SELECT p.id, p.title, p.content, p.date, u.full_name "
            ."FROM posts p LEFT JOIN users u "
            ."ON p.user_id = u.id "
            ."ORDER by date");
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

    function getCommentById(int $comment_id)
    {
        $statement = self::$db->query(
            "SELECT * FROM comments WHERE id = $comment_id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteComment($id) :bool
    {
        //delete comment
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    function getCategoryById(int $id){
        $statement = self::$db->prepare(
            "SELECT category_name ".
            "FROM category ".
            "WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        return $result;
    }

    function getPostsByCategory(int $id)
    {
        $statement = self::$db->query(
            "SELECT *".
            "FROM posts LEFT JOIN category_post_interaction ".
            "ON posts.id = category_post_interaction.post_id ".
            "JOIN users ".
            "ON posts.user_id = users.id ".
            "WHERE category_id = $id ".
            "ORDER BY posts.id");

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getCategories()
    {
        $statement = self::$db->query(
            "SELECT * ".
            "FROM category c");
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
            "SELECT posts.id, title, content, date, full_name, points ".
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
