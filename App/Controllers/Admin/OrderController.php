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
        $this->model = new Order;
        $this->modelAdmin = new OrderAdmin;
    }
    public function list()
    {
        $data = $this->model->getOrders();
        $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
        // die(dd($_GET));
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sumPage = ceil(sizeof($data)/ $limit);


        
        $this->loadView('admin/main',[
            'title' => 'Quản lý đơn hàng',
            'template' => '/order/list',
            'data' => $data,
            'sumPage' => $sumPage,
            'page' => $page
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
            return json('success');
        }
    }
        
}