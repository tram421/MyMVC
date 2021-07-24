<?php
namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\Admin\Menu;
use App\Models\Admin\Product;
use Core\Session;
use Core\Helper;
use App\Controllers\Mail;
use App\Models\User;

class MailController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }
    public function sendUser()
    {
        $user = new User;
        $list = $user->getUser();
         $page = (isset($_GET['page']) && $_GET['page'] > 1) ? (int) $_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $count = (int)$list->num_rows;
        $sumPage = ceil($count / $limit);

        $this->loadView('admin/main',[
            'title' => 'Gửi thư cho user',
            'template'=> 'mail/view',
            'data'  => $list,
            'page' => $page,
            'sumPage' => $sumPage
        ]);
    }
/*
array(8) {
  ["email"]=>
  array(2) {
    ["ketbanbonphuong.2022@gmail.com"]=>
    string(2) "on"
    ["maitram.net@gmail.com"]=>
    string(2) "on"
  }
  ["mainSubject"]=>
  string(11) "Tiêu đề"
  ["subSubject"]=>
  string(7) "dádasd"
  ["hello"]=>
  string(6) "đâsd"
  ["helloContent"]=>
  string(8) "ssdasdas"
  ["detailMain"]=>
  string(7) "dasdasd"
  ["detail"]=>
  string(9) "đâsđá"
  ["thank"]=>
  string(9) "đasadasd"
}
*/
    public function send()
    {
        $mail = new Mail;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = (isset($_POST['email'])) ? $_POST['email'] : NULL;
            if ($email == NULL) {
                Session::addFlash('error', 'Chưa chọn người gửi');
                return Helper::reload();
            }
            $mainSubject = (isset($_POST['mainSubject'])) ? Helper::makeSafe($_POST['mainSubject']) : '';
            $subSubject = (isset($_POST['subSubject'])) ? Helper::makeSafe($_POST['subSubject']) : '';
            $hello = (isset($_POST['hello'])) ? Helper::makeSafe($_POST['hello']) : '';
            $helloContent = (isset($_POST['helloContent'])) ? Helper::makeSafe($_POST['helloContent']) : '';
            $detailMain = (isset($_POST['detailMain'])) ? Helper::makeSafe($_POST['detailMain']) : '';
            $detail = (isset($_POST['detail'])) ? Helper::makeSafe($_POST['detail']) : '';
            $thank = (isset($_POST['thank'])) ? Helper::makeSafe($_POST['thank']) : '';
            $reasonSend = (isset($_POST['reasonSend'])) ? Helper::makeSafe($_POST['reasonSend']) : '';
            $nameReceiver = (isset($_POST['nameReceiver'])) ? Helper::makeSafe($_POST['nameReceiver']) : '';
           

            foreach ($email as $key=>$value) {
                $_SESSION['mainSubject'] = $mainSubject;
                $_SESSION['subSubject'] = $subSubject;
                $_SESSION['hello'] = $hello;
                $_SESSION['helloContent'] = $helloContent;
                $_SESSION['detailMain'] = $detailMain;
                $_SESSION['detail'] = $detail;
                $_SESSION['thank'] = $thank;
                $_SESSION['nameReceiver'] = $nameReceiver;
                $mail->sendMail($key, $_SESSION, '/admin/mail/template.php', $reasonSend);
            }
            Session::addFlash('success', 'Gửi Thành công');
            return Helper::reload();
        }
        Session::addFlash('error', 'Lỗi: Không tồn tại phương thức');
        return Helper::reload();
    }
}