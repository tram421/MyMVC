<?php
namespace App\Models;
use Core\Model;
class Page extends Model
{
    private $table = 'pages';
    public function show($slug = 'gioi-thieu')
    {
        $sql = "SELECT * From $this->table where `slug` = '$slug'";
   
        return $this->fetch($sql);
    }
}