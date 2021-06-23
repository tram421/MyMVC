<?php 
namespace App\Controllers;

use Core\Controller;
use App\Models\Menu;
use App\Models\Product;

class MenuController extends Controller
{ 
    private $menuModel;
    private $product;
    public function __construct()
    {
        $this->menuModel = new Menu();
        $this->product = new Product();
    }

    public function index($slug,$id)
    {
        $menusData = $this->menuModel->get($id);
        $product = $this->product->get($id);
        $this->loadView('main', [
            'title' => __PRODUCT_PAGE__,
            'template' => "product",
            'menusData' => $menusData,
            'product' => $product
            ]);
    }
}
