@extends('layout1')
@section('content')
<style>
    .sizestyle {
        border: 2px solid black;
        padding: 5px;
        font-size: 20px;
        border-radius: 10px;
        width: 35px;
        height: 35px;
    }

    .size-filter li {
        margin: 0 12px !important;
    }

    .single-pro-size ul li.active a,
    .single-pro-size ul li a:hover {
        color: green !important;
    }

    .sizestylea {
        text-align: center !important;
        margin-right: 0 !important;
        font-size: 24px;
        margin-top: 2px;
    }

    .tryitheader {
        text-align: left;
        padding: 10px;
        font-weight: lighter;
        color: black;
        font-size: 24px;
    }

    .addtobagbtn {
        border: 2px solid green;
        border-radius: 20px;

        padding: 10px 40px !important;
        font-size: 20px !important;
        background-color: transparent !important;
        color: green !important;
        font-weight: lighter;
    }

    .centermobile {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
        .contmobile {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 350px;
        }

        .product-info {
            width: 100% !important;
        }

        .cart-plus-minus {
            width: 100% !important;
        }

    }
</style>
<link rel="stylesheet" href="css/hurst.css">
<div class="heading-banner-area overlay-bg" style="margin: 0 5%;background: rgba(0, 0, 0, 0) url('img/product/Banner.png') no-repeat scroll center center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title" style="text-align:center">
                        <img src="img/homebrands/Sada.png" style="width:30%;padding: 50px 0">
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">DELICACY</a></li>
                            <li>SADA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset($product))
@foreach($product as $prd)
<div class="product-area single-pro-area pt-30 pb-30 product-style-2">
    <div class="container contmobile" style="background-color:#f2f3f8">
        <div class="row shop-list single-pro-info no-sidebar">
            <!-- Single-product start -->
            <div class="col-lg-12" style="padding:0;">
                <div class="single-product clearfix" style="background-color:#f2f3f8;padding: 10px;">
                    <!-- Single-pro-slider Big-photo start -->
                    <div class="col-lg-4">
                        <div class="single-pro-slider single-big-photo view-lightbox slider-for" style="width:100% !important">
                            <div>

                                @if ($prd->image)
                                <img src="{{$prd->image}}" alt="" loading=lazy />
                                @else
                                <img src="img/product/Main.png" alt="" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Single-pro-slider Big-photo end -->
                    <div class="product-info mt-50" style="padding:0 15px">
                        <div class="fix">
                            <h4 class="post-title floatleft" style="font-size:24px;font-weight:bolder;line-height:200%;font-family:'Avenir bold';color:black;">
                                {{$prd->name_en}}</h4>
                            <!-- <span class="pro-rating floatright">
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<span>( 27 Rating )</span>
										</span> -->
                        </div>
                        <div class="fix mb-30">
                            <span class="pro-price" style="font-size:24px;color:#2c864d;font-weight:lighter;">AED
                                {{$prd->price}}</span>
                        </div>
                        <div class="product-description">
                            <p style="font-size:18px;color:black;"> {{$prd->desc_en}}</p>
                        </div>
                        <!-- color start -->

                        <!-- color end -->
                        <!-- Size start -->
                        <span class="color-title text-capitalize mb-20" style="font-size:18px;text-transform:uppercase">size</span>
                        <div class="size-filter single-pro-size mb-35 ml-30 clearfix row">
                            <ul>
                                <li class="sizestyle">
                                    <a href="#" class="sizestylea">S</a>
                                </li>
                                <li class="sizestyle active">
                                    <a href="#" class="sizestylea">M</a>
                                </li>
                                <li class="sizestyle">
                                    <a href="#" class="sizestylea">L</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix">
                            <div class="cart-plus-minus" style="width:50%;background:#e1e0e5;">
                                <div class="dec qtybutton">-</div>
                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box" style="background: #e1e0e5 none repeat scroll 0 0;">
                                <div class="inc qtybutton">+</div>
                            </div>
                        </div>
                        <!-- Size end -->
                        <div style="height:30px;">
                        </div>
                        <div class="centermobile">
                            <button class=" addtobagbtn">
                                <span class="addtobagheader" style="padding-top:10px !important;">
                                    Add to Bag
                                </span>
                                <img src="img/product/bag.png" style="width:30px;">

                            </button>
                        </div>

                        <!-- Single-pro-slider Small-photo end -->
                    </div>
                </div>
            </div>
            <!-- Single-product end -->
        </div>
        <!-- single-product-tab start -->

        <!-- single-product-tab end -->
    </div>
</div>
@endforeach
@endif

<section style="width:90%;text-align:left;margin:auto; background-color:#f2f3f8">
    <h1 style="padding: 30px;margin-bottom: 0;padding-bottom:0;font-size:28px;color:black;font-weight: lighter;">
        TRY IT WITH
    </h1>
</section>
<section class="tryprodslider slider" style="width:90%;text-align:center;margin:auto; background-color:#f2f3f8">

    @foreach($addons as $addon)

    <div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img">
            <a href="product.html"><img src="img/product/8.jpg" alt="" /></a>
            <div class="product-action clearfix">

            </div>
            <h4 class="tryitheader" style="text-align:left;padding:10px;"> {{$addon->name_en}}</h4>
        </div>
    </div>

    @endforeach



</section>
<script>
    $(document).ready(function() {
        console.log("ready!");
        $(".active").css("background-color", "black");
    });
</script>
<script src="js/prodjs.js"></script>
@endsection