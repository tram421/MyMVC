<?php
namespace App\Helpers;

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
                                "<td>" . $value['order_by'] . "</td>".
                                "<td>" . $this->active($value['active']) . "</td>".
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


    private function active($is_active = 0)
    {
        return ($is_active == 0)
        ? "<a href = '' ><button type='button' class='btn btn-block bg-gradient-secondary '>Không kích hoạt</button></a>"
        : "<a href = '' ><button type='button' class='btn btn-block bg-gradient-success'>Kích hoạt</button></a>";
    }


}