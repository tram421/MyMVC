<?php
namespace App\Controllers;
use App\Core\AuthUser;
use App\Models\Order;
class MemberController extends AuthUser
{
    public function __construct()
    {
        parent::__construct();
    }
    public function order()
    {
        $orderInfo = new Order;
        $orderInfo = $orderInfo->getOrderOfUser($this->user['id']);
        $count = new Order;
        $count = $count->countOrder($this->user['id']);
        $this->loadView('user/info',[
            'title' => 'Thông tin tài khoản',
            'takeIn'=> 'orderInfo',
            'data' => $this->user,
            'count' => $count, //số đơn hàng của tài khoản
            'listOrder' => $orderInfo //Thông tin chi tiết đơn hàng
        ]);
    }
    public function orderComplete()
    {
        $orderInfo = new Order;
        $orderInfo = $orderInfo->getOrderComplete($this->user['id']);
        $count = new Order;
        $count = $count->countOrderComplete($this->user['id']);
        $this->loadView('user/info',[
            'title' => 'Thông tin tài khoản',
            'takeIn'=> 'orderInfo',
            'data' => $this->user,
            'count' => $count, //số đơn hàng của tài khoản
            'listOrder' => $orderInfo //Thông tin chi tiết đơn hàng
        ]);
    }
}