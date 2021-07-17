<?php
namespace App\Models;

use Core\Model;
use App\Models\Menu;
use App\Helpers\Helper;
class Product extends Model
{
    const LIMIT = 8;
    private $table = 'products';
    // private $resultArray = [];
    private $menu;
/**
 * Function for get list product from choose catergory
 * get product have menu_id and all product of child of that menu
 * this function have selection: page to loadmore
 * and to use it need send the id of menu_id
 * param: id of menu, number page, orderBy (name field), and desc or asc
 * result: array of products have menu_id and child
 */
 public function getChild($id = 0, $page = NULL, $orderBy = "id", $order = "asc")
 {
     $this->menu = new Menu;
     #$data is Array because the getChild function use recursive to get id child of menu, so I use first data is a array
     $data = [(int)$id];
     $menu_id = $this->menu->getChild($data);     
    array_push($menu_id, $data[0]);
    $condition = Helper::array_to_commaString($menu_id);
   
    if(!is_null($menu_id)) {
        $sql = "SELECT * from $this->table where menu_id IN ($condition) order by $orderBy $order limit " . self::LIMIT;
        
        if ($page !== NULL) {
            if($page > 0) {
                $page--;
                $offset = $page * self::LIMIT;
                $sql .= " offset $offset";
            }
        }
    }
    
     return $this->fetchArray($sql);
 }


 public function get($id) {
     $sql = "SELECT products.* , menus.name as menu_name, menus.id as menu_id, products.name as products_name
            from $this->table JOIN menus ON $this->table.menu_id = menus.id 
            where $this->table.id = $id";
            
     return $this->fetch($sql);
 }

 public function getFeature($sl = 20) {

     $sql = "SELECT $this->table.*, (100-($this->table.price_sale/$this->table.price)*100) as percent FROM $this->table where `feature` = 1 limit $sl";
            
     return $this->fetchArray($sql);
 }
 public function getNewest() {

     $sql = "SELECT * FROM $this->table order by id desc limit 20";
            
     return $this->fetchArray($sql);
 }
 public function getSale() {

     $sql = "SELECT $this->table.*, (100-($this->table.price_sale/$this->table.price)*100) as percent FROM `$this->table` order by percent DESC limit 20";
            
     return $this->fetchArray($sql);
 }
 
}