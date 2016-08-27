<?php
class AdminModel extends BaseModel
{
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

        $_SESSION['result'] = $result;

        return $result;
    }

    public function getUserInfo($id)
    {
        $statement = self::$db->prepare(
            "SELECT u.username, g.group_name, u.full_name, u.email, u.About, a.comments_count, a.points, a.points_given_by_user "
            ."FROM users u "
            ."JOIN u_g_interaction ugi on ugi.user_id = u.id "
            ."JOIN groups g on ugi.group_id = g.id "
            ."JOIN activity a on a.user_id = u.id "
            ."WHERE u.id = ?");

        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function deleteUser($id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM post_user_status WHERE user_id = ?"
        );

        $statement->bind_param("i", $id);
        $statement->execute();

        $adminID = $_SESSION['id'];
        $statement = self::$db->prepare(
            "UPDATE posts SET user_id =$adminID WHERE user_id =? "
        );

        $statement->bind_param("ii", $adminID, $id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE author_id = ?"
        );

        $statement->bind_param("i", $id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM u_g_interaction WHERE user_id = ?"
        );

        $statement->bind_param("i", $id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM activity WHERE user_id = ?"
        );

        $statement->bind_param("i", $id);
        $statement->execute();

        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->affected_rows == 1;
    }
}
