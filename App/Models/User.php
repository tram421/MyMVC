<?php 
namespace App\Models;

use Core\Model;
class User extends Model
{
    private $table = 'users';
    public function get(string $email)
    {
        // dd($email);
        return $this->fetch("SELECT * from users where email = '" . $email . "'");
    }
    public function getFromId(string $id)
    {
        return $this->fetch("SELECT * from $this->table where `id` = '" . $id . "'");
    }
    public function getUser()
    {
        $sql = "SELECT * from `$this->table` where `is_delete` = 0";
        return $this->query($sql);
    }
    public function create($email = '', $pass = '', $address = '', $phone = '')
    {
        if(!empty($email) && !empty($pass) && !empty($address) && !empty($phone)) {
            $time = date("Y-m-d H:i:s");
            $sql = "INSERT into `$this->table` (`email`, `password`, `phone`, `permision`, `address`, `created_at`) values ('$email', '$pass', '$phone','user','$address', '$time')";
            // dd($sql);
            return $this->query($sql);
        }
        return NULL;        
    }
    public function update($data = [], $id = 0)
    {
        
        return $this->updateArray($data, $this->table, $id);
    }

    public function getOrder($id)
    {
        $sql = "SELECT $this->table.*,  orders.id as order_id, orders.total, orders.created_at as order_created, orders.state from $this->table JOIN `orders` ON $this->table.id = orders.idUser where $this->table.id = $id";
        // dd($sql);
        return $this->fetchArray($sql);
    }
    public function getSumOrder($id)
    {
        $sql = "SELECT SUM(`cost`) as `sum` from `orders` where idUser = $id AND orders.state = 'complete'";
        return $this->fetch($sql);
    }
    public function getAll()
    {
        $sql = "SELECT * from $this->table";
        return $this->fetchArray($sql);
    }
}
// 2021-06-30 10:43:14
// 2021-06-30 10:59:52
// INSERT INTO `users` (`id`, `email`, `password`, `phone`, `permision`, `address`, `info`, `is_delete`, `created_at`) 
// VALUES (NULL, 'maitram@gmail.com', '$2y$10$2PgCNlvIhaq9QWzdw20Jg.OqaTKMgl2BZHXkadercJD31F0bzVpSa', '0123456789', 'user', '5A, Phó Cơ Điều, Phường 8, Thành phố Vĩnh Long, Vĩnh Long', NULL, NULL, CURRENT_TIMESTAMP);