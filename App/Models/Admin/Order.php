<?php
namespace App\Models\Admin;
use Core\Model;

class Order extends Model
{
    private $table = 'orders';
    public function getInFo($idOrder) 
    {
        $sql = "SELECT $this->table.idUser from $this->table where id = $idOrder";
        $result = $this->fetch($sql);
        // dd($result['idUser']);
        if ($result['idUser'] > 0) {
            $sql = "SELECT $this->table.id, $this->table.name,  $this->table.phone, $this->table.address, $this->table.idUser, $this->table.name as receiver_name, $this->table.phone as receiver_phone, $this->table.address as receiver_address,
                $this->table.state, $this->table.created_at,
                products_order.quantity, products.id as product_id, products.name as product_name, products.price as product_price, products.price_sale as product_sale, products.file as product_file,
                menus.name as category_name,
                users.email
                From $this->table JOIN products_order ON $this->table.id = products_order.order_id
                JOIN products ON products_order.id_product = products.id
                JOIN menus ON products.menu_id = menus.id
                JOIN users ON $this->table.idUser = users.id
                WHERE $this->table.id = $idOrder";
        } else {
            $sql = "SELECT $this->table.id, $this->table.name,  $this->table.phone, $this->table.address, $this->table.idUser, $this->table.name as receiver_name, $this->table.phone as receiver_phone, $this->table.address as receiver_address,
                $this->table.state, $this->table.created_at,
                products_order.quantity, products.id as product_id, products.name as product_name, products.price as product_price, products.price_sale as product_sale, products.file as product_file,
                menus.name as category_name
                From $this->table JOIN products_order ON $this->table.id = products_order.order_id
                JOIN products ON products_order.id_product = products.id
                JOIN menus ON products.menu_id = menus.id
                WHERE $this->table.id = $idOrder";
        }
        
        // dd($sql);
        return $this->fetchArray($sql);
    }

    public function storeShipCost($value, $id)
    {
        $sql = "UPDATE $this->table SET ship = $value WHERE id = $id";
        return $this->query($sql);
    }
    public function storeTotal($value, $id)
    {
        $sql = "UPDATE $this->table SET total = $value WHERE id = $id";
        return $this->query($sql);
    }

    public function setState($state, $id)
    {
        $sql = "UPDATE `$this->table` SET `state` = '$state' WHERE id = $id";
        // dd($sql);
        return $this->query($sql);
    }
    public function delete($id)
    {
        $sql = "UPDATE `$this->table` SET `is_delete` = true WHERE id = $id";
        // dd($sql);
        return $this->query($sql);
    }
    public function getTrash()
    {
        $sql = "SELECT *
                From $this->table 
                WHERE `is_delete` = true";
        // dd($sql);
        return $this->fetchArray($sql);
    }
    public function getForTab($tab = '') 
    {
        if ($tab == 'all'){
            $sql = "SELECT *
            From `$this->table`
            WHERE `is_delete` IS NULL";
        } else {
            $sql = "SELECT *
                From $this->table 
                WHERE `is_delete` IS NULL AND `state` = '$tab'";
        }
       
        // dd($sql);
        return $this->fetchArray($sql);    
    }

    public function getForSearch($input)
    {
        $sql = "SELECT * from `$this->table`";
        if($input != '') {
            $sql .= " WHERE `id` = $input";
        }
        // dd($sql);
        return $this->fetchArray($sql);
    }
    public function getAll()
    {
        return $this->fetchArray("SELECT * FROM $this->table");
    }
    public function getCostAll()
    {
        return $this->fetch("SELECT SUM(`cost`) as cost FROM $this->table WHERE `state` = 'complete'");
    }
    public function getCondition($field = 'id', $value = 0)
    {
        $sql = "SELECT * FROM $this->table WHERE `$field` = '$value'";
        // dd($sql);
        return $this->fetchArray($sql);
    }

}