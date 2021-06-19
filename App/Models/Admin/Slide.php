<?php
namespace App\Models\Admin;

use Core\Model;

class Slide extends Model
{
    public $table = 'slides';
    public function show($id = 0)
    {
        $sql = "SELECT * from " .$this->table . " where id = $id";
        // echo $sql;
        return $this->fetch($sql);
    }

    public function get()
    {
        $sql = "SELECT * from " .$this->table . " order by sort_by asc";
        // echo $sql;
        return $this->fetchArray($sql);
    }

    public function insert($data = [])
    {
        $this->insertArray($data, $this->table);
    }

    public function update($data = [], $id)
    {
        $this->updateArray($data, $this->table, $id);
    }
    
    public function delete($product, $id)
    {
        #Xóa File từ Public
        $link = _PUBLIC_PATH_ .'/'. $product['file'];

        if (file_exists($link)) {
            unlink($link);
        }

        return $this->query("DELETE FROM $this->table where id = $id ");
    }
}


