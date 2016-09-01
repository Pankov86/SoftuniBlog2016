<?php
class AdminModel extends BaseModel
{
    public function getPostsFromUser($id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM posts ".
            "LEFT JOIN users ".
            "ON posts.user_id = users.id ".
            "WHERE posts.user_id = ?"
        );
        $statement->bind_param("i", $id);

    }

    public function getUserNameById($id)
    {
        $statement = self::$db->query(
            "SELECT users.username FROM users WHERE id = $id"
        );
        return $statement->fetch_assoc();
    }

    public function getAllUsers() : array
    {
        $statement = self::$db->prepare(
            "SELECT u.id, u.username, g.group_name, u.email ".
            "FROM users u ".
            "LEFT JOIN u_g_interaction ugi on ugi.user_id = u.id ".
            "LEFT JOIN groups g on ugi.group_id = g.id ".
            "ORDER BY username");
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function getUserInfo(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT u.id, u.username, g.group_name, u.full_name, u.email, u.About, a.comments_count, a.posts_count, a.points_given_by_user "
            ."FROM users u "
            ."LEFT JOIN u_g_interaction ugi on ugi.user_id = u.id "
            ."LEFT JOIN groups g on ugi.group_id = g.id "
            ."LEFT JOIN activity a on a.user_id = u.id "
            ."WHERE u.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function deleteUser(int $id)
    {
        $statement = self::$db->query(
            "SELECT * FROM posts ".
            "WHERE user_id = $id"
        );
        $posts = $statement->fetch_all(MYSQLI_ASSOC);

        $statement = self::$db->query(
            "SELECT username FROM users ".
            "WHERE id = $id"
        );
        $username = $statement->fetch_assoc();

        foreach ($posts as $post){
            $title = $post['title'];
            $content = $post['content'];
            $post_id = $post['id'];
            $user_id = $id;
            $username = $username['username'];

            $statement = self::$db->prepare(
                "INSERT INTO deleted_posts ".
                "(title, content, post_id, username, user_id) ".
                "VALUES (?, ?, ?, ?, ?)"
            );
            $statement->bind_param("ssisi", $title, $content, $post_id, $username, $user_id);
            $statement->execute();
        }

        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->affected_rows == 1;
        return $result;
    }

    public function getDeletedPosts()
    {
        $statement = self::$db->query(
            "SELECT * FROM deleted_posts"
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getDeletedPostByID($id)
    {
        $statement = self::$db->query(
            "SELECT * FROM deleted_posts WHERE post_id = $id"
        );
        return $statement->fetch_assoc();
    }

    public function restorePost(int $id, string $title, string $content, int $user_id, string $username)
    {
        $statement = self::$db->prepare(
            "DELETE FROM deleted_posts ".
            "WHERE post_id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();

        $statement = self::$db->query(
            "SELECT id FROM users ".
            "WHERE id = $user_id"
        );
        if ($statement->num_rows != 1){
            $about = 'deleted user';
            $statement = self::$db->prepare(
                "INSERT INTO users (id, username, About) ".
                "VALUES (?, ?, ?)"
            );
            $statement->bind_param("iss", $user_id, $username, $about);
            $statement->execute();
        }

        $statement = self::$db->prepare(
            "INSERT INTO posts ".
            "(id, title, content, user_id) ".
            "VALUES (?, ?, ?, ?)"
        );
        $statement->bind_param("issi", $id, $title, $content, $user_id);
        $statement->execute();

        return $statement->affected_rows;
    }

    public function getUserPosts($id)
    {
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, full_name, user_id, views_count, points, " .
            "   (SELECT count(*) FROM comments c WHERE c.post_id = posts.id) comments_count " .
            "FROM posts " .
            "LEFT JOIN users " .
            "ON posts.user_id = users.id " .
            "WHERE posts.user_id = $id ".
            "ORDER BY date DESC"
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
