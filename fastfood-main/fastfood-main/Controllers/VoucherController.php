<?php
namespace Controllers;


class VoucherController{
    public function index(){
        require PATH_ROOT ."/Models/mHome.php";
        $allProduct = $home->getTop8();
        $allCategory = $home->getCategoryTop8();
        include("./Views/home/index.php");
    }
}