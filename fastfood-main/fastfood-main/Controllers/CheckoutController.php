<?php
namespace Controllers;


class CheckoutController{

    private function getCountCart($id){
        $cart = array();
        if(isset($_COOKIE["itemCart"])) {
            $cart = json_decode($_COOKIE["itemCart"]);
        }       
        foreach($cart as $value){
            if($value->data == $id)
                return $value->count;
        }
        return 0;
    }
    public function index($message=""){
        $cart = array();
        if(isset($_COOKIE["itemCart"])) {
            $cart = json_decode($_COOKIE["itemCart"]);
        }
        
        $idCart = "";
        foreach($cart as $value){
            $idCart= $idCart."{$value->data},";
        }
        $idCart = substr($idCart, 0, -1);
        require PATH_ROOT ."/Models/mProduct.php";
        $allProductInCart = $product->getProductByID($idCart);
        $allStore = $product->getAllStore();
        include("./Views/checkout/index.php");
    }

    public function checkout(){
        
        $name = $_POST['name']??"";
        $adddress = $_POST['address']??"";
        $numberPhone = $_POST['numberPhone']??"";
        $IDvoucher = $_POST['idVoucher']??"";
        $IDStore = $_POST['IDStore']??"";
        $message = "";
        if($name == "")
            $message .= "Vui lòng nhập tên<br/>";
        if($adddress == "")
            $message .= "Vui lòng nhập địa chỉ<br/>";
        if($numberPhone == "")
            $message .= "Vui lòng nhập số điện thoại<br/>";
        if($message != "")
        {
            $this->index($message);
            return;
        }
        require PATH_ROOT ."/Models/mBill.php";
        $idBill = $bill->insertBill($name,$adddress,$numberPhone,$IDvoucher,$IDStore);

        //insert to cartdetail
        $cart = array();
        if(isset($_COOKIE["itemCart"])) {
            $cart = json_decode($_COOKIE["itemCart"]);
        }
        
        $idCart = "";
        foreach($cart as $value){
            $idCart= $idCart."{$value->data},";
        }
        $idCart = substr($idCart, 0, -1);
        require PATH_ROOT ."/Models/mProduct.php";
        $allProductInCart = $product->getProductByID($idCart);

        foreach($allProductInCart as $value){
            $bill->insertDetail($idBill,$value['ID'],$this->getCountCart($value['ID']));
        }
        echo "<script>deleteAllCookies();</script>";
        echo '<h1 style=" text-align: center;">Đặt Hàng Thành công</h1>';
    }
}