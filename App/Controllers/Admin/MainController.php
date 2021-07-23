<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\User;
use App\Models\Admin\Order;
use Core\Helper;
use App\Controllers\Admin\LogController;


class MainController extends Auth
{
   public $user;
   private $order;
    public function __construct()
    {
        parent::__construct();
        $this->user = new User;
        $this->user = $this->user->get($_COOKIE['username']);
        $this->order = new Order;
       return $this->user;
    }
    public function index()
    {              
        if (isset($_COOKIE['username'])) {
            $user = new User;
            $user = $user->getAll();            
            $countUser = sizeof($user);
            $order = new \App\Models\Admin\Order;
            $countOrder = 0;
            $result = $order->getAll();
            if($result != NULL) {
                $countOrder = sizeof($result);
            }
            $sumCostOrder = $order->getCostAll();
            if(!is_null($sumCostOrder)) {
                $sumCostOrder = $sumCostOrder['cost'];
            }
            $products = new \App\Models\Admin\Product;
            $countProducts = $products->getNumRows($trash = 0);
           

            $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
            
            $limit = 20;
            $sumPage = 0;
            $offset = ($page - 1) * $limit;
            $listLog = [];
            if(!isset($_GET['filter']) && !isset($_GET['input'])  ) {
                
                $offset = ($page - 1) * $limit;
                $listLog = $this->getLog($limit, $offset, 'desc');
                $sumPage = ceil(sizeof($this->getLog()) / $limit);
            } else if (isset($_GET['filter'])) {
                $log  = new LogController;
                $listLog = $log->getForSearch($_GET['filter'], $_GET['input'], $limit, $offset, 'desc');
                $all = $log->getForSearch($_GET['filter'], $_GET['input']);
                if ($all != NULL)   $sumPage = ceil(sizeof($all) / $limit);
                
            }
            
            $countOrderCreat = $this->order->getCondition('state', 'create');
            $this->order = new Order;
            $countOrderConfirm = $this->order->getCondition('state', 'confirmed');
            $this->order = new Order;
            $countOrderShipping = $this->order->getCondition('state', 'shipping');
            return $this->loadView('admin/main', [
                'title' => 'Trang quản trị admin',
                'template' => 'home',
                'countOrder' => $countOrder,
                'countUser' => $countUser,
                'totalIncome' => $sumCostOrder,
                'countProducts' => $countProducts,
                'log'   => $listLog,
                'page' => $page,
                'sumPage' => $sumPage,
                'countOrderCreat' => $countOrderCreat,
                'countOrderConfirm' => $countOrderConfirm,
                'countOrderShipping' => $countOrderShipping
            ]);
        }
        return Helper::redirect('/admin/login');
       
    }
    public function getLog($limit = 0, $offset = 0, $sort = 'desc')
    {
        $log  = new LogController;
        return $log->getAll($limit, $offset, $sort);
    }
    public static function getNameAdmin()
    {
        $user = new User();
        if (isset($_COOKIE['username'])) {
            $user = $user->get($_COOKIE['username']);
            if($user['name'] != '') return $user['name'];

            return 'Admin';
        }
        return 'Admin';
        
    }
    
    public function search()
    {
        $url = '/admin';
        if(!is_null($_GET)) {
            if (isset($_GET['filter'])) {
                if($_GET['filter'] == 0) {
                    $url = '/admin/main/?filter=0';
                    
                } else {
                    $url = '/admin/main/?filter=1';
                }
            }
            
            if(isset($_GET['input'])) {
                $url .= '&input='.$_GET['input'];
            }
        }
        return Helper::redirect($url);
        
    }

}