<?php
namespace Controllers;

class CartController{
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
    public function index(){
        $cart = array();
        if(isset($_COOKIE["itemCart"])) {
            $cart = json_decode($_COOKIE["itemCart"]);
        }

        $idCart = "";
        foreach($cart as $value){
            $idCart= $idCart."{$value->data},";
        }
        $idCart = substr($idCart, 0, -1);
        if(!$idCart){
            echo '<h1 style="text-align: center;">Giỏ hàng trống rỗng :((</h1>';
            return;
        }
        require PATH_ROOT ."/Models/mProduct.php";

        $allProductInCart = $product->getProductByID($idCart);

        include("./Views/cart/index.php");
    }

    public function voucher(){        
        $message = "";
        $codeVoucher = $_POST['codeVoucher']??"";
        require PATH_ROOT ."/Models/mVoucher.php";
        if($codeVoucher == "")
            $message .= "Mã giảm giá không được để trống :><br/>";
        if($message == ""){
            $voucherDetail = $voucher->getVoucherByCode($codeVoucher);
            if(!$voucherDetail)
                $message .= "Mã giảm giá không tồn tại :><br/>";
        }
        
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
        include("./Views/cart/index.php");
    }
}