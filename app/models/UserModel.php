<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/services/userService.php';
class User implements UserService {
    private $db;
    private $userId;
    private $userName;
    private $email;
    private $password;

    public function __construct(){
        $this->db = new DBConnection();
    }

    // Getter and Setter for $userId
    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Getter and Setter for $userName
    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    // Getter and Setter for $email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter and Setter for $password
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    

    public function Add(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL AddUser(?,?,?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->userName);
        $statement->bindParam(2, $this->email);
        $statement->bindParam(3, $this->password);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function Edit(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL UpdateUser(?,?,?,?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->userId);
        $statement->bindParam(2, $this->userName);
        $statement->bindParam(3, $this->email);
        $statement->bindParam(4, $this->password);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool {
        $connection = $this->db->getConnection();
        $query = "CALL DeleteUser(?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->userId);
        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function List(): array {
        $connection = $this->db->getConnection();
        if ($connection){
            $query = "CALL GetAllUsers()";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else{
            return [];
        }
    }
}
?>