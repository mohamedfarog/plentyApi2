<!DOCTYPE html>
<html lang="en">

<head>
    <title>Plenty of Things</title>

    <!-- for minimizing styling issues-->
    <base href="/public">
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700'
        rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'> -->
    <!-- Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" defer />
    <link rel="stylesheet" href="css/magnific-popup.css" defer />
    <link rel="stylesheet" href="css/font-icons.css" defer />
    <link rel="stylesheet" href="css/sliders.css" defer />
    <link rel="stylesheet" href="css/style.css" defer />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base_url" content="https://plentyapp.mvp-apps.ae/" />
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.css" defer>
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" defer>
    <!-- meanmenu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css" defer>
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="lib/css/nivo-slider.css" defer>
    <link rel="stylesheet" href="lib/css/preview.css" defer>
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="css/slick.css" defer>
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css" defer>
    <!-- lightbox css -->
    <link rel="stylesheet" href="css/lightbox.min.css" defer>
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href="css/material-design-iconic-font.css" defer>
    <!-- All common css of theme -->
    <link rel="stylesheet" href="css/default.css" defer>
    <link href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <!-- shortcode css -->
    <link rel="stylesheet" href="css/shortcode.css" defer>
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" defer>
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js" defer></script>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <style type="text/css">
        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: 1;
        }

        .slick-active {
            opacity: 1;
        }

        .slick-current {
            opacity: 1;
        }

        .slick-track {
            margin: 20px 0;
        }

        .menufont {
            font-weight: 100;
        }

        .bottomtitleheader {
            text-transform: uppercase !important;
            font-size: 12px !important;
            font-weight: 500 !important;
            margin-bottom: 0 !important;

        }

        p,
        .navigation.sticky .navbar-nav>li>a {
            color: #001b71;
        }

        .socialfooter {
            width: 25px;
        }

        .bottomtitleheader::after {
            margin: 10px 0 !important;
            border-color: #001b71 !important;
            width: 90% !important;
        }

        ul.list-no-dividers>li>a {
            text-transform: uppercase;
            color: #001b71 !important;
            font-size: 12px !important;
        }

        .nav-right li {
            padding-right: 5px;
        }

        .dropdownanch:hover {
            color: black !important;
        }

        .mainanc:hover {
            color: #001b71 !important;
        }

        .viewcartbtn {
            background: #001b71 !important;
            color: white !important;
        }

        .nav-right li {
            height: 50px;
        }

        .btn.btn-color::before {
            background-color: black;
        }

        button.btn:hover {
            background-color: #001b71;
            color: #fff;
        }

        @media only screen and (max-width: 600px) {

            .footer-widgets {
                padding: 0;
                margin: 20px;
            }

            .footer-widgets .row>div {
                margin-bottom: 0;
            }

        }

        #user-menu-nav {
            background-color: white;
        }
    </style>
</head>

