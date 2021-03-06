@extends('layout')
@section('content')
<style>
    body {
        color: #001b71;
    }

    .totalcolorblue {
        color: #001b71 !important;
    }

    .amount {
        color: #001b71 !important;
        font-weight: 400 !important;
    }

    .totalamount {
        font-weight: 900 !important;
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

    .proceedbtn {
        font-weight: 100 !important;
        font-size: 14px;
    }

    .zzbtnproc::before {
        background: white !important;
    }

    .zzbtnproc:hover {
        background-color: #001b71 !important;
        background: #001b71 !important;
        color: white !important;
    }

    .btn.zzbtnproc:after {
        background-color: #001b71;
        color: white !important;
    }

    button.btn.btn-dark:hover {
        background-color: #001b71;
        color: white !important;
    }

    .proceedbtn {
        color: #001b71
    }

    .product-remove-button:hover {
        background-color: #001b71;
    }

    .btn.btn-dark::after {
        background-color: white;
        color: #001b71 !important;
    }

    .procchks:hover {
        color: #001b71;
    }

    @media only screen and (max-width: 600px) {
        .checkoutbtn {
            margin-top: 20px;
        }

        .tablemobile {
            width: 95% !important;
        }

        .shop_table .product-thumbnail {
            padding: 10px;
            width: 150px;
            max-width: 150px;
            min-width: 150px;
        }

        .product-name {
            padding: 10px;
            width: 150px;
            max-width: 150px;
            min-width: 150px;
        }

        .additembtn {
            width: 100%;
            margin-bottom: 30px;
        }

        .checkoutbtn {
            width: 100%;
        }

        .chkbtn {
            width: 100%;
        }

        #check-button {
            width: 100%;
            margin-top: 10px;

        }
    }

    #check-button {
        background-color: #001b71;
        color: white;
        height: 46px;
    }


    #check-button:hover {
        background-color: white;
        border: 1px solid #001b71;
        color: #001b71;
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
        <div class="container relative tablemobile">
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
                            <tbody id="cart_item_view">

                            </tbody>
                        </table>
                    </div>

                    <div class="row mb-50">
                        <div class="col-md-5 col-sm-12">

                        </div>

                        <div class="col-md-7 col-sm-12">
                            <div class="actions">


                                <a href="/brands" class="btn btn-lg  chkbtn zzbtnproc" style="border: 1px solid #001b71;"><span class="proceedbtn" style="">add item</span></a>

                                <a onclick="proceedCheckout()" id="check-button" class="btn btn-lg">
                                    <div style="line-height:50px;">proceed to checkout</div>
                                </a>

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
                                        <span class="amount" id="sub_total"></span>
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
                                        <strong><span class="amount totalamount" id="order_total"></span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end col cart totals -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section> <!-- end cart -->

    <script>
        function renderCartList() {
            let cart = CartSerializer(getCartLocal())
            let template = '';

            var base_url = $('meta[name=base_url]').attr('content');
            if (cart.cart_items.length > 0) {
                cart.cart_items.forEach(item => {
                    var point_event = "style='pointer-events: auto;'"
                    if (item.category === "Beauty") {
                        point_event = "style='pointer-events: none;'"
                    }
                    template = template +
                        "<tr class='cart_item' >" +
                        "<td class='product-thumbnail'>" +
                        "<a href='/product/" + item.id + "'>" +
                        "<img src= '" + item.image_url + "' alt=''>" +
                        "</a>" +
                        "</td>" +
                        "<td class='product-name'>" +
                        "<a href='/product/" + item.id + "' style='font-size:16px;color: #001b71;font-weight:900;'>" + item.name + "</a>" +
                        "<ul>" +
                        renderSubCategory(item) +
                        "</ul>" +
                        "</td>" +
                        "<td class='product-price'>" +
                        "<span class='amount'>SAR " + item.price + "</span>" +
                        "</td>" +
                        "<td class='product-quantity'>" +
                        "<div class='quantity buttons_added'>" +
                        "<input type='number' step='1' min='0' max='" + item.stock + "' id ='quantity" + item.id + "-" + item.size_id + "'value=" + item.quantity + " title='Qty' class='input-text qty text' disabled>" +
                        "<input type='hidden' id ='stock" + item.id + "-" + item.size_id + "' value=" + item.stock + ">" +
                        "<div class='quantity-adjust'>" +
                        "<a id='plus" + item.id + "-" + item.size_id + "' class='plus cart-plus-button' data-cat='" + item.category + "'" + point_event + " >" +
                        "<i class='fa fa-angle-up'></i>" +
                        "</a>" +
                        "<a id='minus" + item.id + "-" + item.size_id + "' class='minus cart-minus-button' data-cat='" + item.category + "' " + point_event + " >" +
                        "<i class='fa fa-angle-down'></i>" +
                        "</a>" +
                        "</div>" +
                        "</div>" +
                        "</td>" +
                        "<td class='product-subtotal'>" +
                        "<span class='amount' id= 'cart-item-price" + item.id + "-" + item.size_id + "'>SAR " + item.total_price() + "</span>" +
                        "</td>" +
                        "<td class='product-remove'>" +
                        "<a class='remove product-remove-button' title='Remove this item'id= 'cart-item-remove" + item.id + "-" + item.size_id + "-" + item.timeslot_id + "-" + item.color_id + "'>" +
                        "<i class='ui-close'></i>" +
                        "</a>" +
                        "</td>" +
                        "</tr>"
                });
            }
            $('#cart_item_view').html(template);
        }
        $(document).ready(function() {

            var cart = CartSerializer(getCartLocal())
            renderCartList()
            document.getElementById('sub_total').innerHTML = "SAR " + cart.subTotal()
            document.getElementById('order_total').innerHTML = "SAR " + cart.orderTotal()

            $(".cart-plus-button").on('click', function(event) {
                if ($(this).attr('data-cat') !== "Beauty") {
                    let id = $(this).attr("id").slice(4);
                    pro_id = id.split("-")[0]
                    size_id = id.split("-")[1]
                    let stock = parseInt(document.getElementById('stock' + pro_id + "-" + size_id).value);
                    let quantity = parseInt(document.getElementById('quantity' + pro_id + "-" + size_id).value);
                    if (stock > quantity) {
                        if (parseInt(size_id)) {
                            cart.cart_items.find(item => (item.id === pro_id) && (item.size_id === size_id)).addQuantity();
                            document.getElementById('cart-item-price' + pro_id + "-" + size_id).innerHTML = 'SAR ' + cart.cart_items.find(item => (item.id === pro_id) && (item.size_id === size_id)).total_price();

                        } else {
                            cart.cart_items.find(item => item.id === pro_id).addQuantity();
                            document.getElementById('cart-item-price' + pro_id + "-" + size_id).innerHTML = 'SAR ' + cart.cart_items.find(item => item.id === pro_id).total_price();
                        }

                        storeCartLocal(JsonCartSerializer(cart));
                        document.getElementById('sub_total').innerHTML = "SAR " + cart.subTotal()
                        document.getElementById('order_total').innerHTML = "SAR " + cart.orderTotal()
                    }
                }
                renderNavCart();

            });
            $(".cart-minus-button").on('click', function(event) {
                if ($(this).attr('data-cat') !== "Beauty") {
                    let id = $(this).attr("id").slice(5);
                    pro_id = id.split("-")[0]
                    size_id = id.split("-")[1]
                    let quantity = parseInt(document.getElementById('quantity' + pro_id + "-" + size_id).value);

                    if (quantity > 1) {
                        if (parseInt(size_id)) {

                            cart.cart_items.find(item => (item.id === pro_id) && (item.size_id === size_id)).substractQuantity();

                            document.getElementById('cart-item-price' + pro_id + "-" + size_id).innerHTML = 'SAR ' + cart.cart_items.find(item => (item.id === pro_id) && (item.size_id === size_id)).total_price();


                        } else {
                            cart.cart_items.find(item => item.id === pro_id).substractQuantity();

                            document.getElementById('cart-item-price' + pro_id + "-" + size_id).innerHTML = 'SAR ' + cart.cart_items.find(item => item.id === pro_id).total_price();

                        }
                        storeCartLocal(JsonCartSerializer(cart));

                        document.getElementById('sub_total').innerHTML = "SAR " + cart.subTotal()
                        document.getElementById('order_total').innerHTML = "SAR " + cart.orderTotal()
                    }
                }
                renderNavCart();

            });

            $(".product-remove-button").on('click', function(event) {

                let id = $(this).attr("id").slice(16);
                cart.removeItem(id);

                storeCartLocal(JsonCartSerializer(cart));
                // problem with innerHTML so reloading
                location.reload();

                document.getElementById('sub_total').innerHTML = "SAR " + cart.subTotal();
                document.getElementById('order_total').innerHTML = "SAR " + cart.orderTotal();
            });

        });



        function renderSubCategory(item) {
            let template = ''
            if ((item.category === 'Fine Dining') && (item.is_product_variant === 'true')) {
                template = "<li class='colorgrey'>" + item.size + "</li>"

            } else if (item.category === 'Beauty') {
                template = "<li class='colorgrey'>" + item.time + "</li>"
            } else {
                //
            }

            return template;
        }
    </script>

    <div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
        @include('footer')
    </div>
    @endsection