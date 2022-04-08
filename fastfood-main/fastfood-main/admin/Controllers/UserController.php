<?php

namespace Controllers;

class UserController extends BaseController
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
        require PATH_ROOT ."/Models/mUser.php";
        $allUser = $user->getUserAll();
        include("./Views/user/index.php");
    }

    public function add(){
        require PATH_ROOT ."/Models/mUser.php";
        $allRoles = $user->getRoles();
        $allStore = $user->getAllStore();
        $userRole = $_SESSION['user']['Role']??0;
        include("./Views/user/add.php");
    }

    public function addPost(){
        require PATH_ROOT ."/Models/mUser.php";
        $allRoles = $user->getRoles();
        $allStore = $user->getAllStore();
        $message = "";

        $userName = $_POST['userName']??"";
        $name = $_POST['name']??"";
        $password = $_POST['password']??"";
        $IDRole = $_POST['IDRole']??"";
        $IDStore = $_POST['IDStore'];
        if($userName == "")
            $message .= "Không được để Tên tài khoản trống<br/>";
        if($name == "")
            $message .= "Không được để Họ và tên trống<br/>";
        if($password == "")
            $message .= "Không được để Mật khẩu trống<br/>";
        if($IDRole == "")
            $message .= "Không được để Chức vụ trống<br/>";       
        if($message == ""){
            if($user->insertUser($userName,$name,$password,$IDRole,$IDStore))
                $message .= "Thành công";
            else
                $message .= "Tên tài khoản đã tồn tại";
        }
        include("./Views/user/add.php");
    }

    public function edit($idUser){
        require PATH_ROOT ."/Models/mUser.php";
        $allRoles = $user->getRoles();
        $currentUser = $user->getUser($idUser);
        $allStore = $user->getAllStore();
        $userRole = $_SESSION['user']['Role']??0;
        $message = "";

        $userName = $currentUser['UserName']??"";
        $name = $currentUser['Name']??"";
        $password = $_POST['password']??"";
        $IDRole = $currentUser['Role']??"";
        $IDStore = $currentUser['IDStore']??"1";
        include("./Views/user/edit.php");
    }

    public function editPost($idUser){
        require PATH_ROOT ."/Models/mUser.php";
        $allStore = $user->getAllStore();
        $allRoles = $user->getRoles();
        
        $userName = $_POST['userName']??"";
        $name = $_POST['name']??"";
        $password = $_POST['password']??"";
        $IDRole = $_POST['IDRole']??"";
        $message = "";
        if($userName == "")
            $message .= "Không được để Tên tài khoản trống<br/>";
        if($name == "")
            $message .= "Không được để Họ và tên trống<br/>";
    
        if($message == ""){
            if($user->updateUser($idUser,$userName,$name,$password,$IDRole))
                $message .= "Thành công";
        }
        include("./Views/user/edit.php");
    }

    public function deleteUser($idUser){
        require PATH_ROOT ."/Models/mUser.php";
        $message = "";
        if($user->deleteUser($idUser))
            $message .= "Thành công";
        $allUser = $user->getUserAll();
        include("./Views/user/index.php");
    }
}
