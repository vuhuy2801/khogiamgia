<?php
require_once '../config/DbConnection.php';
require_once __DIR__ . '/interface/userService.php';
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

    public function setEmail(string $email) {
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
        return true;
    }

    public function Edit(): bool {
        return true;
    }

    public function Delete(): bool {
        return true;
    }

    public function List(): array {
        return [];
    }
}
?>