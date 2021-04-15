@extends('../layout')
@section('content')

<!-- Hero Slider -->
<section class="hero-wrap text-center relative">
    <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated">

        <div class="hero-slide overlay" style="background-image:url(img/hero/1.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="#" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/2.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="#" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/3.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="#" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/4.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="#" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/5.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="#" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section> <!-- end hero slider -->

<!-- Promo Banners -->
<section class="section-wrap promo-banners pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">{{ __('website.welcome') }}</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner">
                <a href="#">
                    <div style="">
                    </div>
                    <video playsinline="" autoplay="" muted="" loop="" style="border-radius: 1px;object-fit:cover;overflow:hidden;width:100%;height:100%;">
                        <source src="img/category/dine.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <div class="overlay categoverlay"></div>
                    <div class="promo-inner valign">
                        <h2>DELICACY</h2>

                    </div>
                </a>
            </div>

            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner">

                <a href="#">
                    <video playsinline="" autoplay="" muted="" loop="" style="border-radius: 1px;object-fit:cover;overflow:hidden;width:100%;height:100%;">
                        <source src="img/category/beauty.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="overlay categoverlay"></div>
                    <div class="promo-inner valign">
                        <h2>BEAUTY</h2>
                    </div>
                </a>
            </div>

            <div class="col-xs-4 col-xxs-12 mb-30 promo-banner">
                <a href="#">
                    <video playsinline="" autoplay="" muted="" loop="" style="border-radius: 1px;object-fit:cover;overflow:hidden;width:100%;height:100%;">
                        <source src="img/category/fashion.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="overlay categoverlay"></div>
                    <div class="promo-inner valign">
                        <h2>FASHION</h2>

                    </div>
                </a>
            </div>

        </div>
    </div>
</section> <!-- end promo banners -->


<!-- Trendy Products -->
<section class="section-wrap-sm new-arrivals ">
    <div class="purchase-online-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Featured Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- Nav tabs -->

                </div>
                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="-">
                        <div class="tab-pane active" id="new-arrivals">
                            <div class="row">
                                <!-- Single-product start -->

                                <!-- Single-product end -->
                                <!-- Single-product start -->


                                <!-- Single-product end -->

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end trendy products -->

<section class="regular slider" style="width:90%;text-align:center;margin:auto">
    <div class="single-product  col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="#">Event Hairstyle Package</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR 60.00</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft"><img class="featicons" src="img/nav/fav.png">
                </span>
                <span class="pro-rating floatright">
                    <img class="featicons" src="img/nav/bag.png">
                </span>
            </div>
        </div>
    </div>

    <div class="single-product col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="#">Event Hairstyle Package</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR 60.00</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft"><img class="featicons" src="img/nav/fav.png">
                </span>
                <span class="pro-rating floatright">
                    <img class="featicons" src="img/nav/bag.png">
                </span>
            </div>
        </div>
    </div>

    <div class="single-product col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="#">Event Hairstyle Package</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR 60.00</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft"><img class="featicons" src="img/nav/fav.png">
                </span>
                <span class="pro-rating floatright">
                    <img class="featicons" src="img/nav/bag.png">
                </span>
            </div>
        </div>
    </div>

    <div class="single-product col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="#">Event Hairstyle Package</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR 60.00</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft"><img class="featicons" src="img/nav/fav.png">
                </span>
                <span class="pro-rating floatright">
                    <img class="featicons" src="img/nav/bag.png">
                </span>
            </div>
        </div>
    </div>

    <div class="single-product col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="#">Event Hairstyle Package</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR 60.00</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft"><img class="featicons" src="img/nav/fav.png">
                </span>
                <span class="pro-rating floatright">
                    <img class="featicons" src="img/nav/bag.png">
                </span>
            </div>
        </div>
    </div>

</section>

<div class="purchase-online-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">Brands</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Nav tabs -->

            </div>
            <div class="col-lg-12">
                <!-- Tab panes -->
                <div class="-">
                    <div class="tab-pane active" id="new-arrivals">
                        <div class="row">
                            <!-- Single-product start -->

                            <!-- Single-product end -->
                            <!-- Single-product start -->


                            <!-- Single-product end -->

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<section class="brandsslider slider" style="width:90%;text-align:center;margin:auto">

    <div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
    </div>

    <div class="brand-slide    col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
    </div>

    <div class="brand-slide   col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html">
                <img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
    </div>

    <div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
    </div>

    <div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
        </div>
    </div>

</section>

<section style="height:50px;">
</section>





<script>
    $(document).ready(function() {
        $(".promo-inner").hover(function() {
            $(this).siblings(".categoverlay").css("opacity", "0.2");
        }, function() {
            $(this).siblings(".categoverlay").css("opacity", "0.6");
        });
        $(".categoverlay").hover(function() {
            $(this).css("opacity", "0.2");
        }, function() {
            $(this).css("opacity", "0.6");
        });

        $('.featlineicons').css({
            'visibility': 'hidden'
        });
        $(".single-product").hover(function() {
            $(this).children(".product-info").children(".featlineicons").css({
                'visibility': 'visible'
            });
        }, function() {
            $(this).children(".product-info").children(".featlineicons").css({
                'visibility': 'hidden'
            });
        });


        $(".brand-slide").hover(function() {
            $(this).css({
                'transform': 'scale(1.2)'
            });
        }, function() {
            $(this).css({
                'transform': 'scale(1)'
            });
        });
    });

</script>
<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection

