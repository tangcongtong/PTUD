<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fast food</title>
    <base href="<?php echo baseUrl; ?>">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="resource/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="resource/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="resource/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="resource/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="resource/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="resource/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="resource/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="resource/css/style.css" type="text/css">
</head>

<body>
    <div id="preloder" style="display: none;">
        <div class="loader" style="display: none;"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="resource/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="./giohang"><i class="fa fa-shopping-bag"></i></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng Nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./">Trang Chủ</a></li>
                <li><a href="./contact">Liên Hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap">
            <div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style=""><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a>
                <nav class="slicknav_nav slicknav_hidden" style="display: none;" aria-hidden="true" role="menu">
                    <ul>
                        <li class="active"><a href="./" role="menuitem">Trang Chủ</a></li>
                        <li><a href="./shop-grid.html" role="menuitem">Sản phẩm</a></li>
                        <li><a href="./contact" role="menuitem">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> dep@trai.com</li>
                <li>Miễn phí vận chuyển từ 0đ</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./"><i style="font-size: 40px;color: green;">FastFood</i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./">Trang Chủ</a></li>
                            <li><a href="./contact">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="./giohang"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
                        </ul>
                        <div class="header__cart__price"><span></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <?php
    require PATH_ROOT . "/Models/mCategory.php";
    $GLOBALS['allCatogory'] = $category->getAll();
    ?>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <br>
    
    <section class="hero" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all" >
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul >
                            <?php foreach ($GLOBALS['allCatogory'] as $value) { ?>
                                <li><a href="danhmuc/<?php echo $value['Url'] . "-" . $value['ID']; ?>"><?php echo $value['Name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9" >
                    <div class="hero__search">
                    </div>
                    <div class="hero__item set-bg" data-setbg="resource/img/banner/banner-4.jpg" style="background-image: url(&quot;resource/img/banner/banner-4.jpg&quot;);height:300px; width: 900px">
                        <div class="hero__text">
                            <span>Thức ăn nhanh</span>
                           
                            <p style="color: green;">Nhận và giao hàng miễn phí</p>
                            <a href="#" class="primary-btn">Đặt hàng ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <div aria-live="polite" aria-atomic="true" style="position: relative;">
        <div class="toast" style="position: fixed; top: -10px; right: 0;">
            <div class="toast-header">

                <strong class="mr-auto">Thông báo</strong>
                <small>Hiện tại</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Thêm vào giỏ hàng thành công
            </div>
        </div>
    </div>
    <script>
        function createCookie(name, value, days) {
            var expires;
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }

        function getCookie(c_name) {
            if (document.cookie.length > 0) {
                c_start = document.cookie.indexOf(c_name + "=");
                if (c_start != -1) {
                    c_start = c_start + c_name.length + 1;
                    c_end = document.cookie.indexOf(";", c_start);
                    if (c_end == -1) {
                        c_end = document.cookie.length;
                    }
                    return unescape(document.cookie.substring(c_start, c_end));
                }
            }
            return "";
        }

        function delete_cookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }

        function deleteAllCookies() {
            let itemCart = [];
            // createCookie("itemCart",JSON.stringify(itemCart),2);
            // createCookie("voucherCode","",2);
            // createCookie("voucherCodePercent","",0);
            // createCookie("MoneyTotal","0",0);
            // createCookie("MoneySubTotal","0",0);
            delete_cookie("itemCart");
            delete_cookie("voucherCode");
            delete_cookie("voucherCodePercent");
            delete_cookie("MoneyTotal");
            delete_cookie("MoneySubTotal");
        }

        function addCart(e) {
            let itemCart = [];
            if (getCookie("itemCart") != "")
                itemCart = JSON.parse(getCookie("itemCart"));

            let dataItem = parseInt(e.getAttribute("value"));
            let isAdd = false;

            itemCart.forEach(function(entry) {
                if (entry.data == dataItem) {
                    entry.count += 1;
                    createCookie("itemCart", JSON.stringify(itemCart), 2);
                    isAdd = true;
                    $('.toast').toast("show");
                    return;
                }
            });

            if (isAdd)
                return;
            let length = itemCart.length;
            itemCart.push({
                "data": dataItem,
                "count": 1
            });
            createCookie("itemCart", JSON.stringify(itemCart), 2);
            $('.toast').toast("show");
            return;
        }

        function DecCart(e) {
            let itemCart = [];
            if (getCookie("itemCart") != "")
                itemCart = JSON.parse(getCookie("itemCart"));

            let dataItem = parseInt(e.getAttribute("idCart"));
            itemCart.forEach(function(entry, index) {
                if (entry.data == dataItem) {
                    entry.count -= 1;
                    if (entry.count == 0) {
                        e.closest("tr").remove();
                        itemCart.splice(index, 1);
                        //createCookie("itemCart",JSON.stringify(itemCart),2);     
                    }
                    createCookie("itemCart", JSON.stringify(itemCart), 2);
                    //tinh lai tong cong cho item
                    let price = e.parentElement.parentElement.parentElement.parentElement.childNodes[3].innerText;
                    let count = entry.count;
                    e.parentElement.parentElement.parentElement.parentElement.childNodes[7].innerText = count * price;
                    //tinh lai tong cong cho item
                    //tinh lai tong cong thanh toan
                    let currentMoney = document.querySelector("#MoneySubTotal").innerText;
                    document.querySelector("#MoneySubTotal").innerText = parseInt(currentMoney) - parseInt(price);
                    document.querySelector("#MoneyTotal").innerText = parseInt(currentMoney) - parseInt(price);
                    let moneyTotal = document.querySelector("#MoneyTotal").innerText;

                    if (getCookie("voucherCodePercent") != "")
                        document.querySelector("#MoneyTotal").innerText = parseInt(moneyTotal) - (moneyTotal * parseInt(getCookie("voucherCodePercent")) / 100);

                    createCookie("MoneyTotal", document.querySelector("#MoneyTotal").innerText, 2);
                    createCookie("MoneySubTotal", document.querySelector("#MoneySubTotal").innerText, 2);
                    return;
                }
            });
        }

        function IncCart(e) {
            let itemCart = [];
            if (getCookie("itemCart") != "")
                itemCart = JSON.parse(getCookie("itemCart"));

            let dataItem = parseInt(e.getAttribute("idCart"));
            itemCart.forEach(function(entry) {
                if (entry.data == dataItem) {
                    entry.count += 1;
                    createCookie("itemCart", JSON.stringify(itemCart), 2);
                    //tinh lai tong cong cho item
                    let price = e.parentElement.parentElement.parentElement.parentElement.childNodes[3].innerText;
                    let count = entry.count;
                    e.parentElement.parentElement.parentElement.parentElement.childNodes[7].innerText = count * price;
                    //tinh lai tong cong cho item
                    //tinh lai tong cong thanh toan
                    let currentMoney = document.querySelector("#MoneySubTotal").innerText;
                    document.querySelector("#MoneySubTotal").innerText = parseInt(currentMoney) + parseInt(price);
                    document.querySelector("#MoneyTotal").innerText = parseInt(currentMoney) + parseInt(price);

                    let moneyTotal = document.querySelector("#MoneyTotal").innerText;
                    if (getCookie("voucherCodePercent") != "")
                        document.querySelector("#MoneyTotal").innerText = parseInt(moneyTotal) - (moneyTotal * parseInt(getCookie("voucherCodePercent")) / 100);

                    createCookie("MoneyTotal", document.querySelector("#MoneyTotal").innerText, 2);
                    createCookie("MoneySubTotal", document.querySelector("#MoneySubTotal").innerText, 2);
                    return;
                }
            });
        }

        function removeItemCart(e) {
            let itemCart = [];
            if (getCookie("itemCart") != "")
                itemCart = JSON.parse(getCookie("itemCart"));
            let dataItem = parseInt(e.getAttribute("idCart"));
            itemCart.forEach(function(entry, index) {
                if (entry.data == dataItem) {
                    e.closest("tr").remove();
                    itemCart.splice(index, 1);
                    createCookie("itemCart", JSON.stringify(itemCart), 2);
                    location.reload();
                }
            });
        }
    </script>