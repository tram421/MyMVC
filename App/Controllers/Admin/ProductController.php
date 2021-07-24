<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Menu;
use App\Models\Admin\Product;
use Core\Session;
use Core\Helper;
define('__TRASH__', 1);
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
    private function formRequest($isCreateTime = 1)
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['content'] = isset($_POST['content']) ? Helper::makeSafe($_POST['content']) : '';
            $data['file'] = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';
            if ($data['name'] == '' || $data['content'] == '' || $data['file'] == '') {
                Session::addFlash('error', __NAME_DESCRIPTION_IMAGE_NULL__);
                return false;
            }
            $data['menu_id']        = isset($_POST['menu_id']) ? intval($_POST['menu_id']) : 0;
            $data['description']    = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['factory_info']    = isset($_POST['factory_info']) ? Helper::makeSafe($_POST['factory_info']) : '';
            $data['price']          = isset($_POST['price']) ? intval($_POST['price']) : 0;
            $data['price_sale']     = isset($_POST['price_sale']) ? intval($_POST['price_sale']) : 0;
            $data['active']         = isset($_POST['active']) ? intval($_POST['active']) : 1;
            $data['feature']         = isset($_POST['feature']) ? 1 : 0;
            $data['updated_at']     = date("Y-m-d H:i:s");
            if ($isCreateTime == 1) {
                        $data['created_at'] = date("Y-m-d H:i:s");
            }
            if (!$this->checkPrice($data['price'], $data['price_sale'])) return false;

            
            

        }
        return $data;
    }
    private function checkPrice($price = 0, $price_sale = 0)
    {

        if ($price > 0 && $price_sale > 0 && $price <= $price_sale) {
            Session::addFlash('error', __PRICESALE_SMALL_THAN_PRICE__);
            return false;
        }
        if ($price == 0) {
            Session::addFlash('error', __ADD_PRICE_PLEASE__);
            return false;
        }
        if ($price <= 0 || $price_sale <= 0 ) {
            Session::addFlash('error', __ADD_POSITIVE_NUMBER__);
            return false;
        }
        return true;

    }



    public function create()
    {
        return $this->loadView('/admin/main', [
            'title'     => __ADD_PRODUCT_PAGE__,
            'template'  => '/product/add',
            'menus'     => $this->menuModel->getActive()
        ]);
    }
    
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [];
            $data = $this->formRequest();
      
            if (!$data) return Helper::redirect('/admin/products/add');
            $result = $this->model->insert($data);
            if ($result) {

                $id = $this->model->getMaxId();
                $action = 'insert 1 product to table: ' .'id: '.$id['max'] ;
                $this->addLog($this->user['id'], $action);

                Session::addFlash('success', __ADD_SUCCESS__);
                return Helper::redirect('/admin/products/add');
            }

            Session::addFlash('error', __ADD_ERROR__);
                return Helper::redirect('/admin/products/add');
        }

        Session::addFlash('error', __NOT_EXIST_METHOD__);
        return Helper::redirect('/admin/products/add');
        
    }

    public function index()
    {
        
        $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
        // die(dd($_GET));
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sumPage = ceil($this->model->getNumRows() / $limit);

        return $this->loadView('/admin/main', [
            'title' => __LIST_PRODUCT_PAGE__,
            'template' => 'product/list',
            'data' => $this->model->get(0, $limit, $offset),
            'page' => $page,
            'sumPage' => $sumPage,
        ]);
    }

    public function listDesc()
    {
        $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
        // die(dd($_GET));
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sumPage = ceil($this->model->getNumRows() / $limit);

        return $this->loadView('/admin/main', [
            'title' => __LIST_PRODUCT_PAGE__,
            'template' => 'product/list',
            'data' => $this->model->get(0, $limit, $offset, 'desc'),
            'page' => $page,
            'sumPage' => $sumPage,
        ]);
    }

    public function editActive($id = 0, $stt = -1)
    {
        if ($id == 0 || $stt == -1) {
            Session::addFlash('error', __DATA_ERROR__);
            return Helper::redirect('/admin/products/list');
        }

        $active = $stt == 1 ? 0 : 1;
        $data = ['active' => $active];
        $this->model->update($data, $id);

        $action = 'update [active] of product[' . $id . '] to ' . $active;
        $this->addLog($this->user['id'], $action);

        Session::addFlash('success', __UPDATE_SUCCESS__);
        return Helper::reload();

    }
    public function editFeature($id = 0, $stt = -1)
    {
        if ($id == 0 || $stt == -1) {
            Session::addFlash('error', __DATA_ERROR__);
            return Helper::reload();
        }
        $feature = $stt == 1 ? 0 : 1;
        $data = ['feature' => $feature];
        $this->model->update($data, $id);

        
        $action = 'update [feature] of product[' . $id . '] to ' . $feature;
        $this->addLog($this->user['id'], $action);

        Session::addFlash('success', __UPDATE_SUCCESS__);
        return Helper::reload();
    }

    public function edit($id = 0)
    {
        $data = $this->model->show($id);
        // $menuName = $this->menuModel->getname($idMenu);
        $this->loadView('/admin/main',[
            'title' => __EDIT_PRODUCT_PAGE__,
            'template' => '/product/edit',
            'data' => $data
        ]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->model->show($_POST['id']);
            if (is_null($product)) {
                Session::addFlash('error', __NOT_EXIST_ID__);
                return Helper::redirect('/admin/products/list');
            }
            
            $data = $this->formRequest();
            if ( !$data ) {
                Session::addFlash('error', __NOT_RECEIVED_DATA__);
                return Helper::redirect("/  admin/products/edit/" . $_POST['id']);
            }
            $result = $this->model->update($data, $_POST['id']);
            if ($result) {

                
                $action = 'update all product[' . $_POST['id'] . ']: ';
                $this->addLog($this->user['id'], $action);

                Session::addFlash('success', __UPDATE_SUCCESS__);
                return Helper::redirect('/admin/products/list');
            }
            
            Session::addFlash('error', __UPDATE_ERROR__);
            return Helper::redirect("/  admin/products/edit/" . $_POST['id']);
        }
        Session::addFlash('error', __NOT_EXIST_METHOD__);
        return Helper::redirect('/admin/products/list');
    }

    public function trash()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $product = $this->model->show($_POST['id']);

            if (is_null($product)) {
                Session::addFlash('error', __NOT_EXIST_ID__);
               return json(['message' => 'error']);
            }
            $result = $this->model->trash($_POST['id']);
            
            if ($result == true) {
                $action = "Move product[".$_POST['id']."] to trash";
                $this->addLog($this->user['id'], $action);
                Session::addFlash('success',  ADD_TO_TRASH_SUCCESS($product['name']));
                return json(['message' => 'successfull']);
            }
           return json(['message' => 'error']);
        }
        
        
    }

    public function trashlist($id = 0)
    {
        $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
        // die(dd($_GET));
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sumPage = ceil($this->model->getNumRows(__TRASH__) / $limit);

        $this->loadView('/admin/main',[
            'title' => __TRASH_PRODUCT_PAGE__,
            'template' => '/product/trashlist',
            'data' => $this->model->get(__TRASH__, $limit, $offset),
            'page' => $page,
            'sumPage' => $sumPage
        ]);
    }

    public function restock()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->model->show($_POST['id']);
            if (is_null($product)) {
                Session::addFlash('error', __NOT_EXIST_ID__);
                return json(['message' => 'error']);
            }
            $data = ['is_trash' => 0];

            $this->model->update($data, $_POST['id']);

            $action = 'restock product[' . $_POST['id'] . ']: ' ;
            $this->addLog($this->user['id'], $action);

            Session::addFlash('success',  __RESTOCK_MESSAGE_SUCCESS__);
            return json(['message' => 'successfull']);
        }
    }


    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $product = $this->model->show($_POST['id']);
            if (is_null($product)) {
                Session::addFlash('error', __NOT_EXIST_ID__);
                return json(['message' => 'error']);
            }
            $result = $this->model->delete($product, $_POST['id']);
            if ($result) {
                
                $action = 'destroy product[' . $_POST['id'] . ']: ' ;
                $this->addLog($this->user['id'], $action);

                Session::addFlash('success',  __DESTROY_SUCCESS__);
                return json(['message' => 'successfull']);
            }
            Session::addFlash('error',  __DESTROY_ERROR__);
            return json(['message' => 'error']);
            
        }
        
        Session::addFlash('error',  __NOT_EXIST_METHOD__);
        return json(['message' => 'error']);
        
    }

    private  function addLog($id,$action)
    {
        $log = new \App\Models\Admin\Log;
        $arr = [];
        $arr['user'] = $id;
        $arr['action'] = $action;              
        $arr['created_at'] = date("Y-m-d H:i:s");
        $log->insert($arr);
    }
}