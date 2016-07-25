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
        $statement = self::$db->query(
            "SELECT * FROM users WHERE id = $id");
        return $statement->fetch_all(MYSQLI_ASSOC);
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

    public function getGroupById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT user_group FROM user_group_interaction ".
            "WHERE user_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result['user_group'];        
    }
    
    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare(
            "SELECT id, password_hash FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
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
