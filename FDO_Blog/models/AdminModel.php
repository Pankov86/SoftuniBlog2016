<?php
class AdminModel extends BaseModel
{
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

    public function deleteUser(int $id) : bool
    {
        $this->deleteUserFromActivity($id);

        $result = $this->deleteUserFromComments($id);
        $_SESSION['delete'] = $result;

            $this->deleteUserFromPostUserStatus($id);
        $this->deleteUserFromUGInteraction($id);

        $this->copyPostsFromUserToDeletedPosts($id);
        $posts = $this->getUserPosts($id);
        $this->deleteUserFromPosts($id, $posts);

        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->affected_rows;
        $_SESSION['af_rows'] = $result;
        return $result;
    }

    public function deleteUserFromActivity(int $user_id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM activity WHERE user_id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();

    }

    public function deleteUserFromComments(int $user_id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE author_id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();
    }

    public function deleteUserFromPostUserStatus(int $user_id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM post_user_status WHERE user_id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();
    }

    public function deleteUserFromUGInteraction($user_id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM u_g_interaction WHERE user_id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();
    }

    public function copyPostsFromUserToDeletedPosts(int $user_id)
    {
        // Get user posts
        $posts = $this->getUserPosts($user_id);

        // Insert posts in table "deleted_posts"
        $this->insertDeletedPostsInDeletedTable($posts);

    }

    public function getUserPosts($user_id)
    {
        $statement = self::$db->prepare(
            "SELECT p.title, p.content, p.points, p.views_count, u.username, u.email ".
            "FROM posts p ".
            "LEFT JOIN users u ON p.user_id = u.id ".
            "WHERE p.user_id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }


    public function insertDeletedPostsInDeletedTable($posts)
    {
        foreach ($posts as $post){
            $title = $post['title'];
            $content = $post['content'];
            $points = $post['points'];
            $views_count = $post['views_count'];
            $username = $post['username'];
            $email = $post['email'];
            $reason = "User deleted";

            $statement = self::$db->prepare(
                "INSERT INTO deleted_posts ".
                "post_title, post_content, points, views_count, author_name, author_email, reason_to_be_deleted  ".
                "VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $statement->bind_param("ssiisss", $title, $content, $points, $views_count, $username, $email, $reason);
            $statement->execute();

        }
    }

    public function deleteUserFromPosts($user_id, $user_posts)
    {
        foreach ($user_posts as $post){
            //delete comments from this post
            $statement = self::$db->prepare(
                "DELETE FROM comments WHERE post_id = ?"
            );
            $statement->bind_param("i", $post['id']);
            $statement->execute();

            // Delete from category_post_interaction
            $statement = self::$db->prepare(
                "DELETE FROM category_post_interaction WHERE post_id = ?"
            );
            $statement->bind_param("i", $post['id']);
            $statement->execute();

            // Delete from post_tag_interaction
            $statement = self::$db->prepare(
                "DELETE FROM post_tag_interaction WHERE post_id = ?"
            );
            $statement->bind_param("i", $post['id']);
            $statement->execute();

            // Delete from post_user_status
            $statement = self::$db->prepare(
                "DELETE FROM post_user_status WHERE post_id = ?"
            );
            $statement->bind_param("i", $post['id']);
            $statement->execute();
        }
        //delete post
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE user_id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?"
        );
        $statement->bind_param("i", $user_id);
        $statement->execute();
    }
}
