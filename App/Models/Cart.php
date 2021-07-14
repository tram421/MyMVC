<?php
namespace App\Models;

use Core\Model;

class Cart extends Model
{
    private $table = 'cart';
    
    public function insert($idUser = 0, $idProduct = 0, $quantity = 0)
    {
        $created_at = date("Y-m-d H:i:s");
        // /INSERT INTO `cart` (`id`, `id_product`, `quantity`, `id_user`, `created_at`, `updated_at`) VALUES (NULL, '36', '1', '11', '2021-07-02 15:09:24', NULL);
        $sql = "INSERT into `$this->table` (`id_product`, `quantity`, `id_user`, `created_at`) values ('$idProduct', '$quantity', '$idUser', '$created_at')";
        return $this->query($sql);
    }
    public function update($id = 0, $quantity = 0)
    {
        $update_at = date("Y-m-d H:i:s");
        $sql = "UPDATE `$this->table` SET `quantity` = $quantity, `updated_at` = '$update_at' WHERE `id` = $id";
        return $this->query($sql);
    }
    public function delete($id = 0) {
        $sql = "DELETE FROM `$this->table` WHERE id = $id";
        return $this->query($sql);
    }

    public function delete_byUser($idUser = 0) {
        $sql = "DELETE FROM `$this->table` WHERE id_user = $idUser";
        return $this->query($sql);
    }

    public function get($idUser = 0, $idProduct = 0)
    {
        //SELECT cart.*, products.id as products_id, products.name as products_name, products.price, products.price_sale, products.file  
        //FROM `cart` JOIN products ON cart.id_product = products.id WHERE cart.id_user = 11

        // $sql = "SELECT `$this->table`.*, products.id as `products_id`, products.name as `products_name`, products.price, products.price_sale, products.file  
        //         from `$this->table` JOIN `products` ON $this->table.id_product = products.id where `id_user` = $idUser";
         $sql = "SELECT * from  `$this->table`";
        if ($idUser != 0) {
        $sql = "SELECT `$this->table`.*, `products`.`id` as `products_id`, `products`.`name` as `products_name`, `products`.`price`, `products`.`price_sale`, `products`.`file`  
                from `$this->table` JOIN `products` ON `$this->table`.`id_product` = `products`.`id` where `id_user` = $idUser";
         }
        if ($idProduct != 0) {
            $sql .= " AND `id_product`=$idProduct";
        }
        // dd($sql);
        return $this->query($sql);
    }
    
}