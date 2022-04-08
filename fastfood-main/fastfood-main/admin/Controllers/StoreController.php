<?php

namespace Controllers;

class StoreController extends BaseController
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
        require PATH_ROOT ."/Models/mStore.php";
        $allStores = $store->getAll();
        include("./Views/store/index.php");
    }
    public function add()
    {        
        include("./Views/store/add.php");
    }

    public function addPost(){
        require PATH_ROOT ."/Models/mStore.php";
        $nameStore = $_POST['nameStore']??"";
        $address = $_POST['address']??"";
        $userName = $_POST['userName']??"";
        $message = "";
        if($nameStore == "")
            $message .= "Không được để tên cửa hàng trống<br/>";
        if($address == "")
            $message .= "Không được để địa chỉ trống<br/>";
        if($userName == "")
            $message .= "Không được để tài khoản quản lý trống<br/>";
        if($message == ""){
            $IDUser = $store->getUserByUserName($userName)['ID']??"";
            if($IDUser==""){
                $message .= "Tài khoản quản lý không tồn tại";
            }else{
                if($store->insertStore($nameStore,$address,$IDUser))
                    $message .= "Thành công";
            }
            
        }
        include("./Views/store/add.php");
    }
    public function edit($idStore)
    {
        require PATH_ROOT ."/Models/mStore.php";
        $currentStore = $store->getStoreByID($idStore);
        $nameStore = $currentStore['StoreName']??"";
        $address = $currentStore['Address']??"";
        $userName = $currentStore['UserName']??"";
        include("./Views/store/edit.php");
    }

    public function editPost($idStore)
    {
        require PATH_ROOT ."/Models/mStore.php";
        $nameStore = $_POST['nameStore']??"";
        $address = $_POST['address']??"";
        $userName = $_POST['userName']??"";
        $message = "";
        if($nameStore == "")
            $message .= "Không được để tên cửa hàng trống<br/>";
        if($address == "")
            $message .= "Không được để địa chỉ trống<br/>";
        if($userName == "")
            $message .= "Không được để tài khoản quản lý trống<br/>";
        if($message == ""){
            $IDUser = $store->getUserByUserName($userName)['ID']??"";
            if($IDUser==""){
                $message .= "Tài khoản quản lý không tồn tại";
            }else{
                if($store->updateStore($idStore,$nameStore,$address,$IDUser))
                    $message .= "Thành công";
            }
            
        }
        include("./Views/store/edit.php");
    }

    public function delete($IDStore)
    {
        require PATH_ROOT ."/Models/mStore.php";
        $message = "";
        if($store->deleteStore($IDStore))
            $message .= "Thành công";
        $allStores = $store->getAll();
        include("./Views/store/index.php");
    }
}
