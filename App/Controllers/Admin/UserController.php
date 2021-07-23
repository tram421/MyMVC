<?php
namespace App\Controllers\Admin;

use App\Models\User;
use App\Core\Auth;
use Core\Session;
use Core\Helper;
use App\Controllers\Admin\LogController;
class UserController extends Auth
{
    private $model;
    private $log;
    public function __construct()
    {
        parent::__construct();
        $this->model = new User;
        $this->log = new LogController;
    }
     public function logOut()
    {       
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //  dd($result);

            $action = 'user log out a [' . $_COOKIE['username']. ']';
            $this->log->addLog($this->user['id'], $action); 

            setcookie("username", "", time() - __TIME_COOKIE__,'/');
            setcookie("password", "", time() - __TIME_COOKIE__,'/');

            

            \Core\Session::addFlash('success', 'Đăng xuất thành công');
            return json(['error'=> false, 'message' => 'success']);
        }
    }
    public function list()
    {
        $list = $this->model->getUser();
         $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $count = (int)$list->num_rows;
        $sumPage = ceil($count / $limit);
            
        return  $this->loadView('admin/main', [
                'title' => 'Quản lý user',
                'template' => 'user/list',
                'data'  => $list,
                'page' => $page,
                'sumPage' => $sumPage
            ]);
    }
    public function edit($id = 0)
    {
        if ($id != 0) {
            $user = $this->model->getFromId($id);
            $perm = '';
            if ($user['permision'] == 'admin') {
                 $perm = '<option value="user">user</option>';
            } else {
                $perm = '<option value="admin">admin</option>';
            }
           
            
            if ($user != NULL) {
                $this->loadView('admin/main', [
                    'title' => 'Chỉnh sửa thông tin user',
                    'template' => 'user/edit',
                    'data' => $user,
                    'permision' => $perm
                ]);
            }
            
        }
       
    }

    public function updateUser()
    {
        // dd($_POST);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            if (isset($_POST['is_delete'])) {
                $data['is_delete'] = 1;
            } else $data['is_delete'] = 0;

            $id = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;
            if($id != 0 && $this->user['id'] != $id) {
                $user = $this->model->update($data, $id);
                
                $action = 'update all user [' . $_POST['id']. ']';
                $this->log->addLog($this->user['id'], $action);

                Session::addFlash('success', 'Đã cập nhật thành công');
                return Helper::reload();
            }
             Session::addFlash('error', 'Không nhận được mã thành viên hoặc bạn không thể sửa user này (Không thể tự sửa thông tin cá nhân)');
            return Helper::reload();
        }
        Session::addFlash('error', 'Không thể cập nhật');
        return Helper::reload();
    }

    public function showOrder($id =0)
    {
        if ($id != 0) {
            $info = $this->model->getOrder($id);
            $sumCost = $this->model->getSumOrder($id);
            $this->loadView('admin/main', [
                'title' => 'Thông tin đơn hàng của user',
                'template' => 'user/orderInfo',
                'data' => $info,
                'sumCost' => $sumCost
            ]);
        }
    }
} 