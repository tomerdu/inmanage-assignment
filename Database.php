<?php
class Database {
    private $host = "localhost";
    private $dbname = "inmanage_test";
    private $username = "root";   
    private $password = "";       
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // SELECT
    public function select($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // INSERT
    public function insert($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }

    // UPDATE
    public function update($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    // DELETE
    public function delete($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }
}
