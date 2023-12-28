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
    public function getUserId(): int {
        return $this->userId;
    }

    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    // Getter and Setter for $userName
    public function getUserName(): string {
        return $this->userName;
    }

    public function setUserName(string $userName): void {
        $this->userName = $userName;
    }

    // Getter and Setter for $email
    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    // Getter and Setter for $password
    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
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