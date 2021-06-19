<?php

namespace App\Models;

use Core\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public function get()
    {
        return $this->query("SELECT id, name from $this->table where active = 1 && parent_id = 0 order by order_by desc");
    }
}
