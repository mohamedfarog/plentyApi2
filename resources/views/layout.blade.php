<!DOCTYPE html>
<html lang="en">

<head>
    <title>Plenty of Things</title>

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

    <!-- shortcode css -->
    <link rel="stylesheet" href="css/shortcode.css" defer>
    <link rel="stylesheet" href="css/shortcode.css" defer>
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" defer>
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js" defer></script>
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <script type="text/javascript" src="js/jquery.min.js"></script>
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

    @media only screen and (max-width: 600px) {

        .footer-widgets {
            padding: 0;
            margin: 20px;
        }

        .footer-widgets .row>div {
            margin-bottom: 0;
        }

    }
    </style>
</head>

<body class="relative">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>

    <main class="main-wrapper">

        <header class="nav-type-1">

            <!-- Fullscreen search -->
            <div class="search-wrap">
                <div class="search-inner">
                    <div class="search-cell">
                        <form method="get">
                            <div class="search-field-holder">
                                <input type="search" class="form-control main-search-input" placeholder="Search for">
                                <i class="ui-close search-close" id="search-close"></i>
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
                                        <a href="index.html">
                                            <img class="logo-dark" src="img/logo_dark.png" alt="logo"
                                                style="max-height:80%;">
                                        </a>
                                    </div>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Mobile cart -->
                                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                                    <div class="nav-cart-outer">
                                        <div class="nav-cart-inner">
                                            <a href="#" class="nav-cart-icon">
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
                                            <a href="/">Home</a>
                                        </li>

                                        <li class="">
                                            <a href="/delicacy">Delicacy</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a href="#">Beauty</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a href="#">Fashion</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a href="#">Featured</a>

                                        </li> <!-- end elements -->
                                        <li class="">
                                            <a href="#">Brands</a>

                                        </li> <!-- end elements -->

                                        <!-- Mobile search -->
                                        <li id="mobile-search" class="hidden-lg hidden-md">
                                            <form method="get" class="mobile-search">
                                                <input type="search" class="form-control" placeholder="Search...">
                                                <button type="submit" class="search-button">
                                                    <img src="img/nav/search.png" style="width:30px;height:30px">
                                                </button>
                                            </form>
                                        </li>

                                    </ul> <!-- end menu -->
                                </div> <!-- end collapse -->
                            </div> <!-- end col -->

                            <div class="flex-child flex-right nav-right hidden-sm hidden-xs" style="padding:0">
                                <ul>

                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger imgicon">
                                            <img class="imgicon" src="img/nav/search.png">
                                        </a>
                                    </li>
                                    <li class="nav-cart">
                                        <div class="nav-cart-outer">
                                            <div class="nav-cart-inner">
                                                <a href="#" class="nav-search search-trigger imgicon">
                                                    <img class="imgicon" src="img/nav/bag.png">

                                                </a>
                                            </div>
                                        </div>
                                        <!-- <div class="nav-cart-container">
                                            <div class="nav-cart-items">

                                                <div class="nav-cart-item clearfix">
                                                    <div class="nav-cart-img">
                                                        <a href="#">
                                                            <img src="img/shop/shop_item_1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="nav-cart-title">
                                                        <a href="#">
                                                            Ladies Bag
                                                        </a>
                                                        <div class="nav-cart-price">
                                                            <span>1 x</span>
                                                            <span>1250.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="nav-cart-remove">
                                                        <a href="#" class="remove"><i class="ui-close"></i></a>
                                                    </div>
                                                </div>

                                                <div class="nav-cart-item clearfix">
                                                    <div class="nav-cart-img">
                                                        <a href="#">
                                                            <img src="img/shop/shop_item_2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="nav-cart-title">
                                                        <a href="#">
                                                            Sequin Suit longer title
                                                        </a>
                                                        <div class="nav-cart-price">
                                                            <span>1 x</span>
                                                            <span>1250.00</span>
                                                        </div>
                                                    </div>
                                                    <div class="nav-cart-remove">
                                                        <a href="#" class="remove"><i class="ui-close"></i></a>
                                                    </div>
                                                </div>

                                            </div>  
                                            <div class="nav-cart-summary">
                                                <span>Cart Subtotal</span>
                                                <span class="total-price">$1799.00</span>
                                            </div>

                                            <div class="nav-cart-actions mt-20">
                                                <a href="shop-cart.html" class="btn btn-md btn-dark"><span>View
                                                        Cart</span></a>
                                                <a href="shop-checkout.html"
                                                    class="btn btn-md btn-color mt-10"><span>Proceed to
                                                        Checkout</span></a>
                                            </div>
                                        </div> -->
                                    </li>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger imgicon">
                                            <img class="imgicon" src="img/nav/fav.png">
                                        </a>
                                    </li>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger imgicon">
                                            <img class="imgicon" src="img/nav/user.png">
                                        </a>
                                    </li>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger imgicon">
                                            <img class="imgicon" src="img/nav/lang.png">

                                        </a>
                                    </li>
                                    <li class="dropdown nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="menufont">{{ __('website.currentlanguage') }}</a>

                                        <ul class="dropdown-menu">

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
    <footer class="footer footer-type-1">
        <div class="container" style="width:95%">
            <div class="footer-widgets">
                <div class="row">

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="widget footer-about-us" style="text-align:center;">
                            <img src="img/logo_dark.png" alt="" class="logo" style="height:150px;max-height:100%;">

                            <div class="footer-socials">
                                <div class="social-icons nobase" style="padding:0 20px;">
                                    <a href="#"><img class="socialfooter" src="img/social/whatsapp.png"></a>
                                    <a href="#"><img class="socialfooter" src="img/social/facebook.png"></a>
                                    <a href="#"><img class="socialfooter" src="img/social/instagram.png"></a>
                                    <a href="#"><img class="socialfooter" src="img/social/twitter.png"></a>

                                </div>
                            </div>
                            <p class="" style="margin-top: 10px;margin-bottom:0;line-height: 20px;">Tel: +966 50 123
                                3344</p>
                            <p class="mb-30" style="margin-top: 0;line-height: 20px;">Email: info@plentyofthings.com</p>
                        </div>
                    </div> <!-- end about us -->

                    <div class="col-md-2 col-sm-6 col-xs-6" style="padding-top:5%;">
                        <div class="widget footer-links">
                            <h5 class="widget-title bottom-line left-align grey bottomtitleheader">Help & Information
                            </h5>
                            <ul class="list-no-dividers">
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Track Order</a></li>
                                <li><a href="#">Delivery & Returns</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6" style="padding-top:5%;">
                        <div class="widget footer-links">
                            <h5 class="widget-title bottom-line left-align grey bottomtitleheader">About Plenty</h5>
                            <ul class="list-no-dividers">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Corporate Responsibility</a></li>
                                <li><a href="#">Investors Site</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6" style="padding-top:5%;">
                        <div class="widget footer-links" style="">
                            <h5 class="widget-title bottom-line left-align grey bottomtitleheader">More From Plenty</h5>
                            <ul class="list-no-dividers">
                                <li><a href="#">Plenty Mobile App</a></li>
                                <li><a href="#">Plenty Marketplace</a></li>
                                <li><a href="#">Plenty Loyalty Points</a></li>
                                <li><a href="#">Rewards</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="widget footer-links">
                            <img class="" src="img/bottom/app.png"
                                style="width:80%;display:block;margin:auto;margin-bottom:20px">
                        </div>
                        <div class="row" style="justify-content:space-between;display:flex;">
                            <img class="" src="img/bottom/googleplay.png" style="width:40%;float:left">

                            <img class="" src="img/bottom/appleapp.png" style="width:40%;float:left">
                        </div>
                    </div>


                </div>
            </div>
        </div> <!-- end container -->


    </footer> <!-- end footer -->

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
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
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
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
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
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }

        ]
    });
    </script>
</body>

</html>