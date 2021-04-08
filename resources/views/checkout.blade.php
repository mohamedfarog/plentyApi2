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
        font-size: 14px !important;
    }

    .selpaymet::before {
        background: transparent;
        height: 0 !important;
    }


    .payment-accordion-toggle.active::before {
        content: "\f077";
    } 
    .payment-accordion-toggle::before {

        font-family: FontAwesome;
        content: "\f078";
        font-size: 16px;
        position: absolute;
        right: 30px;
        text-align: center;
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="shopping-cart">

                    <!-- Tab panes -->
                    <div class="tab-content" style="border:0;padding:0">
                        <!-- shopping-cart start -->
                        <div class="tab-pane" id="shopping-cart">
                            <form action="#">
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
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
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
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
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
                                                                <h4 class="post-title"><a class="text-light-black" href="#">dummy product name</a></h4>
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
                            </form>
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
                            <form action="#">
                                <div class="shop-cart-table check-out-wrap">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="billing-details pr-20">
                                                <h4 class="title-1 title-border text-uppercase mb-30 ordsumtitle">Delivery Address</h4>
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label class="labelbilldet" style="margin-top: 10px;margin-bottom:0">Address: </label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" type="text" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label class="labelbilldet" style="margin-top: 10px;margin-bottom:0">City: </label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" type="text" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-12">
                                                        <label class="labelbilldet" style="margin-top: 10px;margin-bottom:0">Contact Number: </label>
                                                    </div>
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" type="text" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="mt-20"></div>
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <label class="labelbilldet">Address Label: </label>
                                                    </div>
                                                    <div class="col-md-12 col-xs-12">
                                                        <div class="row" style="width:80%;text-align:center;margin:auto;padding:20px 0;">
                                                            <div class="col-md-4 col-xs-12">
                                                                <label class="radio-inline">
                                                                    <div class="row">
                                                                        <input type="radio" name="optradio" checked>
                                                                        <span>Home </span>
                                                                        <img src="img/checkout/home.png" style="height:20px;margin-left:10px;">
                                                                    </div>

                                                                </label>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <label class="radio-inline">
                                                                    <div class="row">
                                                                        <input type="radio" name="optradio" checked>
                                                                        <span>Work </span>
                                                                        <img src="img/checkout/portfolio.png" style="height:20px;margin-left:10px;">
                                                                    </div>

                                                                </label>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <label class="radio-inline">
                                                                    <div class="row">
                                                                        <input type="radio" name="optradio" checked>
                                                                        <span>Other </span>
                                                                        <img src="img/checkout/pin.png" style="height:20px;margin-left:10px;">
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
                                                        <textarea class="custom-textarea" row="6" placeholder="" style=" background: white;border: 2px solid #7f8db8;"></textarea>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-20">
                                            <div class="our-order payment-details  pr-20">
                                                <h4 class="title-1 title-border text-uppercase ordsumtitle">Your order</h4>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Gray Jacket x1</td>
                                                            <td class="text-right orderprodtxt orderprodprice">75 SAR</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Hair Style Booking</td>
                                                            <td class="text-right orderprodtxt orderprodprice">125 SAR</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Subtotal</td>
                                                            <td class="text-right orderprodtxt orderprodprice">195 SAR</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Shipping</td>
                                                            <td class="text-right orderprodtxt orderprodprice">Free Shipping</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Coupon Code</td>
                                                            <td class="text-right orderprodtxt orderprodprice" style="color:#ff000c">- 19.5 SAR (10%)</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">Plenty Balance</td>
                                                            <td class="text-right orderprodtxt orderprodprice" style="color:#ff000c">- 20 SAR</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="orderprodtxt" style="padding-left: 10px;">TOTAL</td>
                                                            <td class="text-right orderprodtxt orderprodprice">170.00
                                                                <span style="font-weight: 100;font-family:'Avenir'">SAR</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- payment-method -->
                                        <div class="col-md-6 col-sm-6 col-xs-12" style="background:#f2f3f8">
                                            <div class="payment-method mt-20 mb-20 pl-20">
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-12">
                                                        <input class="inputdeladd" type="text" placeholder="" style="border: 2px solid #001b71;margin-bottom: 5px;" value="MVP10">
                                                        <br>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12" style="padding-left: 0">
                                                        <button class="button-one submit-button" data-text="coupon" type="submit" style="height: 100%;background:#001b71;">apply</button>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <span>10% discount from MVP Application and Game Design</span>
                                                    </div>
                                                </div>
                                                <h4 class="title-1 title-border mb-20 mt-20 selpaymet" style="font-weight:100">Select payment method</h4>
                                                <div class="payment-accordion">
                                                    <!-- Accordion start  -->

                                                    <h3 class="payment-accordion-toggle active" style="background:#ffa400;color:white;">Use your Loyalty Points <span class="text-right spanh3" style="color:white;float:right;margin-right:30px;">195 SAR</span> </h3>

 
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
                                                        <p>Pay via PayPal; you can pay with your credit card if you don�t have a PayPal account.</p>
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
                                                        <p>Pay via PayPal; you can pay with your credit card if you don�t have a PayPal account.</p>
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


<div style="border: 2px solid #b2bad4">
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
            'background': '#f6f6f6'
            , 'color': '#1d2767'
        });
        $(this).siblings('.active').children('.spanh3').css({
            'color': '#1d2767'
        });
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        $(this).css({
            'background': '#ffa400'
            , 'color': 'white'
        });
        $(this).children('.spanh3').css({
            'color': 'white'
        });
        event.preventDefault();
    });

    $(document).ready(function() {
        console.log("ready!");
    });

</script>
@endsection

