<?php


class UserModel {

    // Nhận kết nối DB

   public $db;
   protected $table = "users";

   public function __construct()
   {
        $DB = require_once "../database/Database.php";
        $this->db = $DB;
   }


   public function addUser($data) {
        if($this->db->create($this->table, $data)) {
            return true;
        }
        return false;
   }



}