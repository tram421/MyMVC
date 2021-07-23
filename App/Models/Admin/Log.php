<?php
namespace App\Models\Admin;
use Core\Model;
class Log extends Model
{
    private $table = 'log';
    public function insert($data)
    {
        return $this->insertArray($data, $this->table);
    }
    public function get($limit = 0, $offset = 0, $sort = 'asc')
    {
        if ($limit == 0 && $offset == 0) {
             $sql = "SELECT $this->table.*, users.name, users.email, users.permision from $this->table
                JOIN users ON $this->table.user = users.id";
            return $this->fetchArray($sql);
        }
        if ( $limit != 0) {
            $sql = "SELECT $this->table.*, users.name, users.email, users.permision from $this->table
                    JOIN users ON $this->table.user = users.id
                    order by $this->table.id $sort limit $limit offset $offset";

            return $this->fetchArray($sql);
        }
       
    }
    public function getForSearch($filter = 0, $input = '', $limit = 0, $offset = 0, $sort = 'desc')
    {
        if ($filter == 0) {
            if ($limit == 0 && $offset == 0) {
                 $sql = "SELECT $this->table.*, users.name, users.email, users.permision from $this->table
                        JOIN users ON $this->table.user = users.id WHERE $this->table.user = $input";
            }
            if ( $limit != 0) {
            $sql = "SELECT $this->table.*, users.name, users.email, users.permision from $this->table
                        JOIN users ON $this->table.user = users.id WHERE $this->table.user = $input
                    order by $this->table.id $sort limit $limit offset $offset";            
            }
            return $this->fetchArray($sql);
           
        } 
        if ($limit == 0 && $offset == 0) {
                $sql = "SELECT $this->table.*, users.name, users.email, users.permision from $this->table
                    JOIN users ON $this->table.user = users.id WHERE $this->table.action LIKE '%$input%'";
        }
        if ( $limit != 0) {
            $sql = "SELECT $this->table.*, users.name, users.email, users.permision from $this->table
                    JOIN users ON $this->table.user = users.id WHERE $this->table.action LIKE '%$input%'
                    order by $this->table.id $sort limit $limit offset $offset";            
            }
        return $this->fetchArray($sql);


        
    }

}