@extends('layout')
@section('content')
<style>
    .frame {
        width: 250px;
        height: 250px;
        vertical-align: middle;
        text-align: center;
        display: table-cell;
    }

    .imgz {
        max-width: 100%;
        max-height: 100%;
        display: block;
        margin: 0 auto;
    }

    .ssproduct {
        margin: 0 5px;
    }

    .featicons {
        width: 25px !important;
    }

    .nwtr {
        font-family: 'Avenir Bold'
    }

    .nwa {
        font-weight: 100;
    }

    .contm {
        width: 1000px;
        text-align: center;
        margin: auto;
    }

    @media only screen and (max-width: 600px) {
        .contm {
            width: 90%;
            text-align: center;
            margin: auto;
        }

        .cccategory {
            width: 100%;
        }

        .pm-cat-item {
            padding-left: 0;
            padding-right: 5px;
        }
    }

    .panel-body {
        padding: 0px;
    }

    .panel:hover {
        cursor: pointer;
        box-shadow: 0px 0px 5px 3px #d3d3d3;
    }

    .panel-default {
        border-color: #f1f1f1;
        color: #001b71;
        font-size: 20px;
    }

</style>

<!-- Hero Slider -->
<section class="hero-wrap text-center relative">
    <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated">

        <div class="hero-slide overlay" style="background-image:url(img/hero/1.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps nwtr" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines nwa">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/fashion" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/2.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps nwtr" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines nwa">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/delicacy" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/3.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps nwtr" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines nwa">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/beauty" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/4.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps nwtr" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines nwa">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/delicacy" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/5.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps nwtr" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines nwa">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/delicacy" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide overlay" style="background-image:url(img/hero/6.jpg)">
            <div class="container">
                <div class="hero-holder">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps nwtr" style="font-style: italic;">Plenty</h1>
                        <h2 class="hero-subtitle lines nwa">Ramadan Bazaar</h2>
                        <div class="buttons-holder">
                            <a href="/beauty" class="btn btn-lg btn-transparent carouselbtn"><span>Discover More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end hero slider -->


<!-- Promo Banners -->
<section class="section-wrap promo-banners pb-30">
    <div class="container cccategory">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">{{ __('website.welcome') }}</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-4 col-xxs-4 mb-30 promo-banner pm-cat-item wow slideInDown">
                <a href="/delicacy">
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

            <div class="col-xs-4 col-xxs-4 mb-30 promo-banner pm-cat-item wow slideInUp">

                <a href="/beauty">
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

            <div class="col-xs-4 col-xxs-4 mb-30 promo-banner pm-cat-item wow slideInDown">
                <a href="/fashion">
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
<!-- Plenty bazaar -->
<section class="section-wrap-sm new-arrivals" style="margin-top:50px;">
    <div class="purchase-online-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Plenty Bazaar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(isset($plenty_category))
                @foreach($plenty_category as $cat)
                <div class="col-lg-4 col-md-6 col-sm-6 wow slideInUp">
                    <div class="panel panel-default">
                        <a href="/bazaar/{{$cat->id}}">
                            <div class="panel-body"><img src="/storage/{{$cat->image}}" alt=""></div>
                            <div class="panel-footer">{{$cat->name}}<i class="fas fa-arrow-right pull-right"></i></div>
                        </a>

                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</section>
<!-- end plenty bazaar -->

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


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end trendy products -->
<section class="regular slider contm" style="">
    @if(isset($featured_products))
    @foreach($featured_products as $product)

    <div class="single-product ssproduct  col-lg-4 col-xs-12 hidden-md hidden-sm">

        <a href="{{ url('/product/' . $product->id) }}">
            <div class="product-img frame">

                @if ($product->image)
                <a href="{{ url('/product/' . $product->id) }}"><img class="imgz" src="storage/products/{{$product->image}}" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy /></a>
                @else
                <a href="{{ url('/product/' . $product->id) }}"><img class="imgz" src="img/product/plentylogo.png" alt="" loading=lazy /></a>
                @endif

                <div class="product-action clearfix">
                </div>
            </div>
        </a>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="{{ url('/product/' . $product->id) }}">{{$product->name_en}}</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR {{$product->price}}</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft" onclick="MakeFavourite(this,{{$product->id}})"><img class="featicons" data-id="{{$product->id}}" data-selected="0" src="img/nav/fav.png" loading=lazy>
                </span>
                </a>
                <a href="{{ url('/product/' . $product->id) }}"><span class="pro-rating floatright">
                        <img class="featicons" src="img/nav/bag.png" loading=lazy>
                    </span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
    @endif
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="brandsslider slider contm">
    @if(isset($homebrands))
    @foreach($homebrands as $hb)
    <?php
    $primary = $hb->primary;
    $primarycolor = substr($primary, -6);
    ?>

    <div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm" style="margin:0 5px;">
        @if($hb->cat_id == 1)
        <a href="/delicacy/{{$hb->shop_id}}">
            @elseif($hb->cat_id == 2)
            <a href="/beauty/{{$hb->shop_id}}">
                @elseif($hb->cat_id == 3)
                <a href="/fashion/{{$hb->shop_id}}">
                    @else
                    <a href="/">
                        @endif
                        <div class="product-img frame" style="border: 2px solid #<?php echo $primarycolor ?>">


                            <img class="imgz" src="storage/styles/{{$hb->brandheader}}" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 90%;max-height: 90%;width:80%;min-width:80%;" />

                            <div class="product-action clearfix">

                            </div>
                        </div>
                    </a>


    </div>

    @endforeach
    @endif

</section>

<section style="height:50px;">
</section>
<!-- Newsletter -->
<section class="newsletter" id="subscribe" style="background-color:#f2f3f8;border:0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 style="text-transform: uppercase;font-family:'Avenir Bold'">Get the latest updates</h4>
                <form class="relative newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Email here" style="border: 2px solid #001b71;font-size:14px;">
                    <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Subscribe" style="font-weight:500;font-size:14px">
                </form>
            </div>
        </div>
    </div>
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
        let ids = getProductId();
        let data = $(".featicons");
        for (var i = 0; i < data.length; i++) {

            let pid = $(data[i]).data('id');
            if (ids.includes(pid)) {
                $(data[i]).attr("src", "img/nav/fav2.png")
                $(data[i]).attr('data-selected', "1")
            }
        }


    });

</script>
<div style="">
    @include('footer')
</div>
@endsection

