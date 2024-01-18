<?php
require_once 'app/config/DbConnection.php';
require_once 'app/models/interfaces/userService.php';
class User implements UserService
{
    private $db;
    private $userId;
    private $userName;
    private $email;
    private $password;
    private $fullName;
    private $roleId;
    private $status;
    private $createdAt;
    private $updatedAt;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    // Getter and Setter for $userId
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    // Getter and Setter for $userName
    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    // Getter and Setter for $email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter and Setter for $password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter and Setter for $fullName
    public function getFullName()
    {
        return $this->fullName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    // Getter and Setter for $roleId
    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    // Getter and Setter for $status
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Getter and Setter for $createdAt
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    // Getter and Setter for $updatedAt
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


    public function Add(): bool
    {
        $connection = $this->db->getConnection();
        $query = "CALL AddUser(?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connection->prepare($query);
        $statement->bindParam(1, $this->userName, PDO::PARAM_STR);
        $statement->bindParam(2, $this->email, PDO::PARAM_STR);
        $statement->bindParam(3, $this->password, PDO::PARAM_STR);
        $statement->bindParam(4, $this->fullName, PDO::PARAM_STR);
        $statement->bindParam(5, $this->roleId, PDO::PARAM_INT);
        $statement->bindParam(6, $this->status, PDO::PARAM_INT);
        $statement->bindParam(7, $this->createdAt, PDO::PARAM_STR);
        $statement->bindParam(8, $this->updatedAt, PDO::PARAM_STR);

        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function Delete(): bool
    {
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


    public function Detail($userId)
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "select * from user where username = ?";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $userId);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return false;
        }
    }

    public function getUserByUsername($username)
    {
        $connection = $this->db->getConnection();
        if ($connection) {
            $query = "select * from user where username = ?";
            $statement = $connection->prepare($query);
            $statement->bindParam(1, $username);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

}