<div class="container">

    <div class="checkout__form">
        <h4>Chi tiết đơn hàng</h4>
        <p style="color:red;">
            <?php echo $message ?? ""; ?>
        </p>
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Họ và tên<span>*</span></p>
                                <input name="name" type="text" placeholder="Họ và tên">
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <p>Địa chỉ<span>*</span></p>
                        <input type="text" name="address" placeholder="Địa chỉ" class="checkout__input__add">
                    </div>
                    <input name="idVoucher" type="hidden" value="<?php echo $_COOKIE['voucherCode'] ?? "0"; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input name="numberPhone" type="number" placeholder="Số điện thoại">
                            </div>
                                <p>Chi nhánh<span>*</span></p>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="IDStore">
                                        <?php foreach($allStore as $value){ ?>
                                            <option selected="selected" value="<?php echo $value['ID']; ?>"><?php echo "{$value['StoreName']} ({$value['Address']})"; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="checkout__order">
                        <h4>Đơn hàng của bạn:</h4>
                        <div class="checkout__order__products">Sản phẩm <span>tổng</span></div>
                        <ul>
                            <?php foreach ($allProductInCart as $value) { ?>
                                <li><?php echo $value['Name']; ?> <span><?php echo $value['Price'] * $this->getCountCart($value['ID']); ?></span></li>
                            <?php } ?>
                        </ul>
                        <div class="checkout__order__subtotal">Tổng tiền <span><?php echo $_COOKIE['MoneySubTotal']; ?></span></div>
                        <div class="checkout__order__total">Giảm giá <span><?php echo $_COOKIE['voucherCodePercent'] ?? "0"; ?>%</span></div>
                        <div class="checkout__order__total">Tổng phải thanh toán <span><?php echo $_COOKIE['MoneyTotal']; ?></span></div>
                        <button type="submit" class="site-btn">Đặt Hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>