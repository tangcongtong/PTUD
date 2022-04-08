<?php 

$router->get('/', 'HomeController@index');
$router->get('/test/{id}-{id}', 'welcome@test');
$router->get('/danhmuc/{name}-{id}', 'CategoryController@index');
$router->get('/giohang', 'CartController@index');
$router->post('/giohang', 'CartController@voucher');
$router->get('/thanhtoan', 'CheckoutController@index');
$router->post('/thanhtoan', 'CheckoutController@checkout');
$router->get('/contact', 'ContactController@index');