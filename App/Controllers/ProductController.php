<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Product;
    }

    public function get($id)
    {
        $result = $this->model->get($id);
        return $result;
    }

    public function loadmore()
    {
        $this->model = new Product;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $page = (isset($_POST['page'])) ? (int)$_POST['page'] : 1;
            $category = (isset($_POST['category'])) ? (int)$_POST['category'] : 0;

            $result = $this->model->getChild($category, $page);
        
            if (!is_null($result)) {
                return json([
                    'error' => false,
                    'data' => $result
                ]);
            } else {
                return json([
                    'error' => true,
                    'message' => 'Hết sản phẩm'
                ]);
            }
        }
        return json([
                    'error' => true,
                    'message' => 'Not a function'
                ]);
    }

    public function loadModal()
    {
        $this->model = new Product;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;

            if ($id != 0) {
                $result = $this->model->get($id);
                // dd($result);
                return json([
                        'error' => false,
                        'data' => $result
                    ]);                
            }
        }
       
        return json([
            'error' => true
        ]);
    }
/**
 * description: This function will handle when user click on product in public page then show detail all information of that product
 * param: slug name and id of product which will show
 * result: array
 */
    public function showDetail($slug = "", $id = 0)
    {
        
        $result = $this->model->get($id);
        //order by Newest
        $relate = $this->model->getChild($result['menu_id'], 1, 'id', 'desc');
        
        if ($result != NULL) {
            $this->loadView('main',[
                'title' => $result['name'],
                'template' => 'product/product_detail',
                'product_detail' => $result,
                'relate' => $relate
            ]);
        }
        return NULL;
    }

}