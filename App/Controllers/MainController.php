<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Menu;
use App\Models\Product;
class MainController extends Controller
{
    private $menuModel;
    private $products;
    public function __construct()
    {
        $this->menuModel = new Menu();
        $this->products = new Product;
    }
    public function index()
    {
        $menusData = $this->menuModel->get();
        $feature = $this->products->getFeature();
        $this->loadView('main', [
            'title' => __HOME_PAGE__,
            'template' => "home",
            'menusData' => $menusData,
            'feature' => $feature
            ]);
    }
}