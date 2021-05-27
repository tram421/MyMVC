<?php
namespace App\Models\Admin;

use Core\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public function insert(array $data)
    {
        #kiểm tra trùng lặp - trùng name cùng 1 parent_id
        $sql = "SELECT * from $this->table 
                where name = "
                . "'" . $data['name'] . "'" 
                . "AND parent_id =" . $data['parent_id'];

        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            return $result = -1;
        }

        return $this->insertArray($data, $this->table);
    }

    public function getParent($parent = 0)
    {
        return $this->query("SELECT * from $this->table WHERE parent_id = $parent");
    }

    public function get()
    {
        return $this->fetchArray("SELECT * from $this->table");
    }
    public function show($id = 0)
    {
        return $this->fetch("SELECT * from $this->table where id = $id");
    }
    public function update($data = [], $id = 0)
    {
        return $this->updateArray($data, $this->table, $id);
    }
    public function delete($id)
    {
        return $this->query("DELETE from $this->table where id = $id or parent_id = $id ");
    }
    public function getActive()
    {
        return $this->query("SELECT * from $this->table where active = 1");
    }
}