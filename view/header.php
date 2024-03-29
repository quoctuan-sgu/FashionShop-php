<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <title>Product</title>
    <script>
        // Lấy đường dẫn hiện tại
        var currentLocation = window.location.pathname;

        // Thay đổi nội dung title
        if (currentLocation.includes("index.php")) {
            document.title = "Trang chủ";
        } else if (currentLocation.includes("about.php")) {
            document.title = "About";
        } else if (currentLocation.includes("blog.php")) {
            document.title = "Blog";
        } else if (currentLocation.includes("cart.php")) {
            document.title = "Giỏ hàng";
        } else if (currentLocation.includes("contact.php")) {
            document.title = "Contact";
        } else if (currentLocation.includes("product-detail.php")) {
            document.title = "Chi tiết";
        } else if (currentLocation.includes("product.php")) {
            document.title = "Sản phẩm";
        } else if (currentLocation.includes("signin.php")) {
            document.title = "Đăng nhập";
        } else if (currentLocation.includes("signup.php")) {
            document.title = "Đăng ký";
        }
    </script>
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping cho đơn hàng trên 500.000đ
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="index.php?ac=login" class="flex-c-m trans-04 p-lr-25">Đăng nhập</a>

                        <a href="index.php?ac=order" class="flex-c-m trans-04 p-lr-25">Đơn hàng</a>
                    </div>
                </div>
            </div>

            <!-- Navbar -->
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>

                            <li>
                                <a href="index.php?ac=cart">Cart</a>
                            </li>

                            <li class="label1" data-label1="hot">
                                <a href="index.php?ac=product">Shop</a>
                            </li>

                            <li>
                                <a href="index.php?ac=blog">Blog</a>
                            </li>

                            <li>
                                <a href="index.php?ac=about">About</a>
                            </li>

                            <li>
                                <a href="index.php?ac=contact">Contact</a>
                            </li>
                        </ul>

                        <script>
                            var currentLocation = window.location.search;

                            // Active - Menu desktop
                            document.querySelectorAll('.main-menu li a').forEach(function(item) {
                                var href = item.getAttribute('href');
                                var urlObject = new URL(href, window.location.href);
                                var queryPart = urlObject.search;

                                if (currentLocation === queryPart) {
                                    item.parentElement.classList.add('active-menu');
                                }
                            });

                            // Active - Header
                            var wrap_menu_desktop = document.querySelector('.wrap-menu-desktop');
                            var header = document.querySelector('header');

                            if (currentLocation === "?ac=product" || currentLocation === "?ac=cart" || currentLocation === "?ac=product-detail") {
                                header.classList.add('header-v4');
                                wrap_menu_desktop.classList.add('how-shadow1');
                            }
                        </script>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="99">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="../index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li>
                    <div class="left-top-bar">
                        Free shipping cho đơn hàng trên 500.000đ
                    </div>
                </li>

                <li>
                    <div class="right-top-bar flex-w h-full">
                        <a href="index.php?ac=login" class="flex-c-m p-lr-10 trans-04">
                            Đăng nhập
                        </a>

                        <a href="index.php?ac=order" class="flex-c-m p-lr-10 trans-04">
                            Đơn hàng
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="index.php">Home</a>
                </li>

                <li>
                    <a href="product.php" class="label1 rs1" data-label1="hot">Shop</a>
                </li>

                <li>
                    <a href="shoping-cart.php">Cart</a>
                </li>

                <li>
                    <a href="blog.php">Blog</a>
                </li>

                <li>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </header>