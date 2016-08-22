<?php

class PostsModel extends HomeModel
{


//    function getTags()
//    {
//        $statement = self::$db->query(
//            "SELECT * ".
//            "FROM tags ");
//        return $statement->fetch_all(MYSQLI_ASSOC);
//    }
    
//    function findTagByName(string $tag_name)
//    {
//        $tag_id = self::$db->query(
//            "SELECT id ".
//            "FROM tags ".
//            "WHERE tag_name = $tag_name"
//        );
//        return $tag_id;
//    }

    function getCategories()
    {
        $statement = self::$db->query(
            "SELECT * ".
            "FROM category c");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAllUsers()
    {
        $statement = self::$db->query(
            "SELECT id, username FROM users");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
    
    function getPostsByUserId($user_id)
    {
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, full_name, user_id " .
            "FROM posts " .
            "LEFT JOIN users " .
            "On posts.user_id = users.id " .
            "WHERE posts.user_id = $user_id " .
            "ORDER BY date DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAll()
    {
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, full_name, user_id, views_count, points, " .
            "   (SELECT count(*) FROM comments c WHERE c.post_id = posts.id) comments_count " .
            "FROM posts " .
            "LEFT JOIN users " .
            "On posts.user_id = users.id " .
            "ORDER BY date DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function create(string $title, string $content, int $user_id, int $category_id) :bool
    {
        $statementPost = self::$db->prepare(
            "INSERT INTO posts(title, content, user_id) VALUES (?, ?, ?)"
        );
        $statementPost->bind_param("ssi", $title, $content, $user_id);
        $statementPost->execute();

        $post_id = $statementPost->insert_id;

        $statementCategory = self::$db->prepare(
            "INSERT INTO category_post_interaction (category_id, post_id) ".
            "VALUES (?, ?)");
        $statementCategory->bind_param("ii", $category_id, $post_id);
        $statementCategory->execute();

        return $statementPost->affected_rows == 1;
    }

    public function delete($id) :bool
    {
        //delete comments from this post
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE post_id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        
        //delete post
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit(int $id, string $title, string $content, string $date, int $user_id) :bool
    {
        $statement = self::$db->prepare(
            "UPDATE posts SET title = ?, content = ?, date = ?, user_id = ? ".
            "WHERE id = ?");
        $statement->bind_param("sssii", $title, $content, $date, $user_id, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }
}
