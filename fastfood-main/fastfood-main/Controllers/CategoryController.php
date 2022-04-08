<?php
namespace Controllers;

class CategoryController{
    public function index($name,$id){      
        require PATH_ROOT ."/Models/mProduct.php";
        $page = 1;
        $limitOnePage = 20;
        if(isset($_GET['page'])){
            $page = $_GET['page']??1;
        }

        
        $CategoryProduct = $product->getProductByCategory($id);
        $totalProduct = count($CategoryProduct);
        $totalPage =  ceil($totalProduct/$limitOnePage);

        if($page<1)
            $page=1;
        if($page > $totalPage && $totalPage != 0)
            $page = $totalPage;
        $fromPage = ($page - 1) * $limitOnePage;
        
        $CategoryProduct = $product->getProductByCategoryWithPage($id,$fromPage,$limitOnePage);
        include("./Views/category/index.php");
    }
}