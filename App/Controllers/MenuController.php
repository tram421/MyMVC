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
        #getChild($id, $page)
        $page = 1;
        $product = $this->product->getChild($id,$page);
        $feature = new Product;
        $feature = $feature->getFeature(5);
        $this->loadView('main', [
            'title' => __PRODUCT_PAGE__,
            'template' => "product/product",
            'menusData' => $menusData,
            'product' => $product,
            'feature' => $feature
            ]);
    }
}
