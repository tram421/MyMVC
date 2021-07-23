<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Order;
use App\Models\Admin\Order as OrderAdmin;

class OrderController extends Auth
{
    private $model;
    private $modelAdmin;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Order;
        $this->modelAdmin = new OrderAdmin;
    }
    public function list($tab = '')
    {
        if($tab != '') {
            $data = $this->modelAdmin->getForTab($tab);           
        }             
      
        $limit = 1;
        $offset = 0;
        $sumPage = 1;
        $page = 1;
        if($data != NULL) {            
            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
           
            $limit = 5;
            $offset = ($page - 1) * $limit;
            $sumPage = ceil(sizeof($data)/ $limit);
        }      
      
        $this->loadView('admin/main',[
            'title' => 'Quản lý đơn hàng',
            'template' => '/order/list',
            'data' => $data,
            'sumPage' => $sumPage,
            'page' => $page
        ]);        
    } 

    public function search()
    {
        $input = (isset($_GET['search_order'])) ? $_GET['search_order'] : '';
        if(preg_match("/mkl-/i", $input)) {
            $arr = explode('-', $input);
            $id = (int)$arr[1];
            
        } else if(is_numeric($input)) {
            $id = (int)$input;

        } else {
            $id = 0;
        }
          $data = $this->modelAdmin->getForSearch($id);  
        //   $data[0] = $data;
        //   dd($data); 
        $limit = 1;
        $offset = 0;
        $sumPage = 1;
        $page = 1;
      
        $this->loadView('admin/main',[
            'title' => 'Quản lý đơn hàng',
            'template' => '/order/list',
            'data' => $data,
            'sumPage' => $sumPage,
            'page' => $page
        ]); 

    }

    public function completeOrder()
    {
        
        $data = $this->modelAdmin->getForTab('complete');
        $limit = 1;
        $offset = 0;
        $sumPage = 1;
        $page = 1;
        if($data != NULL) {            
            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
            // die(dd($_GET));
            $limit = 5;
            $offset = ($page - 1) * $limit;
            $sumPage = ceil(sizeof($data)/ $limit);
        }      
      
        $this->loadView('admin/main',[
            'title' => 'Quản lý đơn hàng',
            'template' => '/order/list',
            'data' => $data,
            'sumPage' => $sumPage,
            'page' => $page,
            'delete' => 1
        ]); 
    }
    
    public function delete()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            if ($id != 0) {
               $this->modelAdmin->delete($id);

               $action = 'Move to trash of order[' . $id . ']';
                $this->addLog($this->user['id'], $action);  


               return json('success');
            }
        }
    }
    public function trash()
    {
        $data = $this->modelAdmin->getTrash();
        $limit = 1;
        $offset = 0;
        $sumPage = 1;
        $page = 1;
        if($data != NULL) {            
            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
            // die(dd($_GET));
            $limit = 5;
            $offset = ($page - 1) * $limit;
            $sumPage = ceil(sizeof($data)/ $limit);
        }   
        $this->loadView('admin/main',[
            'title' => 'Thùng rác',
            'template' => '/order/list',
            'data' => $data,
            'sumPage' => $sumPage,
            'page' => $page,
            'delete' => 2
        ]); 
    
        
    }
    public function getInfo($id = 0)
    {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        $OrderAmin = new OrderAdmin;
        $result = $OrderAmin->getInFo($id);
        return json($result);
    }

    public function storeShipCost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $value = (isset($_POST['value'])) ? $_POST['value'] : 0;
            $total = (isset($_POST['total'])) ? $_POST['total'] : 0;
            $result = $this->modelAdmin->storeShipCost($value, $id);
            $result = $this->modelAdmin->storeTotal($total, $id);

            $action = 'Set ship cost of order[' . $id . ']: ' . 'is ' .  $value;
            $this->addLog($this->user['id'], $action);

            return json('success');
        }
    }
    public function setState()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;
            $state = (isset($_POST['state'])) ? $_POST['state'] : '';
            if ($state != '' && $id != 0) {
                $result = $this->modelAdmin->setState($state, $id);

                $action = 'Set state order[' . $id . ']: ' . 'to ' .  $state;
                $this->addLog($this->user['id'], $action);

                return json($state);
            }
        }
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