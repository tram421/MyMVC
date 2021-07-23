<?php
namespace App\Controllers\Admin;
use Core\Controller;
use App\Core\Auth;
use App\Models\Admin\Log;
class LogController extends Auth
{
    
    public function addLog($id,$action)
    {
        $log = new \App\Models\Admin\Log;
        $arr = [];
        $arr['user'] = $id;
        $arr['action'] = $action;              
        $arr['created_at'] = date("Y-m-d H:i:s");
        $log->insert($arr);
    }
    public function getAll($limit = 0, $offset = 0, $sort = 'asc')
    {
        $log = new Log;
        return $log->get($limit, $offset, $sort);
    }
    public function getForSearch($filter = 0, $input = '', $limit = 0, $offset = 0, $sort = 'desc')
    {
        $log = new Log;
        return $log->getForSearch($filter, $input, $limit, $offset, $sort);
    }

}