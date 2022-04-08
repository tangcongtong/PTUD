<!-- Featured Section Begin -->
<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm mới nhất</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            <?php foreach($allCategory as $value){ ?>
                                <li data-filter=".<?php echo $value['Url']; ?>"><?php echo $value['Name']; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id="MixItUp18D19C">

                <?php foreach($allProduct as $value){ ?>
                    <!--item-->
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges <?php echo $value['Url']; ?>">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="<?php echo $value['Image']; ?>" style="background-image: url(<?php echo $value['Image']; ?>);">
                                <ul class="featured__item__pic__hover">
                                    <li><a id="shopping-cart" value="<?php echo $value['ID']; ?>" onclick="addCart(this)"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a><?php echo $value['Name']; ?></a></h6>
                                <h5><?php echo $value['Price']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <!--item-->
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->