<?php
namespace App\Models;

use Core\Model;
use App\Models\Menu;
use App\Helpers\Helper;
class Product extends Model
{
    private $table = 'products';
    private $resultArray = [];
    private $menu;

 public function get($id = 0)
 {
     $this->menu = new Menu;
    //  $sql = "SELECT * from $this->table where menu_id = $id";
    //  $this->resultArray = $this->fetchArray($sql);
     $data = [(int)$id];
     $menu_id = $this->menu->getChild($data);     
    array_push($menu_id, $data[0]);
    $condition = Helper::array_to_commaString($menu_id);
    
    if(!is_null($menu_id)) {
        $sql = "SELECT * from $this->table where menu_id IN ($condition)";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($this->resultArray, $row);
                
            }

            
        }
        
        
    }
   
    
     return $this->resultArray;
 }   
}