<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Product;
use App\Models\Post;

class SearchController extends Controller
{
    private $product;
    private $post;
    public function __construct()
    {
        $this->product =  new Product;
        $this->post = new Post;

    }
    public function show()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $search = (isset($_GET['search'])) ? $_GET['search'] : '';
            $post = $this->post->search($search);
            $product = $this->product->searchName($search);
            $this->loadView('main',[
                'title' => 'Tìm kiếm',
                'template' => 'search',
                'search' => $search,
                'product' => $product,
                'post' => $post
            ]);
        }
    }
}