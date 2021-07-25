<?php 
namespace App\Core;

use App\Models\User;
use Core\Helper;
use Core\Controller;

class Auth extends Controller
{
    public $user = NULL;
    public function __construct()
    {
        if (isset($_COOKIE['username'])) {
            $model = new User();

            $this->user = $model->get($_COOKIE['username']);
            
            if (is_null($this->user)) {
                return Helper::redirect('/admin/login');
        
            }    
            if ($this->user['password'] != $_COOKIE['password']) {
                return Helper::redirect('/admin/login');
            }
            if ($this->user['permision'] != 'admin') {
                setcookie("username", "", time() - __TIME_COOKIE__,'/');
                return Helper::redirect('/admin/login');
            }
            return $this->user;
        }
        return Helper::redirect('/admin/login');
    }
    
}