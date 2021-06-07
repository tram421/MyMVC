<?php
namespace App\Controllers\Admin;
use App\Core\Auth;

class UploadController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }
    //add file + validate
    public function store($id = 0)
    {   
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $path = getFolder();

            $err = false;
            $fileName = basename($_FILES['file']['name']);
            $result = [
                'error' => false,
                'message' => 'Thành công'
            ];

            if ($fileName == '') {
                $result = [
                    'error' => true,
                    'message' => 'Vui lòng chọn file ảnh'
                ];
                $err = true;
                return json($result);
            }            

            if (!$err) {
                $isImage = getimagesize($_FILES['file']['tmp_name']);
                if (!$isImage) {
                    $result = [
                        'error' => true,
                        'message' => 'Vui lòng chọn file ảnh định dạng .jpg .png .jpeg .gif'
                    ];
                    $err = true;
                    return json($result);
                }
            }
            
            if (!$err) {
                $imageSize = $_FILES['file']['size'];
                if ($imageSize < 10240 || $imageSize > 5120000) { // lon hon 10kb và nhỏ hơn 5M mới được upload
                    $result = [
                        'error' => true,
                        'message' => 'Chọn file ảnh lớn hơn 10kb và nhỏ hơn 5Mb; Kích thước file của bạn là: ' . $imageSize
                    ];
                    $err = true;
                    return json($result);
                }                
            }

            if (!$err) {

                $pathFull = $path . '/' . $fileName;
                $typeArray = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
                $type = strtolower(pathinfo($pathFull, PATHINFO_EXTENSION));

                if (in_array($type, $typeArray) === false) { #Kiểm tra type có trong mảng hay không
                    $result = [
                        'error' => true,
                        'message' => "Định dạng không được phép Upload " . $type
                    ];
                    $err = true;
                    return json($result);
                } 
            }
            
            if (!$err) {
               
                $pathFile = $path . '/' . $fileName;
                if (file_exists($pathFile)) {
                    $result = [
                        'error' => true,
                        'message' => "File ảnh đã tồn tại"
                    ];
                    $err = true;
                    
                   if ($id == 1) {
                       $pathFile = $path . '/' . time() . '-' . $fileName;
                       $err = false;
                   }
                   
                }
            }

            if (!$err) {
                move_uploaded_file($_FILES['file']['tmp_name'], $pathFile);
                $result = [
                        'error' => false,
                        'message' => 'Thành công',
                        'url' => $pathFile
                ];
                return json($result);
            }

            return json($result);
            
        }
        return json([
            'error' => true,
            'message' => 'Method not exit'
        ]);
        
    }
}