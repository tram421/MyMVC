<?php
namespace App\Models\Admin;
use Core\Model;
class Page extends Model
{
    private $table = 'pages';
    public function show($slug = 'gioi-thieu')
    {
        $sql = "SELECT * From $this->table where `slug` = '$slug'";
   
        return $this->fetch($sql);
    }
     public function update($data = [], $id = 0)
    {
        
        return $this->updateArray($data, $this->table, $id);
    }
}