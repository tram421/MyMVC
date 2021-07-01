<?php 
namespace App\Core;
use Core\Controller;
use App\Models\User;
use Core\Helper;

class AuthUser extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user;
        if (isset($_COOKIE['username'])) {
            $model = new User;
            $this->user = $model->get($_COOKIE['username']);
            if (is_null($this->user)) {
                 return Helper::redirect('/user/login');
            }
            if ($this->user['password'] != $_COOKIE['password']) {
                return Helper::redirect('/user/login');
            }
            return $this->user;
        }
        return Helper::redirect('/user/login');
    }
}