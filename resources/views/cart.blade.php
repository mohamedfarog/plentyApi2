@extends('layout')
@section('content')
<style>
    body {
        color: #001b71;
    }
    .totalcolorblue{
        color: #001b71 !important; 
    }
    .amount {
        color: #001b71 !important;
        font-weight: 600 !important;
    }

    .colorgrey {
        color: grey;
        font-weight: 500;
    }

    .itemtitle {
        color: #001b71 !important;
        font-weight: 700 !important;
    }

    .bottom-line.full-grey::after {
        width: 100%;
        border-color: #b2bad4 !important;
        margin-top: 16px;
    }

    .bg-light {
        background-color: #f2f3f8;
    }

    .shop_table thead {
        border-bottom: 2px solid #b2bad4;
    }

    input.btn.btn-stroke,
    button.btn.btn-stroke {
        border: 2px solid #001b71;
    }

    .btn.btn-dark::before {
        background-color: #001b71;
    }

    .additembtn {
        color: #001b71 !important;
        font-size: 14px;
        font-weight: 100 !important;
    }
    .proceedbtn{
        font-weight: 100 !important;
        font-size: 14px;
    }
</style>

<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase" style="font-family:'Avenir Bold'">Shopping Bag</h1>

            </div>
        </div>
    </div>
</section>

<div class="content-wrapper oh">

    <!-- Cart -->
    <section class="section-wrap shopping-cart">
        <div class="container relative">
            <div class="row">

                <div class="col-md-12">
                    <div class="table-wrap mb-30">
                        <table class="shop_table cart table">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="2">Item(s)</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal" colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="img/shop/shop_item_3.jpg" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#" class="itemtitle">Gray Jacket</a>
                                        <ul>
                                            <li class="colorgrey">Size: M</li>
                                            <li class="colorgrey">Color: White</li>
                                        </ul>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">SAR 1250.00</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text">
                                            <div class="quantity-adjust">
                                                <a href="#" class="plus">
                                                    <i class="fa fa-angle-up"></i>
                                                </a>
                                                <a href="#" class="minus">
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">SAR 1250.00</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="#" class="remove" title="Remove this item">
                                            <i class="ui-close"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr class="cart_item">
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <img src="img/shop/shop_item_7.jpg" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#" class="itemtitle">Hair Style</a>
                                        <ul>
                                            <li class="colorgrey">Booking: 4:30, THU</li>
                                            <li class="colorgrey">25 March 2021</li>
                                        </ul>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">SAR 240.00</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <span class="colorgrey" style="font-size:24px;">__ __</span>
                                        </div>
                    </div>
                    </td>
                    <td class="product-subtotal">
                        <span class="amount">SAR 240.00</span>
                    </td>
                    <td class="product-remove">
                        <a href="#" class="remove" title="Remove this item">
                            <i class="ui-close"></i>
                        </a>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                </div>

                <div class="row mb-50">
                    <div class="col-md-5 col-sm-12">

                    </div>

                    <div class="col-md-7">
                        <div class="actions">
                            <input type="submit" name="update_cart" value="ADD ITEM" class="btn btn-lg btn-stroke additembtn">
                            <div class="wc-proceed-to-checkout">
                                <a href="checkout.html" class="btn btn-lg btn-dark"><span class="proceedbtn">proceed to checkout</span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-6 shipping-calculator-form">

            </div> <!-- end col shipping calculator -->

            <div class="col-md-6">
                <div class="cart_totals">
                    <h2 class="heading relative bottom-line full-grey uppercase mb-30">BAG TOTAL</h2>

                    <table class="table shop_table">
                        <tbody>
                            <tr class="cart-subtotal">
                                <th class="totalcolorblue"> Subtotal</th>
                                <td>
                                    <span class="amount">SAR 1490.00</span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th class="totalcolorblue">Shipping</th>
                                <td>
                                    <span class="amount">Free Shipping</span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th class="totalcolorblue">Order Total</th>
                                <td>
                                    <strong><span class="amount">SAR 1490.00</span></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div> <!-- end col cart totals -->

        </div> <!-- end row -->


</div> <!-- end container -->
</section> <!-- end cart -->


<div style="border: 2px solid #b2bad4">
    @include('footer')
</div>
@endsection

