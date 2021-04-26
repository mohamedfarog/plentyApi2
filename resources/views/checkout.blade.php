@extends('layout')
@section('content')
<link rel="stylesheet" href="css/hurst.css">

<style>
    body,
    span {
        color: #1d2767;
    }

    label.labelbilldet {
        color: #1d2767;
    }

    input.inputdeladd {
        background: white;
        border: 2px solid #7f8db8;
        color: #1d2767;
    }

    .title-border::before {
        background: #b2bad4;
        width: 100%;
        height: 2px;
    }

    .payment-details table td {
        color: #001b71;
        font-weight: 100;
        padding: 10px 5px;
    }

    .ordsumtitle {
        font-family: 'Avenir Bold'
    }

    .bg-light {
        background-color: #f2f3f8;
    }

    .orderprodtxt {
        font-size: 15px;
        font-weight: 400;

    }

    .payment-details table tr:last-child td {
        color: #001b71;
        padding: 10px 5px;
        font-weight: 700;
        font-family: 'Avenir Bold'
    }

    .payment-details table tr {
        border-bottom: 2px solid #b2bad4;
    }

    .orderprodprice {
        padding-right: 30px !important;
    }

    .shop-cart-table {
        padding: 40px 0;
    }

    .payment-accordion-toggle {
        font-family: 'Avenir';
        font-weight: 100 !important;

        text-transform: unset !important;
        font-size: 16px !important;
        padding: 7px 20px !important;
        height: 50px !important;

    }

    .selpaymet::before {
        background: transparent;
        height: 0 !important;
    }


    .payment-accordion-toggle.active::before {
        content: "\f077";
    }

    .payment-accordion-toggle::before {
        color: white;
        font-family: FontAwesome;
        content: "\f078";
        font-size: 16px;
        position: absolute;
        text-align: center;
        right: 15px;
    }

    .payment-content {
        padding: 0;
    }

    .boldfont {
        font-family: 'Avenir';
        font-weight: 600 !important;
        font-size: 16px !important;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        border-radius: 15px;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    input[type='range']::-webkit-slider-runnable-track {
        height: 10px;
        -webkit-appearance: none;
        color: #13bba4;
        margin-top: -1px;
    }

    input[type='range']::-webkit-slider-thumb {

        background: url('img/checkout/sliderthumb.png') #ffa400;
        color: #43e5f7;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: url('img/checkout/sliderthumb.png') #ffa400;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: url('img/checkout/sliderthumb.png') #ffa400;
        cursor: pointer;

    }

    /** FF*/
    input[type="range"]::-moz-range-progress {
        background-color: #ffa400;
    }

    input[type="range"]::-moz-range-track {
        background-color: white;
    }

    /* IE*/
    input[type="range"]::-ms-fill-lower {
        background-color: #ffa400;
    }

    input[type="range"]::-ms-fill-upper {
        background-color: #ffa400;
    }

    input[type='range']::-webkit-slider-runnable-track {
        height: 15px;
        -webkit-appearance: none;
        color: #ffa400;
        margin-top: -1px;
    }

    .carddets {
        background: white;
        padding: 10px;
        padding-left: 30px;
    }

    .carddets:nth-child(odd) {
        background: #f2f3f8;
    }

    @media only screen and (max-width: 600px) {
        .contmobile {
            width: 90%;
        }
    }

    .chip {
        display: inline-block;
        padding: 0 25px;
        height: 50px;
        font-size: 18px;
        line-height: 50px;
        border-radius: 25px;
        background-color: #f1f1f1;
    }


    .chip .closebtn {
        padding-left: 10px;
        color: #888;
        font-weight: bold;
        float: right;
        font-size: 20px;
        cursor: pointer;
    }

    .chip .closebtn:hover {
        color: #000;
    }
</style>


<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase" style="font-family:'Avenir Bold'">Order Summary</h1>

            </div>
        </div>
    </div>
</section>

<div class="shopping-cart-area  ">
    <div class="container contmobile">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="shopping-cart">

                    <!-- Tab panes -->
                    <div class="tab-content" style="border:0;padding:0">
                        <!-- shopping-cart start -->
                        <div class="tab-pane" id="shopping-cart">
                            <div class="shop-cart-table">
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="product-thumbnail  text-left">
                                                    <!-- Single-product start -->
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="single-product.html"><img src="img/product/2.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="product-info">
                                                            <h4 class="post-title"><a class="text-light-black" href="/">dummy product name</a></h4>
                                                            <p class="mb-0">Color : Black</p>
                                                            <p class="mb-0">Size : SL</p>
                                                        </div>
                                                    </div>
                                                    <!-- Single-product end -->
                                                </td>
                                                <td class="product-price">$56.00</td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">$112.00</td>
                                                <td class="product-remove">
                                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-thumbnail  text-left">
                                                    <!-- Single-product start -->
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="single-product.html"><img src="img/product/12.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="product-info">
                                                            <h4 class="post-title"><a class="text-light-black" href="/">dummy product name</a></h4>
                                                            <p class="mb-0">Color : Black</p>
                                                            <p class="mb-0">Size : SL</p>
                                                        </div>
                                                    </div>
                                                    <!-- Single-product end -->
                                                </td>
                                                <td class="product-price">$56.00</td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">$112.00</td>
                                                <td class="product-remove">
                                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="product-thumbnail  text-left">
                                                    <!-- Single-product start -->
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            <a href="single-product.html"><img src="img/product/6.jpg" alt="" /></a>
                                                        </div>
                                                        <div class="product-info">
                                                            <h4 class="post-title"><a class="text-light-black" href="/">dummy product name</a></h4>
                                                            <p class="mb-0">Color : Black</p>
                                                            <p class="mb-0">Size : SL</p>
                                                        </div>
                                                    </div>
                                                    <!-- Single-product end -->
                                                </td>
                                                <td class="product-price">$56.00</td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">$112.00</td>
                                                <td class="product-remove">
                                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="customer-login mt-30">
                                        <h4 class="title-1 title-border text-uppercase">coupon discount</h4>
                                        <p class="text-gray">Enter your coupon code if you have one!</p>
                                        <input type="text" placeholder="Enter your code here.">
                                        <button type="submit" data-text="apply coupon" class="button-one submit-button mt-15">apply coupon</button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="customer-login payment-details mt-30">
                                        <h4 class="title-1 title-border text-uppercase">payment details</h4>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">Cart Subtotal</td>
                                                    <td class="text-right">$155.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Cart Subtotal</td>
                                                    <td class="text-right">$15.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Vat</td>
                                                    <td class="text-right">$00.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">Order Total</td>
                                                    <td class="text-right">$170.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="customer-login mt-30">
                                        <h4 class="title-1 title-border text-uppercase">culculate shipping</h4>
                                        <p class="text-gray">Enter your coupon code if you have one!</p>
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" placeholder="Country">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" placeholder="Region / State">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" placeholder="Post code">
                                            </div>
                                        </div>
                                        <button type="submit" data-text="get a quote" class="button-one submit-button mt-15">get a quote</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- shopping-cart end -->
                        <!-- wishlist start -->
                        <div class="tab-pane" id="wishlist">
                            <form action="#">
                                <div class="shop-cart-table">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-stock">stock status</th>
                                                    <th class="product-add-cart">Add to cart</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src="img/product/2.jpg" alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
                                                                <p class="mb-0">Color : Black</p>
                                                                <p class="mb-0">Size : SL</p>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->
                                                    </td>
                                                    <td class="product-price">$56.00</td>
                                                    <td class="product-stock">in stock</td>
                                                    <td class="product-add-cart">
                                                        <a class="text-light-black" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src="img/product/12.jpg" alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
                                                                <p class="mb-0">Color : Black</p>
                                                                <p class="mb-0">Size : SL</p>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->
                                                    </td>
                                                    <td class="product-price">$56.00</td>
                                                    <td class="product-stock">in stock</td>
                                                    <td class="product-add-cart">
                                                        <a class="text-light-black" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-thumbnail  text-left">
                                                        <!-- Single-product start -->
                                                        <div class="single-product">
                                                            <div class="product-img">
                                                                <a href="single-product.html"><img src="img/product/6.jpg" alt="" /></a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
                                                                <p class="mb-0">Color : Black</p>
                                                                <p class="mb-0">Size : SL</p>
                                                            </div>
                                                        </div>
                                                        <!-- Single-product end -->
                                                    </td>
                                                    <td class="product-price">$56.00</td>
                                                    <td class="product-stock">in stock</td>
                                                    <td class="product-add-cart">
                                                        <a class="text-light-black" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- wishlist end -->
                        <!-- check-out start -->
                        <div class="tab-pane active" id="check-out">
                            <form id="cart-form">
                                <input type="hidden" id="loyality-point" name="loyality-point">
                                <div class="shop-cart-table check-out-wrap">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billing-details pr-20">
                                                <h4 class="title-1 title-border text-uppercase mb-30 ordsumtitle">Delivery Address</h4>
                                                <div class="form-group">
                                                    <div id="map" class="form-control" style="height:400px;"></div>
                                                    <br>
                                                    <div class="row" style="margin:auto;">
                                                        <input type="hidden" id="lat" name="lat">

                                                        <input type="hidden" id="lng" name="lng">


                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label class="labelbilldet" style="margin-top: 10px;margin-bottom:0">Address: </label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" name="address" id="address" onchange="initAutocomplete()" type="text" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label class="labelbilldet" style="margin-top: 10px;margin-bottom:0">City: </label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12">
                                                        <select id="city" name="city" required>
                                                            <option value="Jiddah">Jiddah</option>
                                                            <option value="Jīzān">Jīzān</option>
                                                            <option value="Khamīs Mushayt">Khamīs Mushayt</option>
                                                            <option value="King Khālid Military City">King Khālid Military City</option>
                                                            <option value="Mecca">Mecca</option>
                                                            <option value="Medina">Medina</option>
                                                            <option value="Najrān">Najrān</option>
                                                            <option value="Ras Tanura">Ras Tanura</option>
                                                            <option value="Riyadh">Riyadh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label class="labelbilldet" style="margin-top: 10px;margin-bottom:0">Contact Number: </label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" id="contact" name="contact" type="text" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="mt-20"></div>
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <label class="labelbilldet">Address Label: </label>
                                                    </div>
                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="row" style="width:80%;text-align:center;margin:auto;padding:20px 0;">
                                                            <div class="col-md-4 col-xs-4">
                                                                <label class="radio-inline">
                                                                    <div class="row">
                                                                        <a class="addresslabel" style="padding: 7px; background-color: rgb(0, 27, 113);">
                                                                            <input type="radio" name="adresslabel" value="0" checked>
                                                                            <span style="color:white">Home </span>
                                                                            <img src="img/checkout/home.png" style="height:20px;margin-left:10px;color:white;filter: brightness(0) invert(1);">
                                                                        </a>
                                                                    </div>

                                                                </label>
                                                            </div>
                                                            <div class="col-md-4 col-xs-4">
                                                                <label class="radio-inline">
                                                                    <div class="row">
                                                                        <a class="addresslabel" style="padding: 7px;">
                                                                            <input type="radio" name="adresslabel" value="1">
                                                                            <span>Work </span>
                                                                            <img src="img/checkout/portfolio.png" style="height:20px;margin-left:10px;">
                                                                        </a>
                                                                    </div>

                                                                </label>
                                                            </div>
                                                            <div class="col-md-4 col-xs-4">
                                                                <label class="radio-inline">
                                                                    <div class="row">
                                                                        <a class="addresslabel" style="padding: 7px;">
                                                                            <input type="radio" name="adresslabel" value="2">
                                                                            <span>Other </span>
                                                                            <img src="img/checkout/pin.png" style="height:20px;margin-left:10px;">
                                                                        </a>
                                                                    </div>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <label class="labelbilldet">Other Notes: </label>
                                                    </div>
                                                    <div class="col-md-12 col-xs-12">
                                                        <textarea class="custom-textarea" name="othernotes" id="othernotes" row="6" placeholder="" style=" background: white;border: 2px solid #7f8db8;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-20">
                                            <div class="our-order payment-details  pr-20">
                                                <h4 class="title-1 title-border text-uppercase ordsumtitle">Your order</h4>
                                                <table>
                                                    <tbody id="product">

                                                    </tbody>

                                                    <tbody>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Subtotal</td>
                                                            <td class="text-right orderprodtxt orderprodprice" id="sub_total"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Shipping</td>
                                                            <td class="text-right orderprodtxt orderprodprice">Free Shipping</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Coupon Code</td>
                                                            <td class="text-right orderprodtxt orderprodprice" style="color:#ff000c" id="coupon-applied">-</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Plenty Balance</td>
                                                            <td class="text-right orderprodtxt orderprodprice" style="color:#ff000c" id="plenty-balance-show">-</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Plenty Point</td>
                                                            <td class="text-right orderprodtxt orderprodprice" style="color:#ff000c" id="plenty-point-show">-</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">TOTAL</td>
                                                            <td class="text-right orderprodtxt orderprodprice">
                                                                <span id="order_total">
                                                                </span>

                                                                <span style="font-weight: 100;font-family:'Avenir'">SAR</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" id="ordertotal" name="ordertotal">
                                                <input type="hidden" id="balance" name="balance">
                                            </div>
                                        </div>
                                        <!-- payment-method -->
                                        <div class="col-md-6 col-sm-6 col-xs-12" style="background:#f2f3f8">
                                            <div class="payment-method mt-20 mb-20 pl-20 pr-20">
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" type="text" id="coupon-code" placeholder="Coupon here!" style="border: 2px solid #001b71;margin-bottom: 5px;padding: 10px;" id=>
                                                        <br>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12" style="padding-left: 0">
                                                        <button class="button-one submit-button" type="button" data-text="coupon" onclick="checkCouponValid()" style="height: 100%;background:#001b71;">apply</button>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <span id="coupon_error"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="chip" style="visibility:hidden" id="coupon-wrapper">
                                                            <span id="coupon"></span>
                                                            <span class="closebtn" onclick="removeCoupon()">&times;</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="title-1 title-border mb-20 mt-20 selpaymet" style="font-weight:100">Select payment method</h4>
                                                <div class="payment-accordion">
                                                    <!-- Accordion start  -->
                                                    <h3 class="payment-accordion-toggle active" style="background:#ffa400;color:white;">Use your Loyalty Points <span class="text-right spanh3" style="color:white;float:right;margin-right:30px;"> <span class="loyality-point"></span> PTS</span> </h3>


                                                    <div class="payment-content default">
                                                        <div class="row" style="border-bottom:1px solid grey;margin-left:5px;margin-right:5px;">
                                                            <span class="boldfont">Available Loyalty Points</span>
                                                            <span class="boldfont" style="text-align:right;float:right;margin-right:15px;font-family:'Avenir Bold'"><span class="loyality-point"></span> <span style="font-family:'Avenir';font-weight:100"> PTS</span></span>
                                                        </div>
                                                        <div style="margin-left:5px;margin-right:5px;margin-top:5px;">
                                                            <span class="boldfont">Use your Loyalty Points</span><br>
                                                            <span style="font-size:16px;">Select the amount to pay with your Loyalty Points!</span>
                                                        </div>
                                                        <div style="margin-left:5px;margin-right:5px;margin-top5:px;">
                                                            <input type="range" name="pointInputName" id="pointInputId" onchange="calculateLoyalityPoint(this)" class="slider" value="0" min="0" max="100" oninput="pointOutputId.value = pointInputId.value" style="background:#ffa400">
                                                            <output name="pointOutputName" id="pointOutputId">0</output>
                                                        </div>
                                                        <div class="mt-30 row" style="width:50%;text-align:center;margin:auto">
                                                            <div style="background:white;padding: 10px 0" class="col-md-5 col-xs-12">
                                                                <span class="boldfont" id="point-used">00.00</span><br>
                                                                <span>Points Used</span>
                                                            </div>
                                                            <div class="col-md-2 col-xs-12">
                                                                <br><span> =
                                                                </span>
                                                            </div>

                                                            <div style="background:white;padding: 10px 0 " class="col-md-5 col-xs-12">
                                                                <span class="boldfont" id="sar-used">0</span><br>
                                                                <span>SAR</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-30 mb-30" style="margin-left:5px;margin-right:5px;">
                                                            <span style="font-size:16px;">Available Loyalty Points</span>
                                                            <span class="boldfont" style="text-align:right;float:right;margin-right:15px;font-family:'Avenir Bold';font-size:16px;" id="point-sar-balance">0 <span style="font-family:'Avenir';font-weight:100">SAR</span></span>
                                                        </div>
                                                    </div>
                                                    <!-- Accordion end -->
                                                    <!-- Accordion start -->
                                                    <h3 class="payment-accordion" style="background:white">
                                                        <input type="radio" id="paymode0" name="paymode" value="0" checked><label style="width:100%;" for="paymode0">Cash on Delivery
                                                            <span style='float:right;line-height:1;padding-top: 5px;'><img src="img/checkout/cash.png" style="height:25px;"></span></label>

                                                    </h3>

                                                    <!-- Accordion end -->
                                                    <!-- Accordion start -->
                                                    <div style="border: 2px solid #1d2767;margin-bottom:20px;">
                                                        <h3 class="payment-accordion" style="background:white;margin-bottom:0px;">
                                                            <input type="radio" id="paymode1" name="paymode" value="1"><label for="paymode1">Pay with Card</label>
                                                            <span style='float:right;line-height:1;padding-top: 5px;'><img src="img/checkout/card.png" style="height:25px;"></span></label>
                                                        </h3>
                                                        <div class="carddets">
                                                            <img src="img/checkout/master card logo.png">
                                                            <span style="font-size:16px;">Card ending with 1234</span>
                                                        </div>
                                                        <div class="carddets">
                                                            <img src="img/checkout/visa.png">
                                                            <span style="font-size:16px;">Card ending with 4025</span>
                                                        </div>
                                                        <div class="carddets">

                                                        </div>
                                                        <button style="width:100%; background: #1d2767;color:white;font-size:16px;padding:5px">
                                                            Add new card +
                                                        </button>
                                                    </div>


                                                    <!-- Accordion end -->

                                                    <h3 class="payment-accordion" style="background:white">
                                                        <input type="checkbox" id="plentypay" name="plentypay" value="1" onchange="plentyPaySelect(this)"><label for="plentypay">Pay with Plenty Pay</label>
                                                        <input type="hidden" id="plenty-balance" name="plenty-balance">
                                                        <input type="hidden" id="plenty-payed" name="plentypay">
                                                    </h3>
                                                    <button class="button-one submit-button mt-15" data-text="place order" type="submit" style="width:100%;font-size:16px;height: 50px;background: #1d2767">place order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- check-out end -->
                        <!-- order-complete start -->
                        <div class="tab-pane" id="order-complete">
                            <form action="#">
                                <div class="thank-recieve bg-white mb-30">
                                    <p>Thank you. Your order has been received.</p>
                                </div>
                                <div class="order-info bg-white text-center clearfix mb-30">
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">order no</h4>
                                        <p class="text-uppercase text-light-black mb-0"><strong>m 2653257</strong></p>
                                    </div>
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">Date</h4>
                                        <p class="text-uppercase text-light-black mb-0"><strong>june 15, 2016</strong></p>
                                    </div>
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">Total</h4>
                                        <p class="text-uppercase text-light-black mb-0"><strong>$ 170.00</strong></p>
                                    </div>
                                    <div class="single-order-info">
                                        <h4 class="title-1 text-uppercase text-light-black mb-0">payment method</h4>
                                        <p class="text-uppercase text-light-black mb-0"><a href="#"><strong>check payment</strong></a></p>
                                    </div>
                                </div>
                                <div class="shop-cart-table check-out-wrap">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-sm-12">
                                            <div class="our-order payment-details pr-20">
                                                <h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th><strong>Product</strong></th>
                                                            <th class="text-right"><strong>Total</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Gray Jacket x 1</td>
                                                            <td class="text-right">75 SAR</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hair Style Booking</td>
                                                            <td class="text-right">125 SAR </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td class="text-right">$155.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shipping and Handing</td>
                                                            <td class="text-right">$15.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vat</td>
                                                            <td class="text-right">$00.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Order Total</td>
                                                            <td class="text-right">$170.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- payment-method -->
                                        <div class="col-md-6 col-sm-6 col-sm-12 mt-xs-30">
                                            <div class="payment-method  pl-20">
                                                <h4 class="title-1 title-border text-uppercase mb-30">payment method</h4>
                                                <div class="payment-accordion">
                                                    <!-- Accordion start  -->
                                                    <h3 class="payment-accordion-toggle active">Direct Bank Transfer</h3>
                                                    <div class="payment-content default">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                    <!-- Accordion end -->
                                                    <!-- Accordion start -->
                                                    <h3 class="payment-accordion-toggle">Cheque Payment</h3>
                                                    <div class="payment-content">
                                                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                    <!-- Accordion end -->
                                                    <!-- Accordion start -->
                                                    <h3 class="payment-accordion-toggle">PayPal</h3>
                                                    <div class="payment-content">
                                                        <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                        <a href="#"><img src="img/payment/1.png" alt="" /></a>
                                                        <a href="#"><img src="img/payment/2.png" alt="" /></a>
                                                        <a href="#"><img src="img/payment/3.png" alt="" /></a>
                                                        <a href="#"><img src="img/payment/4.png" alt="" /></a>
                                                    </div>
                                                    <!-- Accordion end -->
                                                    <button class="button-one submit-button mt-15" data-text="place order" type="submit">place order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- order-complete end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
<script>
    /*-------------------------
	accordion toggle function
--------------------------*/
    $('.payment-accordion').find('.payment-accordion-toggle').on('click', function() {

        //Expand or collapse this panel
        $(this).next().slideToggle(200);
        //Hide the other panels
        $(".payment-content").not($(this).next()).slideUp(200);
    });
    /* -------------------------------------------------------
    	accordion active class for style
    ----------------------------------------------------------*/
    $('.payment-accordion-toggle').on('click', function(event) {

        $(this).siblings('.active').css({
            'background': '#f6f6f6',
            'color': '#1d2767'
        });
        $(this).siblings('.active').children('.spanh3').css({
            'color': '#1d2767'
        });
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        $(this).css({
            'background': '#ffa400',
            'color': 'white'
        });
        $(this).children('.spanh3').css({
            'color': 'white'
        });
        event.preventDefault();
    });
    $(document).ready(function() {
        $('#paymode0').change(function() {
            var cart = CartSerializer(getCartLocal())
            cart.is_cash_on_delivery = true
            storeCartLocal(JsonCartSerializer(cart));

        });
        $('#paymode1').change(function() {
            var cart = CartSerializer(getCartLocal())
            cart.is_cash_on_delivery = false;
            storeCartLocal(JsonCartSerializer(cart));
        });
        renderOrderedProduct();
        getLoyalityPoint();
        removeCoupon();
        getPlentyBalance();
    });


    function renderOrderedProduct() {
        var cart = CartSerializer(getCartLocal())
        cart.loyality_point = 0;
        cart.coupon = '';
        cart.coupon_value = 0;
        storeCartLocal(JsonCartSerializer(cart));
        let template = ''

        cart.cart_items.forEach(item => {
            let size = '';
            if (item.size) {
                size = " (" + item.size + ")";
            }
            template = template + "<tr>" +
                "<td class='orderprodtxt' style='padding-left: 10px; font-weight:100'>" + item.name + size + " x" + item.quantity + "<br/><span style='color:red' id='" + item.id + "-" + item.size_id + "-" + item.timeslot_id + "'> <span></td>" +
                "<td class='text-right orderprodtxt orderprodprice'>" + item.price + " SAR</td>" +
                "</tr>" +
                "<tr>" +
                "</tr>"

        });
        $('#product').html(template);
        $('#order_total').html(cart.subTotal().toFixed(2) + " SAR");
        $('#ordertotal').val(cart.subTotal());
        $('#balance').val(cart.subTotal());
        $('#sub_total').html(cart.subTotal() + " SAR");
    }

    function checkCouponValid() {
        $("#coupon_error").html("");
        var cart = CartSerializer(getCartLocal())
        if (cart.coupon_value > 0) {
            $("#coupon_error").html("You applied coupon already!");
        } else if ($('#balance').val() == 0) {
            $("#coupon_error").html("You don't need to apply coupon!");
        } else {
            const bearer_token = getCookie('bearer_token');
            let code = $('#coupon-code').val()
            url = base_url + 'coupon'
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "couponcode": code,
                    "cart": getCartLocal()
                },
                headers: {

                    "Authorization": 'Bearer ' + bearer_token
                },

                success: function(data) {
                    if (data.value > 0) {
                        $("#coupon_error").html("coupon applied " + data.value + " SAR")
                        $("#coupon-applied").html(data.value + ' SAR (10%)')
                        cart.coupon_value = data.value;
                        cart.coupon = code;
                        document.getElementById("balance").value = cart.orderTotal();
                        $("#coupon-wrapper").css("visibility", "visible");
                        $("#coupon").html(code)
                        cart.loyality_point = 0;
                        cart.plenty_pay = 0;
                        document.getElementById("balance").value = parseFloat(document.getElementById("balance").value) - parseFloat(cart.coupon_value);
                        document.getElementById("order_total").innerText = parseFloat(document.getElementById("balance").value).toFixed(2);
                        storeCartLocal(JsonCartSerializer(cart));
                        resetPlentyPointAndPay();
                    } else {
                        $("#coupon_error").html("This coupon is not applicable ! ")
                    }
                },
                error: function(err) {
                    let error = err.responseJSON.message;
                    $("#coupon_error").html(error)

                    console.log('Error!', err)
                }

            });
        }

    }

    function resetPlentyPointAndPay() {
        document.getElementById("point-used").innerHTML = 0;
        document.getElementById("sar-used").innerHTML = 0;
        var ele = document.getElementById("pointInputId");;
        document.getElementById("point-sar-balance").innerHTML = (
            calculateLoyalityPointSAR(parseFloat(ele.max),
                parseFloat(ele.max))).toFixed(2) + ' SAR';
        document.getElementById("plenty-point-show").innerHTML = (0).toFixed(2) + ' SAR';
        ele.value = 0;
        document.getElementById("pointOutputId").value = 0;
        document.getElementById("plenty-balance-show").innerHTML = 0;
        ele = document.getElementById("plentypay")
        ele.checked = false;
    }


    function getLoyalityPoint() {
        const bearer_token = getCookie('bearer_token');
        url = base_url + 'plenty-points'
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            headers: {
                "Authorization": 'Bearer ' + bearer_token
            },

            success: function(data) {
                console.log(data.point)
                $(".loyality-point").html(data.point);
                $("#pointInputId").attr({
                    max: data.point
                })
                $("#loyality-point").val(data.point);
            },
            error: function(err) {
                console.log('Error!', err)
            }

        });
    }

    $("form").on('submit', function(e) {
        e.preventDefault();
        const form = new FormData(document.getElementById("cart-form"))
        const bearer_token = getCookie('bearer_token');
        url = base_url + 'place-order'
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'JSON',
            data: {
                "_token": "{{ csrf_token() }}",
                "cart": getCartLocal(),
                "address": form.get("address") || null,
                "city": form.get("city") || null,
                "contact": form.get("contact") || null,
                "addresslabel": form.get("adresslabel") || null,
                "othernotes": form.get("othernotes") || null,
                "lang": form.get("lng") || null,
                "lat": form.get("lat") || null
            },
            headers: {
                "Authorization": 'Bearer ' + bearer_token
            },

            success: function(data) {
                console.log(data)
            },
            error: function(err) {

                console.log('Error!', err)
            }

        });
    });

    $(document).ready(function() {
        $(".addresslabel").click(function() {
            $(".addresslabel").css("background-color", "white");
            $(".addresslabel").children("span").css("color", "#001b71");
            $(".addresslabel").children("img").css("filter", "none");
            $(this).css("background-color", "#001b71");
            $(this).children("span").css("color", "white");
            $(this).children("img").css("filter", "brightness(0) invert(1)");
        });

    });

    function calculateLoyalityPoint(ele) {
        var cart = CartSerializer(getCartLocal())
        let applied_sar = calculateLoyalityPointSAR(parseFloat(cart.loyality_point), parseFloat(ele.max))
        let balance;
        if (applied_sar > 0) {
            balance = parseFloat(document.getElementById("balance").value) + applied_sar;
        } else {
            balance = parseFloat(document.getElementById("balance").value)
        }
        let sar = calculateLoyalityPointSAR(parseFloat(ele.value), parseFloat(ele.max));
        let sar_available = calculateLoyalityPointSAR(parseFloat(ele.max), parseFloat(ele.max)) - sar;
        if (sar < balance) {
            console.log('do not!')
            document.getElementById("point-used").innerHTML = ele.value;
            document.getElementById("sar-used").innerHTML = sar;
            document.getElementById("point-sar-balance").innerHTML = (sar_available).toFixed(2) + ' SAR';
            document.getElementById("plenty-point-show").innerHTML = sar.toFixed(2) + ' SAR';
            document.getElementById("balance").value = balance - parseFloat(sar);
            document.getElementById("order_total").innerText = parseFloat(document.getElementById("balance").value).toFixed(2);
        } else {
            let max_point
            if (balance > 0) {
                max_point = calculateLoyalitySARPoint(balance, parseFloat(ele.max))
            } else {
                max_point = cart.loyality_point;
            }
            sar_available = calculateLoyalityPointSAR(parseFloat(ele.max) - max_point, parseFloat(ele.max));
            document.getElementById("pointOutputId").innerHTML = max_point;
            document.getElementById("point-used").innerHTML = max_point;
            document.getElementById("sar-used").innerHTML = balance;
            document.getElementById("point-sar-balance").innerHTML = (sar_available).toFixed(2) + ' SAR';
            document.getElementById("balance").value = 0;
            document.getElementById("order_total").innerText = 0;
            ele.value = max_point;
            sar = calculateLoyalityPointSAR(parseFloat(ele.value), parseFloat(ele.max));
            document.getElementById("plenty-point-show").innerHTML = sar.toFixed(2) + ' SAR';
        }
        cart.loyality_point = ele.value;
        storeCartLocal(JsonCartSerializer(cart));
    }

    function calculateLoyalityPointSAR(point, total_point) {
        if (total_point > 29999) {
            return point * 3 / 100;
        } else if (total_point > 19999) {
            return point * 2 / 100;
        } else if (total_point > 0) {
            return point * 1 / 100;
        } else {
            return 0;
        }
    }

    function calculateLoyalitySARPoint(sar, total_point) {
        if (total_point > 29999) {
            return sar * 100 / 3;
        } else if (total_point > 19999) {
            return sar * 100 / 2;
        } else if (total_point > 0) {
            return sar * 100;
        } else {
            return 0;
        }
    }



    function getPlentyBalance() {
        const bearer_token = getCookie('bearer_token');
        if (bearer_token) {
            url = base_url + 'plenty-balance'
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'JSON',
                headers: {

                    "Authorization": 'Bearer ' + bearer_token
                },

                success: function(data) {
                    console.log(data)
                    if (data.Response) {
                        document.getElementById('plenty-balance').value = data.wallet;
                    } else {
                        document.getElementById('plenty-balance').value = 0;
                    }

                },
                error: function(err) {
                    console.log('Error!', err)
                }

            });
        } else {
            return 0;
        }

    }

    function plentyPaySelect(ele) {
        if (ele.checked) {
            if (parseFloat(document.getElementById("balance").value) > 0) {
                const balance = parseFloat(document.getElementById("balance").value);
                const wallet = parseFloat(document.getElementById('plenty-balance').value);
                if (balance > wallet) {
                    document.getElementById("plenty-balance-show").innerText = (wallet - balance).toFixed(2) + " SAR"
                    document.getElementById("plentypay").value = wallet - balance;
                    document.getElementById("balance").value = balance - (wallet - balance);
                } else {
                    document.getElementById("plenty-balance-show").innerText = balance.toFixed(2) + " SAR"
                    document.getElementById("plentypay").value = balance;
                    document.getElementById("balance").value = 0;
                }
            }

        } else {
            const plentypayed = document.getElementById("plentypay").value
            if (plentypayed > 0) {
                document.getElementById("balance").value = parseFloat(document.getElementById("balance").value) + parseFloat(document.getElementById("plentypay").value);
            }
            document.getElementById("plenty-balance-show").innerText = "-"
        }

        changeTotalPrice()

    }



    function showPlentyBalance(sar = 100) {

        document.getElementById("plenty-balance-show").innerText = sar + " SAR";
    }

    function changeTotalPrice() {
        const balance = document.getElementById("balance").value
        document.getElementById("order_total").innerText = balance.toFixed(2)
    }

    function removeCoupon() {
        var ele = document.getElementById("coupon-wrapper");
        ele.style.visibility = 'hidden'
        var cart = CartSerializer(getCartLocal())
        document.getElementById("balance").value = parseFloat(document.getElementById("balance").value) + parseFloat(cart.coupon_value);
        document.getElementById("order_total").innerText = parseFloat(document.getElementById("balance").value).toFixed(2)
        cart.coupon = '';
        cart.coupon_value = 0;
        storeCartLocal(JsonCartSerializer(cart));
        $("#coupon_error").html("");
    }
</script>

<script src="js/jquery.geocoder.js"></script>


<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyDQxeWFV5QiIZIPw5iRD5H1d5LxycBkou8&sensor=false&libraries=places'>
</script>
<script src="js/map.js" defer></script>
@endsection