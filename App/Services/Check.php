<?php
namespace App\Services;

class Check
{
    public function file_exist()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $file = (isset($_POST['file'])) ? $_POST['file'] : '';
            if (file_exists(_PUBLIC_PATH_.$file)) {
                return json(['error' => false, 'file' => $file]);
            } 
            return json(['error'=>true , 'noImage' => _PUBLIC_PATH_.'/template/images/no-image.jpg']);
            
        }
        return json(['error'=>true]);
    }
}