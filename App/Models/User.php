<?php 
namespace App\Models;

use Core\Model;
class User extends Model
{
    private $table = 'users';
    public function get(string $email)
    {
        return $this->fetch("SELECT * from users where email = '" . $email . "'");
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
}
// 2021-06-30 10:43:14
// 2021-06-30 10:59:52
// INSERT INTO `users` (`id`, `email`, `password`, `phone`, `permision`, `address`, `info`, `is_delete`, `created_at`) 
// VALUES (NULL, 'maitram@gmail.com', '$2y$10$2PgCNlvIhaq9QWzdw20Jg.OqaTKMgl2BZHXkadercJD31F0bzVpSa', '0123456789', 'user', '5A, Phó Cơ Điều, Phường 8, Thành phố Vĩnh Long, Vĩnh Long', NULL, NULL, CURRENT_TIMESTAMP);