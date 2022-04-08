<?php
session_start();

// Định nghĩa hằng Path của file index.php
define('PATH_ROOT', __DIR__);

// Autoload class trong PHP
spl_autoload_register(function (string $class_name) {
    include_once str_replace("\\","/",PATH_ROOT . '/' . $class_name . '.php');
});

include_once PATH_ROOT . "/config/config.php";
require_once PATH_ROOT . "/libs/DB_driver.php";
include_once PATH_ROOT . "/libs/DB_business.php";
// load class Route
$router = new core\http\Route();
include_once PATH_ROOT . '/app/routes.php';

// Lấy url hiện tại của trang web. Mặc định la /
$request_url = !empty($_GET['url']) ? '/' . $_GET['url'] : '/';

// Lấy phương thức hiện tại của url đang được gọi. (GET | POST). Mặc định là GET.
$method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';


// map URL
$router->map($request_url, $method_url);

//include("Views/template/footer.php");