<body class="relative">
    <div class="alert alert-dismissible" style="display:none;position: -webkit-sticky;  
  position: sticky;
  top: 0;z-index:99999">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <span id="alert_message_text"></span>
        <a href="/cart" class="btn" style="float: right;background:#001b71;padding:5px;margin-right:5px">Go to Bag </a>
    </div>
    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader" style="height:100px;width:100px;">
            <img class="logo-dark" src="img/logo_dark.png" alt="Plenty" style="width: 100px;height: 100px;max-height: 100px;">
        </div>
    </div>

    <main class="main-wrapper">

        <header class="nav-type-1">

            <!-- Fullscreen search -->
            <div class="search-wrap">
                <div class="search-inner">
                    <div class="search-cell">
                        <form onsubmit="search(event)" id="search-form-nav">
                            <div class="search-field-holder">
                                <input type="search" id="search-item" name="search-item" class="form-control main-search-input" placeholder="Search for">
                                <i class="ui-close search-close" id="search-close"></i>
                                <div style="padding:20px;">
                                    <input type="submit" class="btn btn-lg btn-dark" value="Go" style="font-weight:500;font-size:14px;display: block;margin : 0 auto;padding:0 100px;">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end fullscreen search -->



            <nav class="navbar navbar-static-top">
                <div class="navigation" id="sticky-nav">
                    <div class="container relative">

                        <div class="row flex-parent">

                            <div class="navbar-header flex-child flex-right">
                                <!-- Logo -->
                                <div class="logo-container">
                                    <div class="logo-wrap">
                                        <a href="/">
                                            <img class="logo-dark" src="img/logo_dark.png" alt="logo" style="max-height:80%;">
                                        </a>
                                    </div>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Mobile cart -->
                                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                                    <div class="nav-cart-outer">
                                        <div class="nav-cart-inner">
                                            <a href="/cart" class="nav-cart-icon">
                                                <span class="nav-cart-badge">2</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end navbar-header -->

                            <div class="nav-wrap flex-child" style="flex: 3 0 0;">
                                <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                                    <ul class="nav navbar-nav">

                                        <li class="">
                                            <a class="mainanc" href="/">Home</a>
                                        </li>

                                        <li class="">
                                            <a class="mainanc" href="/delicacy/1">Delicacy</a>

                                        </li> <!-- end elements -->


                                        <li class="">
                                            <a class="mainanc" href="/beauty">Beauty</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a class="mainanc" href="/fashion">Fashion</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a class="mainanc" href="/featured">Featured</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a class="mainanc" href="/brands">Brands</a>

                                        </li> <!-- end elements -->

                                        <li class="hidden-lg hidden-md"><a href="/profile">Profile</a></li><br>
                                        <li class="hidden-lg hidden-md"><a href="/trackorder">Track Order</a></li><br>
                                        <li class="hidden-lg hidden-md"><a href="/userlevel">User Level</a></li><br>
                                        <li class="hidden-lg hidden-md"><a href="/login">Logout</a></li>

                                        <li class="hidden-lg hidden-md"><a href="/login">Login</a></li>


                                        <!-- Mobile search -->

                                    </ul> <!-- end menu -->
                                </div> <!-- end collapse -->
                            </div> <!-- end col -->

                            <div class="flex-child flex-right nav-right hidden-sm hidden-xs" style="padding:0">
                                <ul>

                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="/delicacy" class="nav-search search-trigger imgicon">
                                            <img class="imgicon" src="img/nav/search.png">
                                        </a>
                                    </li>
                                    <li class="nav-cart">
                                        <a href="/cart" class="" style="font-size: 14px;">
                                            <div class="nav-cart-outer">
                                                <div class="nav-cart-inner">

                                                    <img src="img/nav/bag.png" alt="" style="width:20px;height:20px;">
                                                    <span id="nav-cart-size"></span>


                                                </div>
                                            </div>
                                        </a>
                                        <div class="nav-cart-container">

                                            <div id="nav-cart-products">

                                            </div>


                                            <div class="nav-cart-summary" style="margin-top:20px;">
                                                <span>Bag Subtotal</span>
                                                <span class="total-price" id="nav-cart-total" style="font-size:16px;font-family:'Avenir Bold'"> </span>
                                            </div>

                                            <div class="nav-cart-actions mt-20">
                                                <a href="/cart" class="btn btn-md viewcartbtn"><span style="color:white;">View Cart</span></a>
                                                <a onclick="proceedCheckout()" class="btn btn-md btn-color mt-10"><span style="color:white;">Proceed to Checkout</span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="/favourites" class="nav-search  imgicon">
                                            <img class="imgicon" src="img/nav/fav.png">
                                        </a>
                                    </li>
                                    <li class="dropdown nav-search-wrap style-2 hidden-sm hidden-xs">

                                        <a href="/profile" class="nav-search  imgicon">
                                            <img class="imgicon" src="img/nav/user.png">
                                        </a>

                                        <ul class="dropdown-menu dwdw" id="user-menu-nav" style="background:white">
                                            <div class="row">

                                            </div>
                                            <li>
                                                <a class="dropdownanch" href="/profile">
                                                    <div class="row">

                                                        <div class="hidden-sm hidden-xs" style="width:100%;float:left;margin:auto">


                                                            <p>Hello, <span id="nav-username"></span></p>
                                                            </p>


                                                        </div>
                                                    </div>
                                                </a>
                                            </li><br>
                                            <li><a class="dropdownanch" href="/profile">Profile</a></li><br>
                                            <li><a class="dropdownanch" href="/trackorder">Track Order</a></li><br>
                                            <li><a class="dropdownanch" href="/userlevel">User Level</a></li><br>
                                            <li><a class="dropdownanch" onclick="logoutUser()">Logout</a></li>
                                        </ul>


                                    </li>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="/" class="nav-search  imgicon">
                                            <img class="imgicon" src="img/nav/lang.png">

                                        </a>
                                    </li>
                                    <li class="dropdown nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="/" class="menufont">: {{ __('website.currentlanguage') }}</a>

                                        <ul class="dropdown-menu" style="background:white">

                                            <li><a href="/lang">{{ __('website.changetolanguage') }}</a></li>
                                        </ul>
                                    <li class="">
                                        <i class="fa fa-angle-down dropdown-trigger"></i>
                                    </li>
                                    </li>

                                </ul>
                            </div>

                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div> <!-- end navigation -->
            </nav> <!-- end navbar -->

        </header>




        <div class="content-wrapper oh">

            @yield('content')

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->



    <!-- Footer Type-1 -->

    <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>


    <script type="text/javascript" src="js/bootstrap.min.js" defer></script>
    <script type="text/javascript" src="js/plugins.js" defer></script>
    <script type="text/javascript" src="js/scripts.js" defer></script>

    <!-- bootstrap js -->
    <!-- jquery.meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- slick.min js -->
    <script src="js/slick.min.js"></script>
    <!-- jquery.treeview js -->
    <script src="js/jquery.treeview.js"></script>
    <!-- lightbox.min js -->
    <script src="js/lightbox.min.js"></script>
    <!-- jquery-ui js -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="lib/js/jquery.nivo.slider.js"></script>
    <script src="lib/home.js"></script>
    <!-- jquery.nicescroll.min js -->
    <script src="js/jquery.nicescroll.min.js"></script>
    <!-- countdon.min js -->
    <script src="js/countdon.min.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>


    <script>
        $(".regular").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }

            ]
        });

        $(".brandsslider").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }

            ]
        });


        $(".tryprodslider").slick({
            dots: true,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
        });




        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/;SameSite=Lax";
        }




        /**
         * Cart Manager start for local storage
         */

        //cart
        function Cart() {
            this.cart_items = [];
            this.coupon = '';
            this.coupon_value = 0;
            this.loyality_point = 0;
            this.order_total = 0;
            this.plenty_pay = 0;
            this.is_cash_on_delivery = true;

        }
        Cart.prototype.subTotal = function() {
            if (this.cart_items.length > 0) {
                let total = 0;
                this.cart_items.forEach(item => {
                    total = total + (item.price * item.quantity)
                });
                return total;

            } else {
                return 0;
            }

        }
        Cart.prototype.orderTotal = function() {
            if (this.cart_items.length > 0) {
                let total = 0;
                this.cart_items.forEach(item => {
                    total = total + (item.price * item.quantity)
                });
                return total;
            } else {
                return 0;
            }

        }

        Cart.prototype.addItem = function(cartItem) {

            this.cart_items.push(cartItem)
        }

        // For removing cart item
        Cart.prototype.removeItem = function(id) {
            pro_id = id.split("-")[0]
            size_id = id.split("-")[1]
            timeslot_id = id.split("-")[2]
            let i = this.cart_items.length;
            while (i--) {
                if (this.cart_items[i] && this.cart_items[i]['id'] === pro_id) {
                    if (size_id > 0) {
                        if (this.cart_items[i]['size_id'] === size_id) {
                            this.cart_items.splice(i, 1);
                        }
                    } else if (timeslot_id > 0) {
                        if (this.cart_items[i]['timeslot_id'] === timeslot_id) {
                            this.cart_items.splice(i, 1);
                        }
                    } else {
                        this.cart_items.splice(i, 1);
                    }

                }
            }
            return this.cart_items;
        }

        Cart.prototype.getCartItems = function() {
            return this.cart_items
        }

        // Cart item 
        // in case of delicay size referring to product variant
        // in case of fashion it make sense
        // In product variant case the price will be variant price
        // category -> delicacy, beauty, fashion
        // date and time for only booking
        function CartItem(item) {
            this.id = item.id;
            this.price = item.price;
            this.shop_id = item.shop_id || '';
            this.name = item.name;
            this.is_product_variant = item.is_product_variant || false;
            this.size = item.size || null;
            this.size_id = item.size_id || null;
            this.color = item.color || null;
            this.color_id = item.color_id || null;
            this.quantity = item.quantity || null;
            this.date = item.date || null;
            this.time = item.time || null;
            this.timeslot_id = item.timeslot_id || null;
            this.date = item.date || null;
            this.category = item.category || null;
            this.image_url = item.image_url;
            this.stock = item.stock;
            this.total_price = function() {
                return this.quantity * this.price;
            }
        }

        CartItem.prototype.addQuantity = function() {
            this.quantity = parseInt(this.quantity) + 1
        }
        CartItem.prototype.substractQuantity = function() {
            this.quantity = parseInt(this.quantity) - 1
        }
        /**
         * Cart manager end here
         */

        function JsonCartSerializer(cart) {
            let cart_items = []
            cart.cart_items.forEach(element => {
                let item = {}
                item['id'] = element.id
                item['price'] = element.price
                item['name'] = element.name
                item['size'] = element.size
                item['size_id'] = element.size_id
                item['is_product_variant'] = element.is_product_variant
                item['color'] = element.color
                item['quantity'] = element.quantity
                item['time'] = element.time
                item['date'] = element.date
                item['timeslot_id'] = element.timeslot_id
                item['category'] = element.category
                item['image_url'] = element.image_url
                item['stock'] = element.stock
                item['shop_id'] = element.shop_id
                cart_items.push(item)
            });
            return {
                "cart_subtotal": cart.cart_subtotal,
                "order_total": cart.order_total,
                "cart_items": cart_items,
                "coupon": cart.coupon,
                "coupon_value": cart.coupon_value,
                "loyality_point": cart.loyality_point,
                "plenty_pay": cart.plenty_pay,
                "is_cash_on_delivery": cart.is_cash_on_delivery
            }

        }

        function CartSerializer(data) {
            let cart = new Cart()
            cart.cart_subtotal = data.cart_subtotal;
            cart.order_total = data.order_total;
            cart.coupon = data.coupon;
            cart.coupon_value = data.coupon_value;
            cart.loyality_point = data.loyality_point;
            cart.order_total = data.order_total;
            cart.plenty_pay = data.plenty_pay;
            cart.is_cash_on_delivery = data.is_cash_on_delivery || true;
            if (data.cart_items.length > 0) {
                data.cart_items.forEach(element => {
                    let item = {
                        id: element.id,
                        shop_id: element.shop_id,
                        price: element.price,
                        name: element.name,
                        is_product_variant: element.is_product_variant,
                        size: element.size || null,
                        size_id: element.size_id || null,
                        color: element.color || null,
                        color_id: element.color_id || null,
                        quantity: element.quantity || null,
                        date: element.date || null,
                        time: element.time || null,
                        timeslot_id: element.timeslot_id || null,
                        image_url: element.image_url || null,
                        stock: element.stock || null,
                        category: element.category || null,
                    }

                    cart.addItem(new CartItem(item))
                });
            }

            return cart;
        }

        // cart manager end here
        $(".trackorderslider").slick({
            dots: false,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: false,
            arrows: true,
            autoplaySpeed: 10000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }

            ]
        });

        //storing data
        function storeCartLocal(cart) {
            localStorage.setItem('cart', JSON.stringify(cart))
        }
        // getting data
        function getCartLocal() {
            if (JSON.parse(localStorage.getItem('cart'))) {
                return JSON.parse(localStorage.getItem('cart'))
            } else {
                return {
                    cart_subtotal: 0,
                    order_total: 0,
                    cart_items: []
                }
            }

        }

        $(document).ready(function() {
            var base_url = $('meta[name=base_url]').attr('content');
            let cart = new Cart()
            $.ajax({
                type: 'GET',
                url: base_url + 'shop-category',
                dataType: 'JSON',
                success: function(data) {
                    localStorage.setItem("shop_category", JSON.stringify(data.shop_category));
                }
            });
            renderNavCart()
            initiateTimeOut()
        });

        // for updating input fields by id
        function updateInputField(id, value) {
            document.getElementById(id).value = value;
        }

        function renderNavCart() {
            var cart = CartSerializer(getCartLocal())
            var base_url = $('meta[name=base_url]').attr('content');
            let template = ''
            if (cart.cart_items.length > 0) {
                cart.cart_items.forEach(item => {
                    template = template +
                        "<div class='nav-cart-items' style='margin-top:10px;'>" +
                        "<div class='nav-cart-item clearfix'>" +
                        "<div class='nav-cart-img'>" +
                        "<a href='" + base_url + "product/" + item.id + "'>" +
                        "<img src='" + base_url + "storage/products/" + item.image_url + "' alt=''>" +
                        "</a>" +
                        "</div>" +
                        "<div class='nav-cart-title'>" +
                        "<a href='" + base_url + "product/" + item.id + "'>" + item.name + "</a>" +
                        "<div class='nav-cart-price'>" +
                        "<span>(" + item.quantity + " x </span>" +
                        "<span style='font-weight:900;color:black'> " + item.price + " SAR</span><span>)</span>" +
                        "</div>" +
                        "</div>" +
                        "<div class='nav-cart-remove'>" +
                        "<a onclick = 'removeNavCartItem(" + item.id + "," + item.size_id + "," + item.timeslot_id + ")' class='remove'><i class='ui-close'></i></a>" +
                        "</div>" +
                        "</div>" +
                        "</div>"

                })


            }
            $('#nav-cart-size').html(cart.cart_items.length)
            $('#nav-cart-products').html(template)
            $('#nav-cart-total').html(cart.subTotal() + ' SAR')
        }

        function removeNavCartItem(prd_id, size_id, timeslot_id) {
            var cart = CartSerializer(getCartLocal())
            let id = prd_id + "-" + size_id + "-" + timeslot_id
            cart.removeItem(id)
            storeCartLocal(JsonCartSerializer(cart));
            renderNavCart();
            var currentLocation = window.location.pathname;
            if (currentLocation === '/cart' || currentLocation === '/checkout') {
                location.reload();
            }
        }



        // favourite item start from here

        function Favourite() {
            this.favourite_items = [];
        }
        Favourite.prototype.addItem = function(FavouriteItem) {
            let i = this.favourite_items.length;
            let flag = true;
            while (i--) {
                if (this.favourite_items[i] && this.favourite_items[i]['id'] === FavouriteItem.id) {
                    flag = false;
                    break;
                }
            }
            if (flag) {
                this.favourite_items.push(FavouriteItem)
                showAlertSuccess(`${FavouriteItem.name_en} added to favorites`)
            } else {
                showAlertError(`${FavouriteItem.name_en} already added to favorites`)
            }


        }

        Favourite.prototype.removeItem = function(pro_id) {
            let i = this.favourite_items.length;
            while (i--) {
                if (this.favourite_items[i] && this.favourite_items[i]['id'] === pro_id) {
                    showAlertSuccess(`${this.favourite_items[i].name_en} removed from favorites !`)
                    this.favourite_items.splice(i, 1);
                    break;
                }
            }
            return this.favourite_items;
        }



        function FavouriteItem(item) {
            this.id = item.id;
            this.price = item.price;
            this.name_en = item.name_en;
            this.image = item.image;
            this.shop_id = item.shop_id;

        }

        function MakeFavourite(ele, id) {
            if ($(ele).children().attr('id-selected') === "1") {
                let favourites = FavouriteSerializer(getFavouritesLocal())
                favourites.removeItem(id);
                storeFavouritesLocal(favourites);
                $(ele).children().attr('id-selected', "0");
                $(ele).children().attr('src', "img/nav/fav.png");
            } else {
                let product = getFavouriteProductInfo(id);
                $(ele).children().attr('src', "img/nav/fav2.png");
                $(ele).children().attr('id-selected', "1");
            }

        }

        function getFavouriteProductInfo(id) {
            var base_url = $('meta[name=base_url]').attr('content');
            $.ajax({
                type: 'GET',
                url: base_url + 'favourite-product/' + id,
                dataType: 'JSON',
                success: function(data) {
                    if (data.Response) {
                        let favourite_item = new FavouriteItem(data.product)
                        let favourites = FavouriteSerializer(getFavouritesLocal())
                        favourites.addItem(favourite_item);
                        storeFavouritesLocal(favourites)


                    } else {
                        //
                    }

                },
                error: function(err) {
                    console.log('Error!', err)
                }

            });
        }

        //storing data
        function storeFavouritesLocal(favourites) {
            localStorage.setItem('favourites', JSON.stringify(favourites))
        }

        // getting data
        function getFavouritesLocal() {
            if (JSON.parse(localStorage.getItem('favourites'))) {
                return JSON.parse(localStorage.getItem('favourites'))
            } else {
                return {
                    favourite_items: []
                }
            }

        }

        function FavouriteSerializer(data) {
            let favourites = new Favourite()

            if (data.favourite_items.length > 0) {
                data.favourite_items.forEach(element => {
                    let item = {
                        id: element.id,
                        price: element.price,
                        name_en: element.name_en,
                        image: element.image || null,
                    }

                    favourites.addItem(new FavouriteItem(item))
                });
            }
            return favourites;
        }


        // Favourite end here

        // getting data
        function getUserDetails() {

            if (getCookie('user')) {
                return JSON.parse(getCookie('user'))
            } else {
                return null;
            }

        }

        $(document).ready(function() {
            if (getUserDetails()) {
                userIsAuthenticated();
            } else {
                userIsNotAuthenticated();
            }
        });


        function userIsAuthenticated() {
            document.getElementById('user-menu-nav').style = " display: block;";
            document.getElementById('nav-username').innerHTML = getUserDetails().name;

        }

        function userIsNotAuthenticated() {
            document.getElementById('user-menu-nav').style = " display: none;";
        }

        function getUser() {
            const bearer_token = getCookie('bearer_token');
            var base_url = $('meta[name=base_url]').attr('content');
            if (bearer_token) {
                url = base_url + 'user'
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    headers: {
                        "Authorization": 'Bearer ' + bearer_token
                    },

                    success: function(data) {
                        if (data.Response) {

                        }

                    },
                    error: function(err) {
                        console.log('Error!', err)
                    }

                });
            } else {
                return null;
            }

        }

        function showAlertSuccess(msg = 'Added') {
            document.getElementById("alert_message_text").innerHTML = ''
            document.getElementById("alert_message_text").innerHTML = msg;
            $(".alert").removeClass('alert-danger')
            $(".alert").addClass('alert-success')
            $(".alert").show()
            initiateTimeOut()
        }

        function showAlertError(msg = 'Added') {
            document.getElementById("alert_message_text").innerHTML = ''
            document.getElementById("alert_message_text").innerHTML = msg;
            $(".alert").removeClass('alert-success')
            $(".alert").addClass('alert-danger')
            $(".alert").show()
            initiateTimeOut()
        }

        function initiateTimeOut(time = 5000) {
            setTimeout(function() {
                $(".alert").hide();
            }, time);
        }

        function search(e) {
            e.preventDefault();
            var base_url = $('meta[name=base_url]').attr('content');
            const form = new FormData(document.getElementById('search-form-nav'))
            window.location.replace(base_url + 'search/' + form.get('search-item'));
        }

        function logoutUser() {
            eraseCookie('bearer_token');
            eraseCookie('user');
            var base_url = $('meta[name=base_url]').attr('content');
            window.location.replace(base_url + 'login');
        }

        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }

        function proceedCheckout() {
            var cart = CartSerializer(getCartLocal())
            if (cart.cart_items.length > 0) {
                window.location.href = "/checkout";
            } else {
                showAlertError(`Cart is empty!`);
            }

        }

        function getProductId() {
            var favourite_item = getFavouritesLocal()

            if (favourite_item.favourite_items.length > 0) {

                var ids = favourite_item.favourite_items.map(item => {
                    return item.id;
                })
            }
            return ids;
        }
    </script>

</body>

</html>