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
}
