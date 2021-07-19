<?php
namespace App\Controllers;
use Core\Controller;

use App\Models\Post;
use App\Models\Product;
class PostController extends Controller
{
    public function show($id = 0, $slug = '')
    {
        $post = new Post;
        $feature = new Product;
        $result = $post->show($id);
        $categories = $post->getCategories();
        $feature = $feature->getFeature(3);
        // dd($result);
        if ($result != NULL) {
            $this->loadView('main',[
                'title' => 'Tìm kiếm',
                'template' => 'post/show',
                'data' => $result,
                'cat' => $categories,
                'feature' => $feature
            ]);
        }       

    }
    public function listOfCat($cat = '')
    {
        $posts = new Post;        
        $feature = new Product;
        $list = $posts->getFromCat($cat);  
         $posts = new Post;             
        $categories = $posts->getCategories();
        $feature = $feature->getFeature(3);
        $this->loadView('main',[
                'title' => 'Tìm kiếm',
                'template' => 'post/list',
                'data' => $list,                
                'cat' => $categories,
                'feature' => $feature
            ]);
    }
}