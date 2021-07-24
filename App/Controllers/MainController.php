<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Post;
class MainController extends Controller
{
    private $menuModel;
    private $products;
    private $post;
    public function __construct()
    {
        $this->menuModel = new Menu();
        $this->products = new Product;
        $this->post = new Post;
    }
    public function index()
    {
        $menusData = $this->menuModel->get();
        $feature = $this->products->getFeature();
        $posts = $this->post->getForSlide();
        $new = new Product;
        $newProduct = $new->getNewest();
        $this->products = new Product;
        $saleProduct = $this->products->getSale();
        $this->products = new Product;
        $tiviSS = $this->products->getField('menu_id', 18);
        $this->loadView('main', [
            'title' => __HOME_PAGE__,
            'template' => "home",
            'menusData' => $menusData,
            'feature' => $feature,
            'post' => $posts,
            'newest' => $newProduct,
            'saleProduct' =>$saleProduct,
            'tiviSamsung'  => $tiviSS
            ]);
    }
}