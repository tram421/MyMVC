<?php

namespace Core;

use mysqli;

class DB
{
    protected $servername   = '';
    protected $username     = '';
    protected $password     = '';
    protected $database     = '';
    protected $conn     = '';

   public function __construct()
   {
       global $DB;
        $this->servername = $DB['servername'];
        $this->username = $DB['username'];
        $this->password = $DB['password'];
        $this->database = $DB['database'];
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die('Không thể kết nối database, Vui lòng kiểm tra lại');
        }
        $this->conn->set_charset('utf8');
   }     
}