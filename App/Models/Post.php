<?php
namespace App\Models;
use Core\Model;
class Post extends Model
{
    private $table = 'posts';
    public function getForSlide()
    {
        $sql = "SELECT * from $this->table where is_delete = 0 order by id desc limit 5";
        return $this->fetchArray($sql);
    }
    public function show($id = 0)
    {
        $sql = "SELECT * from $this->table where id = $id";
        return $this->fetch($sql);
    }
    public function search($string)
    {
        $sql = "SELECT * from $this->table where `description` LIKE '%$string%' OR `title` LIKE '%$string%'";
      
        return $this->fetchArray($sql);
    }
    public function getCategories()
    {
        $sql = "SELECT DISTINCT `category` from $this->table";
   
        return $this->fetchArray($sql);
    }
    
    public function getFromCat($cat = '')
    {
        $sql = "SELECT * from $this->table WHERE `category` = '$cat'";
   
        return $this->fetchArray($sql);
    }
}