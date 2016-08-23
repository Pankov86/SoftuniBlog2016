<?php
class AdminModel extends BaseModel
{
    public function index()
    {
        $statement = self::$db->query(
            "SELECT u.username, g.group_name, u.email "
            . "FROM users u "
            . "JOIN u_g_interaction ugi on ugi.user_id = u.id "
            . "JOIN groups g on ugi.group_id = g.id");

        $_SESSION['info'] = $statement->fetch_all(MYSQLI_ASSOC);
    }
}
?>