<?php

namespace Controllers;

class VoucherController extends BaseController
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
        require PATH_ROOT ."/Models/mVoucher.php";
        $allVoucher = $voucher->getAll();
        include("./Views/voucher/index.php");
    }

    public function add()
    {
        include("./Views/voucher/add.php");
    }

    public function addPost()
    {
        require PATH_ROOT ."/Models/mVoucher.php";
        $message = "";
        $code = $_POST['code']??"";
        $percent = $_POST['percent']??"";
        if($code == "")
            $message .= "Mã giảm giá không được để trống.<br/>";
        if($percent == "")
            $message .= "Phẩn trăm giảm giá không được để trống.<br/>";
        if($message == ""){
            if($voucher->insertVoucher($code,$percent))
                $message .= "Thành công";
            else
                $message .= "Mã giảm giá đã tồn tại";
        }
        include("./Views/voucher/add.php");
    }

    public function edit($id){
        require PATH_ROOT ."/Models/mVoucher.php";
        $getVoucher = $voucher->getVoucherByID($id);
        $message = "";
        $code = $getVoucher['Code']??"";
        $percent = $getVoucher['Percent']??"";

        include("./Views/voucher/edit.php");
    }

    public function editPost($id)
    {
        require PATH_ROOT ."/Models/mVoucher.php";
        $message = "";
        $code = $_POST['code']??"";
        $percent = $_POST['percent']??"";
        if($code == "")
            $message .= "Mã giảm giá không được để trống.<br/>";
        if($percent == "")
            $message .= "Phẩn trăm giảm giá không được để trống.<br/>";
        if($message == ""){
            if($voucher->editVoucher($id,$code,$percent))
                $message .= "Thành công";
            else
                $message .= "Mã giảm giá đã tồn tại";
        }
        include("./Views/voucher/edit.php");       
    }

    public function turnOffVoucher($id)
    {
        require PATH_ROOT ."/Models/mVoucher.php";
        $voucher->onOffVoucher($id,1);
        $allVoucher = $voucher->getAll();
        include("./Views/voucher/index.php");
    }

    public function turnOnVoucher($id)
    {
        require PATH_ROOT ."/Models/mVoucher.php";
        $voucher->onOffVoucher($id,0);
        $allVoucher = $voucher->getAll();
        include("./Views/voucher/index.php");
    }

}
