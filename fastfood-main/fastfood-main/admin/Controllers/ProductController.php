<?php

namespace Controllers;

class ProductController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $arrRoleAccess = [1,2];
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
        require PATH_ROOT ."/Models/mProduct.php";
        $allProducts = $product->getAll();
        include("./Views/product/index.php");
    }
    
    public function add(){
        require PATH_ROOT ."/Models/mProduct.php";
        $allCategory = $product->getAllCategory();
        include("./Views/product/add.php");
    }
    function imageToBase64(){
        if(!isset($_FILES['fileUpload']))
            return "";
        if ($_FILES['fileUpload']['error'] > 0)
            return "";
        $path = $_FILES['fileUpload']['tmp_name'];
        $type = $_FILES['fileUpload']['type'];
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    public function addProduct(){
        //print_r($_POST);
        require PATH_ROOT ."/Models/mProduct.php";
        $allCategory = $product->getAllCategory();
        $message = "";
        $productName = $_POST['name']??"";
        $price = $_POST['price']??"";
        $category = $_POST['category']??"";
        $image = $this->imageToBase64();
        if($productName == "")
            $message .= "Không được để tên trống<br/>";
        if($price == "")
            $message .= "Không được để Giá trống<br/>";
        if($category == "")
            $message .= "Không được để Loại sản phẩm trống<br/>";
        if($image == "")
            $message .= "Không được để Hình ảnh trống<br/>";
        if($message == ""){
            if($product->insertProduct($productName,$price,$image,$category))
                $message .= "Thành công";
        }
        include("./Views/product/add.php");
    }
    public function edit($IDProduct){
        require PATH_ROOT ."/Models/mProduct.php";
        $currenProduct = $product->getProductByID($IDProduct);
        $allCategory = $product->getAllCategory();

        $productName = $currenProduct['Name']??"";
        $price = $currenProduct['Price']??"";
        $IDCategory = $currenProduct['IDCategory']??"";
        $Image = $currenProduct['Image']??"";
        include("./Views/product/edit.php");
    }

    public function editPost($IDProduct){
        require PATH_ROOT ."/Models/mProduct.php";
        $allCategory = $product->getAllCategory();

        $Image = $this->imageToBase64();
        if($Image=="")
            $Image = $_POST['image']??"";
        $message = "";

        $productName = $_POST['name']??"";
        $price = $_POST['price']??"";
        $IDCategory = $_POST['category']??"";

        if($productName == "")
            $message .= "Không được để tên trống<br/>";
        if($price == "")
            $message .= "Không được để Giá trống<br/>";
        if($IDCategory == "")
            $message .= "Không được để Loại sản phẩm trống<br/>";
        if($Image == "")
            $message .= "Không được để Hình ảnh trống<br/>";
        if($message == ""){
            if($product->UpdateProduct($IDProduct,$productName,$price,$Image,$IDCategory))
                $message .= "Thành công";
        }
        include("./Views/product/edit.php");
    }

    public function deleteProduct($IDProduct){
        require PATH_ROOT ."/Models/mProduct.php";
        $message = "";
        if($product->DeleteProduct($IDProduct))
            $message .= "Thành công";
        else
            $message .= "Xóa Thất bại";
            
        $allProducts = $product->getAll();
        include("./Views/product/index.php");
    }

    public function showProduct($id){
        require PATH_ROOT ."/Models/mProduct.php";
        $message= "Thất bại";
        if($product->showHideProduct($id,0))
            $message= "Thành công";

        $allProducts = $product->getAll();
        include("./Views/product/index.php");
    }

    public function hideProduct($id){
        require PATH_ROOT ."/Models/mProduct.php";
        $message= "Thất bại";
        if($product->showHideProduct($id,1))
            $message= "Thành công";
            
        $allProducts = $product->getAll();
        include("./Views/product/index.php");
    }
}
