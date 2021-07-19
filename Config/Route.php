<?php
//puclic
$routes['danh-muc/{slug}-id{id}.html'] = 'App\Controllers\MenuController@index';

//product
$routes['services/product'] = 'App\Controllers\ProductController@loadmore';
$routes['services/productmodal'] = 'App\Controllers\ProductController@loadModal';
$routes['san-pham/{slug}-id{id}.html'] = 'App\Controllers\ProductController@showDetail';
$routes['check/fileExist'] = 'App\Services\Check@file_exist';
//cart
$routes['cart/add'] = 'App\Controllers\CartController@add';
$routes['cart/delete'] = 'App\Controllers\CartController@delete';
$routes['cart/pay'] = 'App\Controllers\CartController@pay';
$routes['cart/order'] = 'App\Controllers\CartController@order';
$routes['shoping-cart.html'] = 'App\Controllers\CartController@shopingCart';
$routes['updateCart'] = 'App\Controllers\CartController@updateCart';
$routes['order/success-email'] = 'App\Controllers\CartController@sendMailView';
$routes['order/success-{id}'] = 'App\Controllers\CartController@orderSuccess';
//user
$routes['user/login'] = 'App\Controllers\UserController@login';
$routes['user/check'] = 'App\Controllers\UserController@check';
$routes['user/signUp'] = 'App\Controllers\UserController@signUp';
$routes['user/signOut'] = 'App\Controllers\UserController@signOut';
$routes['user/create'] = 'App\Controllers\UserController@create';
$routes['services/getDistrict'] = 'App\Controllers\UserController@getDistrict';
$routes['services/getWard'] = 'App\Controllers\UserController@getWard';
$routes['services/getStreet'] = 'App\Controllers\UserController@getStreet';
$routes['user/send-mail'] = 'App\Controllers\UserController@sendMail';
$routes['user/fail-email'] = 'App\Controllers\UserController@failEmail';
$routes['user/success-email'] = 'App\Controllers\UserController@sendMailView';
$routes['user/confirm/{token}.html'] = 'App\Controllers\UserController@registerSuccess';
$routes['member/info/order'] = 'App\Controllers\MemberController@order';
$routes['member/info/orderComplete'] = 'App\Controllers\MemberController@orderComplete';
//page
$routes['page/{slug}.html'] = 'App\Controllers\PageController@show';
//search
$routes['search'] = 'App\Controllers\SearchController@show';
//view post
$routes['post/id{id}-slug{slug}.html'] = 'App\Controllers\PostController@show';
$routes['post/listCat/{cat}'] = 'App\Controllers\PostController@listOfCat';

//--------------------------------------------------------------------------------------
//admin
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
$routes['admin/products/listDesc'] = 'App\Controllers\Admin\ProductController@listDesc';
$routes['admin/products/editActive/{id}/{stt}'] = 'App\Controllers\Admin\ProductController@editActive';
$routes['admin/products/editFeature/{id}/{stt}'] = 'App\Controllers\Admin\ProductController@editFeature';
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

//order
$routes['admin/orders/manage/{tab}'] = 'App\Controllers\Admin\OrderController@list';
$routes['admin/orders/manage/completeOrder'] = 'App\Controllers\Admin\OrderController@completeOrder';
$routes['admin/order/getInfo'] = 'App\Controllers\Admin\OrderController@getInfo';
$routes['admin/order/storeShipCost'] = 'App\Controllers\Admin\OrderController@storeShipCost';
$routes['admin/order/setState'] = 'App\Controllers\Admin\OrderController@setState';
$routes['admin/order/delete'] = 'App\Controllers\Admin\OrderController@delete';
$routes['admin/orders/trash'] = 'App\Controllers\Admin\OrderController@trash';
//post 
$routes['admin/posts/add'] = 'App\Controllers\Admin\PostController@add';
$routes['admin/post/create'] = 'App\Controllers\Admin\PostController@create';
$routes['admin/post/update'] = 'App\Controllers\Admin\PostController@update';
$routes['admin/post/trash'] = 'App\Controllers\Admin\PostController@trash';
$routes['admin/post/edit/{id}'] = 'App\Controllers\Admin\PostController@edit';
$routes['admin/post/restore/{id}'] = 'App\Controllers\Admin\PostController@restore';
$routes['admin/posts/list'] = 'App\Controllers\Admin\PostController@list';
$routes['admin/posts/listDesc'] = 'App\Controllers\Admin\PostController@listDesc';
$routes['admin/posts/editActive/{id}/{stt}'] = 'App\Controllers\Admin\PostController@editActive';
$routes['admin/post/trashlist'] = 'App\Controllers\Admin\PostController@trashList';
//page
$routes['admin/page/{slug}'] = 'App\Controllers\Admin\PageController@manage';
$routes['admin/page/update'] = 'App\Controllers\Admin\PageController@update';