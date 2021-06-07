<?php
namespace App\Models\Admin;

use Core\Model;

class Product extends Model
{

    protected $table = 'products';

    public function insert($data = [])
    {
        return $this->insertArray($data, $this->table);
    }
    public function get($trash = 0, $limit = 0, $offset = 0)
    {
        if ($limit == 0 && $offset == 0) {
            $sql = "SELECT * from $this->table where is_trash = $trash";
            return $this->query($sql);
        }

        if ( $limit != 0) {
            $sql = "SELECT $this->table.*, menus.name as menu_name from $this->table join menus
                    on $this->table.menu_id = menus.id where is_trash = $trash 
                    order by $this->table.id desc limit $limit offset $offset";

            return $this->query($sql);
        }       
    }
    
    public function getNumRows($trash = 0)
    {
        $sql = "SELECT id from $this->table where is_trash = $trash";
        return $this->query($sql)->num_rows;
    }
   
    public function update($data = [], $id = 0)
    {
        
        return $this->updateArray($data, $this->table, $id);
    }

    public function show($id)
    {
        $data = $this->fetch("SELECT $this->table.*, menus.name as menu_name 
                                from $this->table JOIN menus 
                                on $this->table.menu_id = menus.id
                                where $this->table.id = $id ");
        if (is_null($data)) {
            $data = $this->fetch("SELECT * from $this->table where $this->table.id = $id ");
            if (!is_null($data)) {
                $data['menu_name'] = '';
            }
            
        }
        
        return $data;
    }

    public function trash($id)
    {
        $data = ['is_trash' => 1];
        return $this->updateArray($data, $this->table, $id);
    }

    public function delete($product, $id)
    {

        $link = _PUBLIC_PATH_ .'/'. $product['file'];
        if (file_exists($link)) {
            unlink($link);
        }
        return $this->query("DELETE FROM $this->table where id = $id ");
    }
}