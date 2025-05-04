<?php


class UserModel
{

     // Nhận kết nối DB

     public $db;
     protected $table = "users";

     public function __construct()
     {
          $DB = require_once "../database/Database.php";
          $this->db = $DB;
     }

     public function getAllUsers()
     {
          $sql = "SELECT * FROM {$this->table}";
          $result = $this->db->myQuery($sql);
          return $result;
     }

     public function addUser($data)
     {
          if ($this->db->create($this->table, $data)) {
               return true;
          }
          return false;
     }

     public function getUserBy($input) {
          $sql = "SELECT * FROM {$this->table} WHERE {$input}";
          $result = $this->db->myQuery($sql, [], true);
          return $result;
     }

     public function updateUser($data, $id) {
          if($this->db->update($this->table, $data, "id = {$id}")) {
               return true;
          }
          return false;
     }

     public function deleteUser($id) {
          if($this->db->delete($this->table, "id = {$id}")) {
               return true;
          }
          return false;
     }
}
