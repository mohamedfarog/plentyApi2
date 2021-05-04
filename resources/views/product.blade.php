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

    .addtobagbtn :hover {
        cursor: pointer;
    }

    .stock-error {
        color: red;

        display: none;
    }

    .product-img {
        width: 100%;
        margin-bottom: 0 !important;
    }

    #quantity {
        color: green;
        font-size: 18px;
    }

    .qtybutton {
        color: black;
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

        .centermobile {
            text-align: center;
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
                            <li><a href="/">DELICACY</a></li>
                            @if(isset($shop->name_en))
                            <li>{{$shop->name_en}}</li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@if(isset($product))
<div class="product-area single-pro-area pt-30 pb-30 product-style-2">
    <div class="container contmobile" style="background-color:#f2f3f8">
        <div class="row shop-list single-pro-info no-sidebar">
            <!-- Single-product start -->
            <div class="col-lg-12" style="padding:0;">
                <div class="single-product clearfix" style="background-color:#f2f3f8;padding: 10px;">
                    <!-- Single-pro-slider Big-photo start -->
                    <div class="col-lg-4">
                        <div class="single-pro-slider single-big-photo view-lightbox slider-for frame" style="width:100% !important">
                            <div>
                                <div class="frame">
                                    @if ($product->image)
                                    <img class="imgz" src="storage/products/{{$product->image}}" alt="" loading=lazy />
                                    @else
                                    <img class="imgz" src="img/product/Main.png" alt="" loading=lazy />
                                    @endif
                                </div>
                                <div class="fix featlineicons">
                                    <span class="pro-price floatleft" onclick="MakeFavourite({{$product->id}})"><img class="featicons" src="img/nav/fav.png" style="width:25px;" loading=lazy>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single-pro-slider Big-photo end -->
                    <div class="product-info mt-50" style="padding:0 15px">
                        <div class="fix">
                            <h4 class="post-title floatleft" style="font-size:24px;font-weight:bolder;line-height:200%;font-family:'Avenir';color:black;">
                                {{$product->name_en}}</h4>
                        </div>
                        <div class="fix mb-30">
                            @if($sizes->count())
                            <span class="pro-price" id="pro-price" style="font-size:24px;color:#2c864d;font-weight:lighter;">AED
                                {{$sizes->first()->price}}</span>
                            @else
                            <span class="pro-price" id="pro-price" style="font-size:24px;color:#2c864d;font-weight:lighter;">AED
                                {{$product->price}}</span>
                            @endif
                        </div>
                        <div class="product-description">
                            <p style="font-size:18px;color:black;"> {{$product->desc_en}}</p>
                        </div>
                        <!-- color start -->

                        <!-- color end -->
                        <!-- Size start -->
                        <span class="color-title text-capitalize mb-20" style="font-size:18px;text-transform:uppercase">size</span>
                        <form id="product-form">
                            <input type="hidden" id="name" name="name" value="{{$product->name_en}}">
                            <input type="hidden" id="shop_id" name="shop_id" value="{{$product->shop_id}}">
                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                            <input type="hidden" id="image_url" name="image_url" value="{{$product->image}}">
                            @if($shop->cat_id)
                            <input type="hidden" id="cat_id" name="cat_id" value="{{$shop->cat_id}}">
                            @endif
                            @if($sizes->count())
                            <input type="hidden" id="size_id" name="size_id" value="{{$sizes->first()->id}}">
                            <input type="hidden" id="size" name="size" value="{{$sizes->first()->value}}">
                            <input type="hidden" id="price" name="price" value="{{$sizes->first()->price}}">
                            <input type="hidden" id="stock" name="stock" value="{{$sizes->first()->stocks}}">
                            <input type="hidden" id="is_product_variant" name="is_product_variant" value=true>
                            <div class="size-filter single-pro-size mb-35 ml-30 clearfix row">
                                <ul>
                                    <select name="sizes" id="sizes" onchange="changePriceOnSize({{$sizes}})">
                                        @foreach($sizes as $size)
                                        @if ($loop->first)
                                        <option value="{{$size->id}}" selected>{{$size->value }}</option>
                                        @else
                                        <option value="{{$size->id}}">{{$size->value }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </ul>
                            </div>
                            @else

                            <input type="hidden" id="price" name="price" value="{{$product->price}}">
                            <input type="hidden" id="stock" name="stock" value="{{$product->stock}}">
                            @endif
                            <div class="clearfix">
                                <div class="cart-plus-minus" style="width:50%;background:#e1e0e5;">
                                    <div class="dec qtybutton" onclick="substractQuantity()">-</div>
                                    <input type="text" id="quantity" value="1" name="quantity" class="cart-plus-minus-box" style="background: #e1e0e5 none repeat scroll 0 0;">
                                    <div class="inc qtybutton" onclick="addQuantity()">+</div>
                                </div>
                            </div>
                            <div class="stock-error" id="stock-error">

                                Out of stock

                            </div>
                            <!-- Size end -->
                            <div style="height:30px;">
                            </div>
                            <div class="centermobile" style="margin-top:30px;">
                                <a class=" addtobagbtn" onclick="addProductBag()">
                                    <span class="addtobagheader" style="padding-top:10px !important;">
                                        Add to Bag
                                    </span>
                                    <img src="img/product/bag.png" style="width:30px;margin-left:10px;">

                                </a>
                            </div>
                        </form>
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
@endif
@if(count($addons)>0)
<section style="width:90%;text-align:left;margin:auto; background-color:#f2f3f8">
    <h1 style="padding: 30px;margin-bottom: 0;padding-bottom:0;font-size:28px;color:black;font-weight: lighter;">
        TRY IT WITH
    </h1>
</section>
<section class="tryprodslider slider" style="width:90%;text-align:center;margin:auto; background-color:#f2f3f8">

    @foreach($addons as $tw)

    <div class="brand-slide " style="border:2px solid transparent;">
        <div class="product-img">
            <div class="frame">

                <a href="{{ url('/product/' . $tw->id) }}">
                    <img class="imgz" src="img/product/plentylogo.png" alt="" loading=lazy />
                </a>

                <div class="product-action clearfix">

                </div>
            </div>
            <h4 class="tryitheader" style="text-align:left;padding:10px;"> {{$tw->name_en}}</h4>
        </div>
    </div>

    @endforeach



</section>
@endif
<script>
    $(document).ready(function() {
        $(".brand-slide").hover(function() {
            $(this).css({
                'border': '2px solid black'
            });
        }, function() {
            $(this).css({
                'border': '2px solid transparent'
            });
        });

        // for force reloading for resetting form
        var perfEntries = performance.getEntriesByType("navigation");

        if (perfEntries[0].type === "back_forward") {
            location.reload(true);
        }


    });


    function substractQuantity() {
        var cart = CartSerializer(getCartLocal())
        const current = parseInt(document.getElementById("quantity").value)
        document.getElementById("stock-error").style.display = "none";
        if (current > 1) {
            document.getElementById("quantity").value = current - 1
        } else {
            document.getElementById("stock-error").innerHTML = "Required minimum quantity: 1";
            document.getElementById("stock-error").style.display = "block";
        }
        if (availableStock() < 0) {
            document.getElementById("stock-error").innerHTML = "Out of stock";
            document.getElementById("stock-error").style.display = "block";
        }

    }

    function addQuantity() {
        const current = parseInt(document.getElementById("quantity").value)
        document.getElementById("stock-error").style.display = "none";
        if (availableStock() < 1) {
            document.getElementById("stock-error").innerHTML = "Out of stock";
            document.getElementById("stock-error").style.display = "block";
        }
        document.getElementById("quantity").value = current + 1

    }

    function availableStock() {
        let size_id = (document.getElementById("size_id")) ? document.getElementById("size_id").value : null;
        let product_id = document.getElementById("product_id").value || null;
        let purchased = checkCurrentItemNumber(product_id, size_id);
        let current = parseInt(document.getElementById("quantity").value)
        let total_quantity = parseInt(purchased) + parseInt(current);

        let stock = parseInt(document.getElementById("stock").value)
        if (stock - total_quantity < 0) {
            return -1;
        } else {
            return stock - total_quantity;
        }
        return
    }

    function checkCurrentItemNumber(id = null, size_id = null) {
        let cart = CartSerializer(getCartLocal())
        let purchased = 0
        if (cart.cart_items.length > 0) {
            if (size_id) {
                purchased = (cart.cart_items.find(item => (item.id === id) && (item.size_id === size_id))) ? cart.cart_items.find(item => (item.id === id) && (item.size_id === size_id)).quantity : 0;
            } else {
                purchased = (cart.cart_items.find(item => (item.id === id))) ? cart.cart_items.find(item => (item.id === id)).quantity : 0;
            }
        }

        return purchased;
    }

    function addProductBag() {
        const form = new FormData(document.getElementById("product-form"))
        let shop_id = function() {
            const cat_id = form.get('cat_id')
            return cat_id;
        }
        let is_variant = function() {
            const cat_id = form.get('cat_id')
            return cat_id;
        }

        let shop_category = JSON.parse(localStorage.getItem('shop_category')).filter(function(category) {
            return category.id == shop_id();
        });

        let item = {
            id: form.get('product_id')
            , price: form.get('price')
            , name: form.get('name')
            , image_url: form.get('image_url') || null
            , is_product_variant: form.get('is_product_variant') || false
            , size: form.get('size') || null
            , size_id: form.get('size_id') || null
            , color: form.get('color') || null
            , color_id: form.get('color_id') || null
            , quantity: form.get('quantity') || null
            , date: form.get('date') || null
            , time: form.get('time') || null
            , stock: form.get('stock') || null
            , shop_id: form.get('shop_id') || null
            , category: shop_category[0].name_en || null
        , }
        let product = new CartItem(item)
        let cart = CartSerializer(getCartLocal());
        if (cart.cart_items.length > 0) {
            if (product.category == "Fine Dining" || product.category == "Fashion") {
                let flag = false;
                for (i = 0; i < cart.cart_items.length; i++) {
                    if (cart.cart_items[i].id === product.id && product.size_id === cart.cart_items[i].size_id) {
                        let quantity = parseInt(cart.cart_items[i].quantity) + parseInt(product.quantity);
                        if (quantity <= cart.cart_items[i].stock) {
                            cart.cart_items[i].quantity = quantity;
                        } else {
                            document.getElementById("stock-error").innerHTML = "Out of stock";
                            document.getElementById("stock-error").style.display = "block";
                            showAlertError(`Out of stock`)

                        }

                        flag = true;
                        break
                    }
                }
                if (flag) {
                    storeCartLocal(JsonCartSerializer(cart));
                    renderNavCart()
                    showAlertSuccess(`${item.name} added X ${item.quantity}`)

                    return;

                } else {
                    cart.addItem(product);
                    showAlertSuccess(`${item.name} added X ${item.quantity}`)

                }

            }
        } else {
            cart.addItem(product);
            showAlertSuccess(`${item.name} added`)

        }

        storeCartLocal(JsonCartSerializer(cart));
        renderNavCart()

    }



    function changePriceOnSize(sizes) {
        const size = document.getElementById("sizes").value
        const form = new FormData(document.getElementById("product-form"))
        var currentSize = sizes.filter(function(sz) {
            return sz.id == size;
        });

        if (currentSize[0]) {
            document.getElementById("stock-error").style.display = "none";
            updateInputField('price', currentSize[0].price)
            updateInputField('stock', currentSize[0].stocks)
            updateInputField('size', currentSize[0].value)
            updateInputField('size_id', currentSize[0].id)
            if (form.get('stock') > currentSize[0].stocks) {
                document.getElementById("quantity").value = 1;
            }
            document.getElementById("pro-price").innerHTML = 'AED ' +
                currentSize[0].price;

        }
    }

</script>
<script src="js/prodjs.js"></script>
<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection

