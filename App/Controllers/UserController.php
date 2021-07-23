<?php
namespace App\Controllers;

use App\Core\AuthUser;
use Core\Controller;
use App\Models\Address;
use Firebase\JWT\JWT; //token
use App\Models\User;
use Core\Session;
use Core\Helper;

class UserController extends Controller
{
    private $user;
    private $timeCookie = __TIME_COOKIE__;
    
    public function __construct()
    {
        $this->user = new User;
        
    }

    public function login()
    {
        if (isset($_COOKIE['username'])) {            
           
            $result = $this->user->get($_COOKIE['username']);
            if(is_null($result)) {
                setcookie("username", "", time() - __TIME_COOKIE__,'/');
                return Helper::redirect('/user/login');
            } else {
                $this->loadView('main',[
                    'title' => 'Thông tin tài khoản',
                    'template' => 'user/info',
                    'data' => $result
                ]);                
            }
        } else {
            $this->loadView('main',[
                'title' => 'Login',
                'template' => 'user/loginForm'
            ]);        
        }
    }



    public function SignOut()
    {
        setcookie("username", "", time() - __TIME_COOKIE__,'/');
        if(isset($_SESSION['carts'])) unset($_SESSION['carts']);
        // return Helper::reload();
        return json('success');
    }
     public function show($email = '')
    {
        $result = $this->user->get($email);
        if (!is_null($result)) {
            return $result;
        }
        return NULL;
    }
    public function getID($email = '')
    {
        $result = $this->user->get($email);
        if (!is_null($result)) {
            return $result['id'];
        }
        return NULL;
    }
    public function check($checkEmail = '')
    {
        if ($checkEmail != '') {
            $result = $this->user->get($checkEmail);
            if (is_null($result)) {
                return json('success');
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = (isset($_POST['email'])) ? $_POST['email'] : '';
            if ($email == '') {
                Session::addFlash('error', 'Vui Lòng nhập Email');
                return Helper::redirect('/user/login');
            }
            $result = $this->user->get($email);
            if (is_null($result)) {
                Session::addFlash('error', 'Email Không tồn tại');
                return Helper::redirect('/user/login');
            }
            if($result["permision"] != 'user' || $result["permision"] != 'admin') {
                Session::addFlash('error', 'Email Không tồn tại (101)');
                return Helper::redirect('/user/login');
            }
            if(!password_verify($_POST['password'], $result["password"])){
                Session::addFlash('error', 'Mật khẩu không đúng');
                return Helper::redirect('/user/login');
            }
            if(isset($_SESSION['carts'])) unset($_SESSION['carts']);
            setcookie('username', $email, time() + __TIME_COOKIE__, '/');
            setcookie('password', $result["password"], time() + __TIME_COOKIE__, '/');
            return Helper::redirect('/user/login');
            
        }
        Session::addFlash('error', 'Phương thức không tồn tại');
        return Helper::redirect('/user/login');
    }

    public function signUp()
    {

        $Adress = new Address;
        $this->loadView('main',[
            'title' => 'Sign Up',
            'template' => 'user/signUpForm',
            'province' =>  $Adress->getProvince()
        ]);

        #Delete old data when reload page
        if(isset($_SESSION['emailUserEmail'])) unset($_SESSION['emailUserEmail']) ;
        if(isset($_SESSION['phoneUserMail'])) unset($_SESSION['phoneUserMail']);
        if(isset($_SESSION['addressUserMail'])) unset($_SESSION['addressUserMail']);
        if(isset($_SESSION['urlMailConfirm'])) unset($_SESSION['urlMailConfirm']);
        if(isset($_SESSION['password'])) unset($_SESSION['password']);
    }

    public function getDistrict()
    {
         $district = new Address;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idProvince = (isset($_POST['id'])) ? (int)$_POST['id'] : 0;
            $result = $district->getDistrict($idProvince);
            if ($result != NULL) {
                return json([
                    'error' => false,
                    'data' => $result
                ]);
            }
            return json([
                    'error' => true,
                    'message' => "NULL"
                ]);
        }
        return json([
            'error' => true,
            'message' => "NOT a function"
        ]);
    }
    public function getWard()
    {
         $district = new Address;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idWard = (isset($_POST['idDistrict'])) ? (int)$_POST['idDistrict'] : 0;
            $result = $district->getWard($idWard);
            if ($result != NULL) {
                return json([
                    'error' => false,
                    'data' => $result
                ]);
            }
            return json([
                    'error' => true,
                    'message' => "NULL"
                ]);
        }
        return json([
            'error' => true,
            'message' => "NOT a function"
        ]);
    }




    public function create()
    {

        // $mail = new \App\Controllers\Mail();
        // $mail->CharSet = 'utf-8';
        // Core\Session::addFlash('email', "Đây là session");
        // $mail->sendConfirm("maitram0291@gmail.com");
        // dd($_POST);
    }

    public function sendMail()
    {   
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            if (isset($_POST['email'])) {
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $result = $this->user->get($_POST['email']);
                    if ($result == NULL) {
                        $_SESSION['emailUserEmail']  = $_POST['email'];
                    } else {
                       \Core\Session::addFlash('error', 'Tài khoản email này đã tồn tại');
                        return \Core\Helper::redirect('/user/login');
                    }
                    
                } else {
                    return \Core\Helper::redirect('/user/fail-email');
                }
            }
            $_SESSION['phoneUserMail'] = (isset($_POST['phone'])) ? $_POST['phone'] : '';

            #Validate password
            if (empty($_POST['password']) || empty($_POST['re_password'])) {
                \Core\Session::addFlash('error', 'Vui lòng nhập mật khẩu');
                return \Core\Helper::redirect('/user/login');
            }
            $pass = (isset($_POST['password'])) ? $_POST['password'] : "";
            
            if ($_POST['re_password'] === $pass) {
                $_SESSION['pass'] = password_hash($pass, PASSWORD_DEFAULT);
            } else {
                \Core\Session::addFlash('error', 'Mật khẩu không trùng khớp, vui lòng nhập lại');
                return \Core\Helper::redirect('/user/login');
            }
            $result = \App\Helpers\Validate::validate_password($pass);
            if ($result['error'] == true) {
                \Core\Session::addFlash('error', $result['message']);
                return \Core\Helper::redirect('/user/login');
            }
            $_SESSION['password'] = password_hash($pass, PASSWORD_DEFAULT);

            #Validata phone number
            if (empty($_POST['phone'])) {
                \Core\Session::addFlash('error', 'Vui lòng nhập số điện thoại');
                return \Core\Helper::redirect('/user/login');
            }
            $phoneNumber = $_POST['phone'];
            $result = \App\Helpers\Validate::validate_phone($phoneNumber);
            if ($result['error'] == true) {
                \Core\Session::addFlash('error', $result['message']);
                return \Core\Helper::redirect('/user/login');
            }

            $_SESSION['phoneUserMail'] = $phoneNumber;

            $address = '';
            $address .= (isset($_POST['address'])) ? \Core\Helper::makeSafe($_POST['address']) : "";
            $address .= (isset($_POST['ward'])) ? ', '.\Core\Helper::makeSafe($_POST['ward']) : "";
            $address .= (isset($_POST['district'])) ? ', '.\Core\Helper::makeSafe($_POST['district']) : "";
            $address .= (isset($_POST['province'])) ? ', '.\Core\Helper::makeSafe($_POST['province']) : "";

            $_SESSION['addressUserMail'] = $address;

            $key = __TOKEN;
   
            $info = array(
                "email" => $_SESSION['emailUserEmail'],
                "password" =>  $_SESSION['password'],
                "phone" => $_SESSION['phoneUserMail'],
                "address" => $_SESSION['addressUserMail']
            );

            $confirmCode = JWT::encode($info, $key);

            $_SESSION['urlMailConfirm'] = $_SERVER['HTTP_ORIGIN'].'/user/confirm/' . $confirmCode . '.html'; 
         
            $mail = new \App\Controllers\Mail();
            $mail->CharSet = 'utf-8';
            
            $mail->sendConfirm( $_SESSION['emailUserEmail']);
            return \Core\Helper::redirect('/user/success-email');
            
        }
        
    }
    public function sendMailView()
    {
        $this->loadView('main', [
            'template' => 'user/sendMail'
        ]);

    }

    public function registerSuccess($token = '')
    {
        
        try {
            $key = __TOKEN;
            $confirmCode = JWT::decode($token, $key, array('HS256'));
            $this->user->create($confirmCode->email, $confirmCode->password, $confirmCode->address, $confirmCode->phone);
            setcookie('username', $confirmCode->email, time() + __TIME_COOKIE__, '/');
            setcookie('password', $confirmCode->password, time() + __TIME_COOKIE__, '/');
            // echo 'Thành công';
            \Core\Helper::redirect('/user/login');
        } catch (\Throwable $th) {
            $this->loadView('main',[
                'template' => 'fail/pageFail',
                'error' => 'NOT MATCH!',
                'title' => 'Mã xác nhận không đúng',
                'content' => 'Không thể hoàn tất đăng ký do đường dẫn có sai sót'
            ]);
        }

     }   
    public function failEmail(){
        $this->loadView('main', [
                'template' => 'fail/pageFail',
                'error' => "OOP!",
                'title' => "Xin lỗi, Có lỗi xảy ra",
                'content' => "Email bạn vừa nhập có lẽ không hợp lệ hoặc đã tồn tại, vui lòng back để nhập lại hoặc chọn một email khác"
            ]);
    }
}