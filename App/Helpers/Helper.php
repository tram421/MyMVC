<?php
namespace App\Helpers;

use Core\Model;
use Core\Helper as CoreHelper;

class Helper
{
    private $stt = 0;
    #Display all category both sub category
    public function menuShow_option($data, $parent = 0, $symbol = '')
    {
        $html = '';
        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $parent) {
                $html .= "<option value = '". $value['id'] ."'>" . $symbol . $value['name'] . "</option>";
                unset($data[$key]);
                $html .= self::menuShow_option($data, $value['id'], '|----');
            }            
        }
        return $html;
    }

    public function menuShow($data, $parent = 0, $symbol = '')
    {
        //onclick="deleteRow(2, '/admin/menus/delete')"
        $html = '';
        $this->stt += 1;
        foreach ($data as $key => $value) {
            if ( $value['parent_id'] == $parent ) {
                $html .=    "<tr>".
                                "<td>" . $this->stt . "</td>".
                                "<td>" . $value['id'] . "</td>".
                                "<td>" . $symbol . $value['name'] . "</td>".
                                "<td>" . $value['image'] . "</td>".
                                "<td>" . $value['order_by'] . "</td>".
                                "<td>" . $this->active($value['active'], $value['id'], '/admin/menus/editActive/' ) . "</td>".
                                "<td>" . $value['updated_at'] . "</td>".
                                "<td><a href = '/admin/menus/edit/". $value['id'] ."'><i class = 'far fa-edit'></i></a></td>".
                                '<td><a href = "#" onclick = "deleteRow('.$value['id'].', \'/admin/menus/delete\')" ><i class = "far fa-trash-alt"></i></a></td>'.
                            "</tr>";
                unset($data[$key]);
                $html .= self::menuShow($data, $value['id'], '|-----');
            }
            
        }
        return $html;
    }


    public static function active($is_active = 0, $id, $url = '')
    {
        return ($is_active == 0)
        ? '<a href = "'.$url.$id.'/0 "><button id = "active" type="button"  class="btn btn-block bg-gradient-secondary ">Không kích hoạt</button></a>'
        : '<a href = "'.$url.$id.'/1 "><button id = "active" type="button"  class="btn btn-block bg-gradient-success">Kích hoạt</button></a>';
    }

    public static function menuAll()
    {
        $model = new Model;
        $sql = "SELECT id, name, parent_id from menus where active = 1 order by order_by desc";
        $menus = $model->fetchArray($sql);

        return $menus;

    }

    public static function menuPublic($data, $parentId = 0)
    {
        $html = '';
        // $html .= '<li>';
        // $html .= '<a href="/" title = '. __PRODUCT_PAGE__ .'>' . __PRODUCT_PAGE__ . '</a>';
        // $html .= '<ul>';
        foreach($data as $key => $value) {
            if ($value['parent_id'] == $parentId) {
                $html .= '<li>';
                $html .= '<a href="/danh-muc/'. CoreHelper::slug($value['name']) . '-id'. $value['id'] .'.html" 
                                    title="' . $value['name'] . '">' . $value['name'] . '
                            </a>';
                if (self::isChild($data, $value['id'])) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menuPublic($data, $value['id']);
                    $html .= '</ul>';
                }
                $html .= '</li>';
            }
          
        }
        // $html .= '</ul></ul>';
        return $html;
    }

    private static function isChild($menu, $id = 0)
    {
        foreach ($menu as $key) {
            if ($key['parent_id'] == $id) return true;
        }
        return false;
    }
/**
 * because in sql sometimes we use syntax: select...from...where .. IN (a,b,c)
 * this function will convert from array [1,2,3] to "a,b,c" for use sql sentence
 */
    public static function array_to_commaString($array)
    {
        $result = '';
        foreach($array as $key=>$value) {
            $result .= $value .',';
        }
        $result = substr($result,0,-1);
        return $result;
    }
}