<?php
namespace App\Models;
use Core\Model;
class Post extends Model
{
    private $table = 'posts';
    public function getForSlide()
    {
        $sql = "SELECT * from $this->table where is_delete = 0 order by id desc";
        return $this->fetchArray($sql);
    }
}