<?php
namespace Controllers;


class LoginController{
    public function index(){
        if(isset($_SESSION["user"]))
            header("Location: ./");
        include("./Views/login/index.php");
    }

    public function logout(){
        session_destroy();
        header("Location: ./login");
    }

    public function login(){
        require PATH_ROOT ."/Models/mLogin.php";
        $account = $login->verifyLogin();
        if($account){
            $_SESSION["user"] = $account;
            header("Location: ./");
        }
        else
        {
            $message = "Sai tài khoản hoặc mật khẩu";
            include("./Views/login/index.php");
        }
    }
}