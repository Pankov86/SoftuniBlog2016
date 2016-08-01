<?php

class UsersModel extends BaseModel
{
    public function deleteUserPosts()
    {
        
    }
    
  

    public function makeAdmin($id)
    {
        $statement = self::$db->prepare(
            "UPDATE user_group_interaction SET user_group = 'admin' WHERE user_id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function makeUser($id)
    {
        $statement = self::$db->prepare(
            "UPDATE user_group_interaction SET user_group = 'user' WHERE user_id = ?"
        );
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function defineRole($id)
    {
        $statement = self::$db->query(
            "SELECT user_group FROM user_group_interaction WHERE user_id = $id");
        return $statement->fetch_assoc();
    }
    
    public function getUserInfo($id)
    {
        $statement = self::$db->prepare(
            "SELECT u.username, g.group_name, u.full_name, u.email, a.comments_count, a.points, a.points_given_by_user
  FROM users u
  join u_g_interaction ugi on ugi.user_id = u.id
  join groups g on ugi.group_id = g.id
  join activity a on a.user_id = u.id

WHERE u.id = ?");
        $statement->bind_param("i",$id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function getAll(): array
    {
        $statement = self::$db->query(
            "SELECT users.id, users.username, users.full_name, user_group_interaction.user_group ".
            "FROM users JOIN user_group_interaction ".
            "ON users.id = user_group_interaction.user_id ".
            "ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function checkUniqueUserAndMail(
        string $username, string $email)
    {
        $query = self::$db->query("select * from users where username = '$username' or email = '$email'");
        return mysqli_num_rows($query);
    }
    
    
    public function register(
        string $username, string $password, string $full_name, string $email)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = self::$db->prepare(
            "INSERT INTO users (username, password_hash, full_name, email) ".
            "VALUES (?, ?, ?, ?)");
        $statement->bind_param("ssss", $username, $password_hash, $full_name, $email);
        $statement->execute();
        if ($statement->affected_rows != 1){
            return false;
        }
        $user_id = self::$db->query(
            "SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $user_id;
    }
    
    public function getGroupIdByGroupName($group)
    {
        $statement = self::$db->prepare(
            "SELECT id FROM groups WHERE group_name = ?");
        $statement->bind_param("s", $group);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result['id'];
    }
    
    public function fillUGInteraction($user_id, $group_id)
    {
        $statement = self::$db->prepare("INSERT INTO u_g_interaction (user_id, group_id) VALUES (?, ?)");
        $statement->bind_param('ii', $user_id, $group_id);
        $statement->execute();
        $result = $statement->affected_rows;
        return $result;
    }
    
    public function getGroupById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT group_name FROM groups where id = (SELECT group_id from u_g_interaction where user_id = ?)");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result['group_name'];
    }
    
    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare(
            "SELECT id, password_hash FROM users WHERE username = ? OR email = ?");
        $statement->bind_param("ss", $username, $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if (password_verify($password, $result['password_hash'])){
            return $result['id'];
        }
        else{
            return false;
        }
    }
}
