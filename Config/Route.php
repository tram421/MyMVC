<?php

$routes['']                         = 'App\Controllers\MainController@index';
$routes['admin/login']              = 'App\Controllers\Admin\LoginController@index';
$routes['admin/user/login/store']   = 'App\Controllers\Admin\LoginController@store';
$routes['admin/main']               = 'App\Controllers\Admin\MainController@index';

//Danh mục
$routes['admin/menus/add']              = 'App\Controllers\Admin\MenuController@create';
$routes['admin/menus/store']            = 'App\Controllers\Admin\MenuController@store';
$routes['admin/menus/list']             = 'App\Controllers\Admin\MenuController@index';
$routes['admin/menus/edit/{id}']        = 'App\Controllers\Admin\MenuController@edit';
$routes['admin/menus/update/{id}']      = 'App\Controllers\Admin\MenuController@update';
$routes['admin/menus/delete']           = 'App\Controllers\Admin\MenuController@destroy';

#Product
$routes['admin/products/add'] = 'App\Controllers\Admin\ProductController@create';