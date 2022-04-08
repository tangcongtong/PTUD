<?php

namespace Controllers;

class OrderController extends BaseController
{
    function __construct()
    {
        parent::__construct();
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
        require PATH_ROOT ."/Models/mOrder.php";

        $IDStore = $_SESSION['user']['IDStore']??"1";
        $allOrder = $order->getBillByIDStore($IDStore);
        $allStatus = $order->getAllStatus();
        include("./Views/order/index.php");
    }

    public function detail($id)
    {
        require PATH_ROOT ."/Models/mOrder.php";
        $detailBill = $order->getDetailBill($id);
        include("./Views/order/detail.php");
    }

    public function status($IDBill,$IDStatus){
        require PATH_ROOT ."/Models/mOrder.php";
        $message = "";
        $bill = $order->getBillByID($IDBill);
        if($IDStatus == 7 && $bill['Status'] != 1)
        {
            $message .= "Không được phép hủy đơn hàng";
        }
        else{
            if($order->UpdateStatusBill($IDBill,$IDStatus))
                $message .= "Thành Công";
        }
        $IDStore = $_SESSION['user']['IDStore']??"1";
        $allOrder = $order->getBillByIDStore($IDStore);
        $allStatus = $order->getAllStatus();
        include("./Views/order/index.php");
    }
}
