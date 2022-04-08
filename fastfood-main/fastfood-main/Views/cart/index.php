<?php
    $cart = array();
    if(isset($_COOKIE["itemCart"])) {
        $cart = json_decode($_COOKIE["itemCart"]);
    }
?>
<section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $priteTotal = 0; ?>
                                <?php 
                                $outOfProductAll = false;
                                foreach($allProductInCart as $value){ 
                                    $outOfProduct = false;
                                    if($value['IsDelete'] == 1 || $value['IsShow'] == 1 || $value['CategoryIsDelete'] == 1 || $value['CategoryIsShow'] == 1){
                                        $outOfProduct = true;$outOfProductAll = true;}
                                ?>
                                <tr style="<?php echo ($outOfProduct==true)?'background: #e1e1e1;':''; ?>">
                                    <td class="shoping__cart__item">
                                        <img width="100" src="<?php echo $value['Image']; ?>" alt="">
                                        <h5><?php echo $value['Name']; ?><?php echo ($outOfProduct==true)?' (Sản phẩn này tạm thời hết hàng)':''; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo $value['Price']; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <span class="dec qtybtn" onclick="DecCart(this)" idCart="<?php echo $value['ID']; ?>">-</span>
                                                <input type="text" value="<?php echo $this->getCountCart($value['ID']); ?>">
                                                <span class="inc qtybtn" onclick="IncCart(this)" idCart="<?php echo $value['ID']; ?>">+</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php $priteTotal +=  $value['Price']*$this->getCountCart($value['ID']); ?>
                                        <?php echo $value['Price']*$this->getCountCart($value['ID']);?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" onclick="removeItemCart(this)" idCart="<?php echo $value['ID']; ?>"></span>
                                    </td>
                                </tr>    
                                <?php } ?>                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã Giảm Giá</h5>
                            <i style="color:red;"><?php echo $message??""; ?></i>
                            <br/><a href="" onclick="delete_cookie('voucherCode');delete_cookie('voucherCodePercent');location.reload();" class="link-primary" id="cancelVoucher"><i>Hủy mã giảm giá</i></a>
                            <style>
                                #cancelVoucher:hover{
                                    color:#000;
                                }
                            </style>
                            <form action="" method="post">
                                <input type="text" name="codeVoucher" placeholder="Nhập mã giảm giá của bạn">
                                <button type="submit" class="site-btn">Áp dụng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <?php
                                $priteSubTotal = $priteTotal;
                                if(isset($voucherDetail) && $voucherDetail){
                                    $priteTotal = $priteTotal - ($priteTotal * ($voucherDetail['Percent']/100));

                                    $voucherCode = $voucherDetail['ID'];  
                                    $voucherCodePercent = $voucherDetail['Percent'];
                                    echo "<p>Bạn được giảm giá {$voucherDetail['Percent']}%</p>";
                                    echo "<script>createCookie('voucherCode',{$voucherCode},2)</script>";
                                    echo "<script>createCookie('voucherCodePercent',{$voucherCodePercent},2)</script>";
                                }
                                if(isset($_COOKIE['voucherCode'])){
                                    echo "<p>Bạn được giảm giá {$_COOKIE['voucherCodePercent']}%</p>";
                                    $priteTotal = $priteTotal - ($priteTotal * ($_COOKIE['voucherCodePercent']/100));
                                }
                                echo "<script>createCookie('MoneyTotal',{$priteTotal},2)</script>";
                                echo "<script>createCookie('MoneySubTotal',{$priteSubTotal},2)</script>";
                            ?>
                            <li>Tổng tiền <span id="MoneySubTotal"><?php echo $priteSubTotal;?></span></li>
                            <li>Tổng phải thanh toán <span id="MoneyTotal"><?php echo $priteTotal;?></span></li>
                        </ul>
                        <a href="./thanhtoan" <?php echo $outOfProductAll?'onclick="alert(`Bạn có 1 sản phẩm hết hàng, vui lòng xóa khỏi giỏ hàng. Và tải lại trang`);return false;"':""; ?> class="primary-btn">Thanh Toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
