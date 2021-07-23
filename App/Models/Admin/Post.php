<?php
namespace App\Models\Admin;
use Core\Model;
class Post extends Model
{
    private $table = 'posts';
    public function insert($data = [])
    {
        return $this->insertArray($data, $this->table);
    }
    public function get($sort = 'asc', $cat = 'all', $trash = 0)
    {  
        $sql = "SELECT * FROM $this->table WHERE `is_delete` <> 1 order by id $sort ";      
        if ($cat != 'all') {
            $sql .= " AND `category` = '$cat'";
        }
        if($trash == 1 && $cat == 'all') {
            $sql = "SELECT * FROM $this->table WHERE `is_delete` = 1 order by id $sort";
        }
        if($trash == 1 && $cat != 'all') { //chi lay danh sach trong thung rac cua tat ca bai viet chu khong phan biet category
           return false;
        }
        // dd($sql);
        return $this->fetchArray($sql);
    }
    public function update($data = [], $id = 0)
    {
        
        return $this->updateArray($data, $this->table, $id);
    }
     public function show($id)
    {
        $data = $this->fetch("SELECT *from $this->table where `id` = $id ");
        
        return $data;
    }
    public function getMaxId()
     {
         return $this->fetch("SELECT MAX(`id`) as max from $this->table");
     }
}