<?php

class Users_Model extends Base_Model{

    public function __construct(){

        parent::__construct();

    }

    public function addUser($user){

        ksort($user);
        $columns = implode(',', array_keys($user));
        $values = ':' . implode(', :', array_keys($user));
        $stmt = $this->db->prepare("INSERT INTO users($columns) VALUES($values);");

        foreach($user as $key=>$value){

            $stmt->bindValue(":$key", $value);

        }

        $stmt->execute();
        return $this->db->lastInsertId();

    }

    public function getUsers(){

        return $this->db->query("SELECT id, name_surname, email, username, password, created_at, role FROM users;")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function deleteUser($user) {

    $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");

    $stmt->bindValue(":id", $user['id']);

    $stmt->execute();

    return $stmt->rowCount();
    
    }

    

    public function deleteMultiple($ids) {
    if (is_array($ids)) {
        $idList = implode(',', array_map('intval', $ids));
        $query = "DELETE FROM users WHERE id IN ($idList)";
        $this->db->query($query);
    }
    }

    public function getUserById($id)
{
    $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return $user;
    } else {
        return false;
    }
}


    public function updateUser($id, $data)
{
    $stmt = $this->db->prepare("UPDATE users SET name_surname = :name_surname, email = :email, username = :username, password = :password, role = :role WHERE id = :id");
    $stmt->bindParam(':name_surname', $data['name_surname']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':password', $data['password']);
    $stmt->bindParam(':role', $data['role']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}
    public function findUserByEmailAndPassword($email, $password) {

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";
        
        $passwordHash = $password;
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':password' => $passwordHash
        ]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateRole($id, $role)
{
    $stmt = $this->db->prepare("UPDATE users SET role = :role WHERE id = :id");
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

    public function getKw1(){

        return $this->db->query("SELECT * FROM users WHERE role = 'admin';")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getKw2(){

        return $this->db->query("SELECT * FROM users WHERE role = 'user';")->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getKw3(){

        return $this->db->query("SELECT * FROM users WHERE created_at < '2025-01-01 00:00:00';")->fetchAll(PDO::FETCH_ASSOC);

    }


}