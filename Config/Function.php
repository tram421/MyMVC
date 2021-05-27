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
