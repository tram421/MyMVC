<?php
namespace App\Models;

use Core\Model;

class Order extends Model
{

    private $table = 'orders';
    private $table_products = 'products_order';
    public function add($idUser = '', $name = '', $phone = '', $address = '', $note = '',$cost = 0)
    {
        $time = date("Y-m-d H:i:s");
        
        $sql = "INSERT into `$this->table` (`idUser`, `name`,`phone`,`address`,`note`, `cost`, `state`, `created_at`) 
                values ($idUser, '$name', '$phone', '$address', '$note', $cost, 'create', '$time')";
                
        return $this->query_getID($sql);
    }
    
    /*ALTER TABLE products_order ADD CONSTRAINT lk FOREIGN KEY (order_id) REFERENCES orders(id) on delete cascade; */
    public function add_products($data = [], $idOrder)
    {
        $sql = '';
        $arr = array_reverse($data);
        $len =substr(array_keys($arr)[0],-1,1);
        for ($i=0; $i<=$len; $i++) {
            $id = 'id-'.$i;
            $quantity = 'quantity-product-'.$i;
            $sql = "INSERT into `$this->table_products` (`id_product`,`quantity`,`order_id`) values ($data[$id],$data[$quantity],$idOrder);";
            $this->query($sql);
        }        
        return true;
    }
    public function getProduct($idOrder = 0)
    {
        $sql = "SELECT products.name, $this->table_products.quantity,  products.price_sale FROM $this->table_products JOIN orders
                ON $this->table_products.order_id = orders.id JOIN products ON $this->table_products.id_product = products.id WHERE orders.id = $idOrder";
        // dd($sql);
        return $this->fetchArray($sql);
    }

    public function getOrderOfUser($idUser = 0)
    {
        $sql = "SELECT  $this->table_products.quantity, products.name, products.id as product_id, products.file, products.price_sale, orders.ship, orders.total, orders.cost, orders.id, orders.state
                FROM $this->table_products JOIN products
                ON $this->table_products.id_product= products.id 
                JOIN orders ON $this->table_products.order_id = orders.id
                WHERE orders.idUser = $idUser AND orders.state <> 'complete'";
//    dd($sql);
        return $this->fetchArray($sql);
    }
    public function getOrderComplete($idUser = 0)
    {
        $sql = "SELECT  $this->table_products.quantity, products.name, products.id as product_id, products.file, products.price_sale, orders.ship, orders.total, orders.cost, orders.id, orders.state
                FROM $this->table_products JOIN products
                ON $this->table_products.id_product= products.id 
                JOIN orders ON $this->table_products.order_id = orders.id
                WHERE orders.idUser = $idUser AND orders.state = 'complete'";
   
        return $this->fetchArray($sql);
    }
    public function countOrder($idUser = 0)
    {
        $sql = "SELECT Distinct `id` from `$this->table` where `idUser` = $idUser AND orders.state <> 'complete'";
        return $this->fetchArray($sql);
    }
     public function countOrderComplete($idUser = 0)
    {
        $sql = "SELECT Distinct `id` from `$this->table` where `idUser` = $idUser AND orders.state = 'complete'";
        return $this->fetchArray($sql);
    }
    
    public function getOrders()
    {
        $sql = "SELECT *
                From $this->table 
                WHERE $this->table.is_delete IS NULL";
        // dd($sql);
        return $this->fetchArray($sql);
    }
}