<?php

namespace Controllers;

class CategoryController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $arrRoleAccess = [1];
        $currenRole = $_SESSION['user']['IDRole'];
        if(!in_array($currenRole,$arrRoleAccess)){
            include("./Views/error/accessDenied.php");
            parent::__destruct();
            exit();
        }
    }
    function __destruct()
    {   
        parent::__destruct();
    }
    function payload()
    {
        //echo "cho1";
    }

    public function index()
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $allCategory = $category->getAll();
        include("./Views/category/index.php");
    }

    public function addCategory()
    {
        $nameCategory = "";
        $urlCategory = "";
        include("./Views/category/add.php");
    }

    public function addCategoryPost()
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $message = "";
        $nameCategory = $_POST['nameCategory']??"";
        $urlCategory = $_POST['urlCategory']??"";
        if($nameCategory=="")
            $message .= "Tên không được để trống.<br/>";
        if($urlCategory=="")
            $message .= "URL không được để trống.<br/>";
        if($message=="")
        {
            if($category->insertCategory($nameCategory,$urlCategory))
                $message .= "Thành công";
        }
        include("./Views/category/add.php");
    }

    public function edit($id)
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $getCategory = $category->getCategoryByID($id);
        $nameCategory = $getCategory['Name'];
        $urlCategory = $getCategory['Url'];
        include("./Views/category/edit.php");
    }

    public function editPost($id)
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $message = "";
        $nameCategory = $_POST['nameCategory']??"";
        $urlCategory = $_POST['urlCategory']??"";
        if($nameCategory=="")
            $message .= "Tên không được để trống.<br/>";
        if($urlCategory=="")
            $message .= "URL không được để trống.<br/>";
        if($message==""){
            if($category->updateCategory($id,$nameCategory,$urlCategory))
                $message.="Thành công";
        }
        include("./Views/category/edit.php");
    }

    public function deleteCategory($id)
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $message = "";
        if($category->deleteCategory($id))
            $message .= "Thành công";

        $allCategory = $category->getAll();
        include("./Views/category/index.php");
    }

    public function hideCategory($id)
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $message = "";
        if($category->showHideCategory($id,1))
            $message .= "Thành công";

        $allCategory = $category->getAll();
        include("./Views/category/index.php");
    }

    public function showCategory($id)
    {
        require PATH_ROOT ."/Models/mCategory.php";
        $message = "";
        if($category->showHideCategory($id,0))
            $message .= "Thành công";

        $allCategory = $category->getAll();
        include("./Views/category/index.php");
    }
}
