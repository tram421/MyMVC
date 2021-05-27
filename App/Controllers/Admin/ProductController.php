<?php
namespace App\controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Menu;
use App\Models\Admin\Product;

class ProductController extends Auth
{
    private $model;
    private $menuModel;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Product();
        $this->menuModel = new Menu();
    }
    public function create()
    {
        return $this->loadView('/admin/main', [
            'title' => 'Thêm sản phẩm',
            'template' => '/product/add',
            'menus'  => $this->menuModel->getActive()
        ]);
    }
}