<?php

namespace App\Models;

use Core\Model;

class Menu extends Model
{
    protected $table = 'menus';
    private $treeMenu = [];
    private $i = 0;
    
    public function get($id = 0)
    {
        $sql = "SELECT id, name, image from $this->table where active = 1 && parent_id = $id order by order_by desc";
        return $this->query($sql);
    }

    #Dùng đệ quy để lấy hết con của 1 id danh mục
    public function getChild($data = []) { 
        #Điều kiện chẳng may rơi vào loop vô tận
       if($this->i < 500 && sizeof($data) > 0) {           
           $this->i = $this->i + 1;
           
            if (sizeof($data) > 0 && $data[0] != '') {      
                    $sql = "SELECT id from $this->table where active = 1 && parent_id = $data[0]";
                    $result = $this->fetchArray($sql);
                    if ($result == NULL) {
                        
                        array_shift($data);
                       
                        if(sizeof($data) > 0) self::getChild($data);
                        
                    } else {
                        if(sizeof($result) > 0) {
                        
                            foreach ($result as $key=>$value) {
                                
                                if (!in_array((int)$value['id'], $this->treeMenu)) {
                                    
                                    array_push($data, (int)$value['id']);
                                    array_push($this->treeMenu, (int)$value['id']);
                                }
                                
                                
                                
                            }
                            
                        }
                    }
                    
                    
                    

                    array_shift($data);
                    self::getChild($data);
                    
            }
            
            
            
            return $this->treeMenu;
       }
        
    }
}
