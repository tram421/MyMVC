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
        // dd($_GET);
        if (isset($_GET['newest'])) {
            unset($product);     
            $product = new Product;
            $product = $product->getChild($id, $page, "id", "desc");
        }
        if (isset($_GET['oldest'])) {
            unset($product);     
            $product = new Product;
            $product = $product->getChild($id, $page, "id", "asc");

        }
        if (isset($_GET['price'])) {
            if ($_GET['price'] == 'asc') {     
                unset($product);         
                $product = new Product;
                $product = $product->getChild($id, $page, "price_sale", "asc");
                //  dd($product);
            }
            if ($_GET['price'] == 'desc') {     
                unset($product);         
                $product = new Product;
                $product = $product->getChild($id, $page, "price_sale", "desc");
                //  dd($product);
            }
        }
        $this->loadView('main', [
            'title' => __PRODUCT_PAGE__,
            'template' => "product/product",
            'menusData' => $menusData,
            'product' => $product,
            'feature' => $feature,
            'category'=> $slug,
            'category_id'=> $id
            ]);
    }
}
