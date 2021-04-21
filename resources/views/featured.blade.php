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

    @media only screen and (max-width: 600px) {
        .contm {
            width: 100%;
        }
    }
</style>

<!-- Hero Slider -->
<section class="hero-wrap text-center relative">
    <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated" style="height: 400px;">

        <div class="hero-slide overlay" style="background-image:url(img/hero/1.jpg)">
            <div class="container">
                <div class="hero-holder" style="height:50%">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/fashion" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/2.jpg)">
            <div class="container">
                <div class="hero-holder" style="height:50%">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/delicacy" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/3.jpg)">
            <div class="container">
                <div class="hero-holder" style="height:50%">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/beauty" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/4.jpg)">
            <div class="container">
                <div class="hero-holder" style="height:50%">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/delicacy" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-slide overlay" style="background-image:url(img/hero/5.jpg)">
            <div class="container">
                <div class="hero-holder" style="height:50%">
                    <div class="hero-message">
                        <h1 class="hero-title nocaps" style="font-style: italic;">New Trend in 2021</h1>
                        <h2 class="hero-subtitle lines">New Arrivals Collection</h2>
                        <div class="buttons-holder">
                            <a href="/fashion" class="btn btn-lg btn-transparent carouselbtn"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- end hero slider -->

<section style="height:50px;">
</section>

<!-- Featured Product -->
<section class="section-wrap-sm new-arrivals ">
    <div class="purchase-online-area ">
        <div class="container contm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Featured Products</h2>
                    </div>
                </div>
            </div>
            <section style="margin: auto;width:90%;text-align:center;" id="product-panel">
                @foreach($products as $product)

                <div class="producthover single-product col-lg-3 col-xs-6 hidden-md hidden-sm " style="margin-bottom:30px;">
                    <div class="product-img frame"><a href="product/{{$product->id}}"><img src="storage/products/{{$product->image}}" alt="" loading="lazy" class="imgz"></a>
                        <div class="fix buttonsshow" style="visibility: visible;"><span class="pro-price "><img class="featicons" src="img/nav/bag.png" loading="lazy" style="width:25px;min-width:25px;filter: brightness(0) invert(1);"></span>
                            <span class="pro-rating "><img class="featicons" src="img/nav/search.png" loading="lazy" style="width:25px;min-width:25px;filter: brightness(0) invert(1);"></span></div>
                        <div class="product-action clearfix"></div>
                    </div>
                    <div class="product-info clearfix">
                        <div class="fix">
                            <h4 class="post-title floatcenter feattitle"><a href="product/{{$product->id}}" style="">{{$product->name_en}} </a></h4>
                            <p class="floatcenter hidden-sm featsubtitle  post-title">SAR {{$product->price}}</p>
                        </div>
                        <div class="fix featlineicons">
                            <span class="pro-price floatleft" onclick="MakeFavourite({{$product->id}})"><img class="featicons" src="img/nav/fav.png" loading=lazy>
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
            </section>

        </div>
    </div>
</section> <!-- end Featured Product -->


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
    });
</script>
<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection