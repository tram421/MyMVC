<?php 
namespace App\Models;

use Core\Model;
class User extends Model
{
    public function get(string $email)
    {
        return $this->fetch("SELECT * from users where email = '" . $email . "'");
    }
}