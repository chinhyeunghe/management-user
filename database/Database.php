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

    // Update

    public function update($table, $data, $where) {

        $set = "";

        foreach($data as $key => $value) {

            $set .= "{$key} = :{$key}, ";
        }

        $sql = "UPDATE {$table} SET  ".rtrim($set, ", ")." WHERE {$where}";
        $stmt = $this->pdo->prepare($sql);

        foreach($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        return $stmt->execute();

    }
    // delete

    public function delete($table, $where) {

        $sql = "DELETE FROM {$table} WHERE {$where}";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }



    // Query DB

    public function myQuery($sql, $params = [] , $fetchOne = false) {

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        if ($fetchOne) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        // fetchAll
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



}

// khởi tạo luôn

$initDB = new Database($config);

return $initDB;