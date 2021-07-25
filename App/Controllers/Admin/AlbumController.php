<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use Core\Helper;
use Core\Session;


class AlbumController extends Auth
{

    public function list()
    {
        $dir = $_SERVER["DOCUMENT_ROOT"]."public/uploads/";
        // dd(is_dir($_SERVER["DOCUMENT_ROOT"]."public/uploads/2021/07/23/gd05.jpg"));
        $file = $this->getpath();
        // dd($this->getpath($dir));
        // dd($_GET);
        if(isset($_GET['order'])) {
            if ($_GET['order'] == 'desc') {
                $file = array_reverse($file);
            }
        }
        $this->loadView('admin/main',[
            'title' => 'Bộ sưu tập',
            'template' => 'album/list',
            'image' => $file
        ]);
    }
     public function addProduct()
    {
        $file = $this->getpath();
        $file = array_reverse($file);
        return json($file);
    }
/**
 * This function return path of all image
 */
    public function getpath($dir = 'D:/laragon/www/login/public/uploads/')
    {        
        
        $year= [];
        $month = [];
        $day = [];
        $file = [];
        $temp = '';
        
        $path = array_diff(scandir($dir), array('..', '.'));
        //year
        foreach ($path as $key=>$val){
            array_push($year, $val);
            // $year = $path;
        }
        //month
        if (!empty($year) || is_null($year)) {
            foreach ($year as $key=>$val) {
                $path = array_diff(scandir($dir.$val), array('..', '.'));
                $month[$val] = $path;
            }
        }
        //day
        if (!empty($month) || is_null($month)) {
            foreach ($year as $keyYear=>$valYear) {
                    array_push($day, $valYear);
                    foreach ($month[$valYear] as $keyMonth=>$valMonth) {
                        $path = array_diff(scandir($dir . $valYear . '/' . $valMonth . '/'), array('..', '.'));                          
                        $day[$valYear][$valMonth] = $path;                             
                    }
                
            }    
        }
        //file
        if (!empty($day) || is_null($day)) {
            foreach ($year as $keyYear=>$valYear) {
                foreach ($month[$valYear] as $keyMonth=>$valMonth) {                        
                    foreach ($day[$valYear][$valMonth] as $keyDay=>$valDay) {
                        $path = array_diff(scandir($dir . $valYear . '/' . $valMonth . '/' . $valDay), array('..', '.')); 
                        foreach ($path as $keyFile=>$valFile) {
                            array_push($file, '/uploads/' . $valYear . '/' . $valMonth . '/' . $valDay . '/'. $valFile);
                        }
                    }                         
                }
                
            }    
        }

     
        return $file;

    }

}