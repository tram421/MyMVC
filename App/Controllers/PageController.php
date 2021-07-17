<?php
namespace App\Controllers;

use App\Models\Admin\Page;
use Core\Session;
use Core\Helper;
use Core\Controller;
use App\Models\Product;

class PageController extends Controller
{
    private $model;
    public function show($slug = '')
    {
        $this->model = new Page;
        if($slug != '') {            
            $page = $this->model->show($slug);
            $feature = new Product;
            $feature = $feature->getFeature(5);
            $this->loadView('main',[
                'title' => 'Quản lý trang '.$slug,
                'template' => 'page/view',
                'data' => $page,
                'feature' => $feature
            ]);
        }
    }
   
}