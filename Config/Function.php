<?php

if (!function_exists('dd')) { #Nếu không có tồn tại function dd
    function dd($array = [])
    {
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
        die();
    }
}

if (!function_exists('json')) {
    function json($array = [])
    {
        header('Content-type: application/json');
        echo json_encode($array);
    }
}

if (!function_exists('getFolder')) {
    function getFolder($path = 'uploads')
    {
        $filePathInfo = [ date("Y"), date("m"), date("d") ];

        $pathFull = $path;
        if (is_dir($path) === false) mkdir($path, 0777);
        foreach ($filePathInfo as $key => $value) {
            $pathFull .=  '/' . $value;
        
            if (is_dir($pathFull) === false) {
                mkdir($pathFull, 0777);
            }
        }
        return $pathFull;
    }
}

if (!function_exists('page')) {
    function page($sumpage, $page){
        $html = '<ul class="pagination float-right mr-4">';
        $html .= '<li class="page-item"><a class="page-link" href="'. '?page=' . 1 .'">Đầu</a></li>';

        if ($page > 1) {
             $html .= '<li class="page-item"><a class="page-link" href="'. '?page=' . (int)($page-1) .'">Trước</a></li>';
        }
        $start = ($page - 2) <= 0 ? 1 : ($page - 2);
        $end   = ($page + 2) >= $sumpage ? $sumpage : ($page + 2);  
        for ($i=$start; $i <= $end ; $i++) { 
            if ($page == $i) {
                $html .= '<li class="page-item active"><a class="page-link" href="'. '?page=' . $i .'">' . $i .'</a></li>';
            } else {
                $html .= '<li class="page-item"><a class="page-link" href="'. '?page=' . $i .'">' . $i .'</a></li>';
            }            
        }
        if ($page < $sumpage) {
            $html .= '<li class="page-item"><a class="page-link" href="'. '?page=' . (int)($page+1) .'">Sau</a></li>';
        }
        $html .= '<li class="page-item"><a class="page-link" href="'. '?page=' . $sumpage .'">Cuối</a></li>';
        $html .= '</ul>';
        return $html;
    }
}