<?php
namespace Core;

class Controller
{
    public function loadView($view = '', $data = [])
    {
        if (file_exists(__VIEW__.'/' . $view.'.php')) {
            extract($data);
            include __VIEW__ . "/$view.php";
            return;
        }
        die($view . " not found" . __VIEW__ . "$view.php");
            
    }
}