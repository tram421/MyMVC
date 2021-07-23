<?php 
namespace App\Controllers\Admin;

use App\Models\User;
use Core\Controller;
use Core\Helper;
use Core\Session;
use App\Core\Auth;

class LoginController extends Controller
{
    protected $model;

    public function __construct()
    {        
        if (isset($_COOKIE['username'])) {
            return Helper::redirect('/admin/main');
            // return false;
        }
        $this->model = new User();
        // $this->model = $this->model->get($_COOKIE['username']);
        return $this->model;
        // dd($_COOKIE);
        
    }     
    public function index()
    {
        // $user = $this->model->get($_COOKIE['username']);
        $data = [
            'title' => 'Đăng nhập',
            'name' => "Amininitrator"
        ];
        return $this->loadView('admin/user/login', $data);
    }

    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = isset($_POST['email']) ? Helper::makeSafe($_POST['email']) : '';
            $password = isset($_POST['password']) ? Helper::makeSafe($_POST['password']) : '';

            if ($email == '' || $password == ''|| $email == NULL) {
                Session::addFlash('error', "vui Lòng nhập đầy đủ thông tin");

                return Helper::redirect('/admin/login');
            }
            // dd($password);
            $user = $this->model->get($email);
            if (is_null($user)) {
                Session::addFlash('error', "Thông tin email không chính xác");
                return Helper::redirect('/admin/login');
            }

            if(!password_verify($password, $user['password'])) {
                // Session::addFlash('success', 'Đăng nhập thành công');
                Session::addFlash('error', 'Mật khẩu không chính xác');
                return Helper::redirect('/admin/login');  
                
            }
            if($user["permision"] != 'admin') {
                Session::addFlash('error', 'Bạn chưa được cấp quyền admin');
                return Helper::redirect('/admin/login');
            }
                      
            setcookie('username', $email, time() + 3600, '/');
            setcookie('password', $user['password'], time() + 3600, '/');
            Helper::redirect('/admin/main');
        }
    }

   
}