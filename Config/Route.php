<?php

$routes['']                         = 'App\Controllers\MainController@index';
$routes['admin/login']              = 'App\Controllers\Admin\LoginController@index';
$routes['admin/user/login/store']   = 'App\Controllers\Admin\LoginController@store';
$routes['admin/main']               = 'App\Controllers\Admin\MainController@index';

//Danh mục
$routes['admin/menus/add']                      = 'App\Controllers\Admin\MenuController@create';
$routes['admin/menus/store']                    = 'App\Controllers\Admin\MenuController@store';
$routes['admin/menus/list']                     = 'App\Controllers\Admin\MenuController@index';
$routes['admin/menus/edit/{id}']                = 'App\Controllers\Admin\MenuController@edit';
$routes['admin/menus/update/{id}']              = 'App\Controllers\Admin\MenuController@update';
$routes['admin/menus/delete']                   = 'App\Controllers\Admin\MenuController@destroy';
$routes['admin/menus/editActive/{id}/{stt}']    = 'App\Controllers\Admin\MenuController@editActive';

//upload
$routes['admin/upload/add'] = 'App\Controllers\Admin\UploadController@store';
$routes['admin/upload/add/{id}'] = 'App\Controllers\Admin\UploadController@store';


//#Product
$routes['admin/products/add'] = 'App\Controllers\Admin\ProductController@create';
$routes['admin/products/store'] = 'App\Controllers\Admin\ProductController@store';
$routes['admin/products/list'] = 'App\Controllers\Admin\ProductController@index';
$routes['admin/products/editActive/{id}/{stt}'] = 'App\Controllers\Admin\ProductController@editActive';
$routes['admin/products/edit/{id}'] = 'App\Controllers\Admin\ProductController@edit';
$routes['admin/products/update'] = 'App\Controllers\Admin\ProductController@update';
$routes['admin/products/trash'] = 'App\Controllers\Admin\ProductController@trash';
$routes['admin/products/trashlist'] = 'App\Controllers\Admin\ProductController@trashlist';
$routes['admin/products/destroy'] = 'App\Controllers\Admin\ProductController@destroy';
$routes['admin/products/restock'] = 'App\Controllers\Admin\ProductController@restock';

//Slide
$routes['admin/slide'] = 'App\Controllers\Admin\SlideController@index';
$routes['admin/slide/add'] = 'App\Controllers\Admin\SlideController@add';
$routes['admin/slide/update'] = 'App\Controllers\Admin\SlideController@update';
$routes['admin/slide/destroy'] = 'App\Controllers\Admin\SlideController@destroy';