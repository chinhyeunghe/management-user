<?php

$config = require_once "../config/config.php";

class Database {

    private static $instance = null;
    private $pdo;

    public function __construct($config) {

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->pdo = new PDO($dsn, $config['username'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $errorPdo) {
            echo "<br> Đã xảy ra lỗi rồi: ".$errorPdo->getMessage()."<br>";
        }
    }

    public function getInstance($config) {

        if(self::$instance == null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    public function getConnect() {
        return $this->pdo;
    }

    // Insert

    public function create($table, $data) {

        $column = implode(", ", array_keys($data)); // id, name, ...
        $placeholders = ":".implode(", :", array_keys($data));

        $sql = "INSERT INTO {$table} ({$column}) VALUES ({$placeholders})";

        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);    
        }

       return $stmt->execute();
    }

}

// khởi tạo luôn

$initDB = new Database($config);

return $initDB;