<?php
class DbConnection {
    private $servername = 'localhost:3306';
    private $username = 'root';
    private $password = '';
    private $dbname = 'dbvoucher';

    protected $conn;
   
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Dùng để bắt lỗi
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
 
    public function getConnection() {
        return $this->conn;
    }
}
?>