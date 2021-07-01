<?php

namespace Core;


class Route
{
    protected $query;
    protected $controller = '\App\Controllers\MainController';
    protected $method     = 'index';
    protected $params    = [];

    public function __construct()
    {
        $this->handleQuery();
        $this->handleMethod();
    }

    protected function handleMethod()
    {
        $controllerFull = $this->handleController();

        if (!is_null($controllerFull)) {
            $arrayController = explode("@", $controllerFull);

            $this->controller = $arrayController[0];
            $this->method   = $arrayController[1];
        }

        return;
    }

    protected function handleQuery()
    {
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            return $this->query = trim($_GET['query'], "/");
        }

        return NULL;
    }

    protected function handleController()
    {
        if (is_null($this->query)) return NULL;

        global $routes;

        $controller = NULL;
        
        #Xử lý URL không có tham số {}
        if (isset($routes[$this->query]) && $routes[$this->query] != '') {
            return $routes[$this->query];
        }


        #Cắt chuỗi query có tham số {}
        $queryCount = count(explode("/", $this->query)); # Đếm số cấp của URL
        
        foreach ($routes as $key => $route) {
            
            $arrayRouteCount = count(explode('/', $key)); # Đếm số cấp của Route

            if ($queryCount == $arrayRouteCount) { #Xử lý cùng số lượng cấp

                #Tìm kiếm cú pháp {} => thay thế thành regex
                $pregex = preg_replace('/{(.*?)}/i', '([a-zA-Z0-9\-._]+)', $key); //thêm vào dấu . vì có trả về token

                #Update cú pháp của regex
                $pregexNew = "/" . str_replace("/", "\/", $pregex) . "/i";

                if (preg_match($pregexNew, $this->query, $matches)) { #Kiểm tra url với route

                    preg_match_all("/\{(.*?)}/", $key, $regexParames); #Lấy ra tên. Ví dụ {name} => name

                    unset($matches[0]); # Xóa phần tử đầu tiên trong mảng( làm mới mảng)
        
                    #Gọp value ở $regexParames với value từ $matches
                    $this->params = array_combine($regexParames[1], array_values($matches));

                    $controller = $route;

                    break;
                }
            }
        }
        
        return $controller;
    }
}