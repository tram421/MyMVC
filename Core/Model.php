<?php
namespace Core;

use Core\DB;
class Model extends DB
{
    public $data;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function query($sql = '')
    {
        $query = $this->conn->query($sql);
        if ($query) return $query;
        // return false;
        die($this->conn->error . ": " . $sql);
    }

    public function fetch($sql = '')
    {
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return NULL;

    }

    public function fetchArray($sql = '')
    {
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->data[] = $row;
            }  
        }
        return $this->data;
    }

    public function insertArray($data = [], $table = '')
    {
        if ($table == '') die('Table not exist');
        $field = '';
        $val = '';
        foreach ($data as $key => $value) {
            $field .= $key . ', ';
            $val .= "'" .  $value . "', ";
        }
        $field = substr(trim($field), 0, -1);
        $val = substr(trim($val), 0, -1);

        $sql = "INSERT into $table (". $field .") values (" . $val . ")";
        
        return $this->query($sql);
    }

    public function updateArray($data = [], $table = '', $id = 0)
    {
        if ($table == ''){
            die('Table is not exist');
        }
        $sqlArray = '';
        foreach($data as $key => $value) {
            $sqlArray .= " $key = '" . $value . "', ";
        }
        $sqlArray = substr(trim($sqlArray),0,-1);
        // echo "UPDATE $table set $sqlArray where id = $id";

        return $this->query("UPDATE $table set $sqlArray where id = $id");
    }


}