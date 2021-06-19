<?php

namespace App\Models;

use Core\Model;

class Slide extends Model
{
    protected $table = 'slides';
    public function get()
    {
        return $this->fetchArray("SELECT * from $this->table  order by sort_by desc");
    }
}