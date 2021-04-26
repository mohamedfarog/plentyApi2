@extends('layout')
@section('content')
<style>
    section.wholetabs {
        width: 90%;
        margin: auto;
    }

    .dinebtn {
        border-radius: 15px !important;
        border: 2px solid white;
        text-transform: none;
        line-height: 35px;
    }

    .hero-subtitle-dine {
        font-size: 30px;
        font-weight: lighter;
        padding: 0;
        margin: 0;
        line-height: 120%;
        color: white;
    }

    .owl-pagination {
        bottom: 10px !important;
        text-align: right;
        width: 98%;
    }

    /* Set height of body and the document to 100% to enable "full page tabs" */
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial;
    }

    /* Style tab links */
    .tablink {
        background-color: #b9b9b9;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
        box-shadow: 0;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        height: 100%;
    }

    #Home {
        background-color: red;
    }

    #News {
        background-color: green;
    }

    #Contact {
        background-color: blue;
    }

    #About {
        background-color: orange;
    }

    .product-info {
        padding: 0 !important;
    }

    .post-title {
        color: black;
        font-weight: 400 !important;
    }

    .featsubtitle {
        color: green;
    }

    .delicacy-shop-logo {
        filter: brightness(0) invert(1);
    }

    .category {
        font-weight: lighter;
        color: black
    }

    .category-active {
        color: #288248;
        text-decoration: underline;
        text-decoration-thickness: 2px;
    }

    .frame {
        width: 250px;
        height: 250px;
        vertical-align: middle;
        text-align: center;
        display: table-cell;
    }

    .imgz {
        max-width: 95%;
        max-height: 90%;
        display: block;
        margin: 0 auto;
        min-width: 100px !important;
    }

    .shoplistmobile {
        justify-content: space-evenly;
        width: 100%;
        display: flex;
        background: #b9b9b9;
        margin-top: 20px;
        flex-wrap: wrap;
        height: 60px;
    }

    .shoplistmobile>button {
        flex: 10%;
        height: 100% !important;
    }

    .mobiletabs {
        display: none;
    }

    .divitext {
        color: white;
        font-size: 24px;
        font-weight: 100;
        font-family: 'Avenir';
    }

    .buttonsshow {
        background: green;
        height: 30px;
        width: 80%;
        text-align: center;
        margin: auto;
        margin-bottom: 20px;
    }

    @media only screen and (max-width: 600px) {
        .catmobile {
            font-size: 16px;
        }

        .tabprod {
            display: block !important;
        }

        .frame {
            width: 400px;
        }

        .wholemobile {
            width: 100% !important;
        }

        .tablinkprod {
            width: 100% !important;
        }

        .heading-banner-area {
            margin: 0 !important;
        }

        .buttonmobile {
            height: 60px;
        }


        .shoplistmobile>button {
            flex: 20%;
            height: 100% !important;
        }

        .shoplistmobile {
            height: 100px;
        }

        .mobiletabs {
            display: block;

        }

        .shoplistmobiletabs>button {
            flex: 100%;
            height: 100% !important;
        }

        .owlmobile {
            height: 100% !important;
        }

        .dinebtn {
            width: 100% !important;
        }

        section.wholetabs {
            width: 100%;
            margin: auto;
        }
    }
</style>
<link rel="stylesheet" href="css/hurst.css">

<input type="hidden" id="shopid" value={{$shop->id}}>
<input type="hidden" id="shopname" value={{$shop->name_en}}>
<div class="heading-banner-area overlay-bg" style="background: url('img/store/SADA/Dine Banner.png') no-repeat scroll center center / cover;margin: 0 5%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2 style="font-weight:lighter;font-size:60px;padding: 100px 0 100px;">BEAUTY</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html" style="font-weight:lighter;">Home</a></li>
                            <li style="font-weight:lighter;">BEAUTY</li>
                            <li style="font-weight:lighter;" id="breadcrumbshopname2">Linen</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tab links -->
<section class="regular slider wholetabs">
    @if(isset($featured_products))
    @foreach($featured_products as $product)

    <div class="single-product ssproduct  col-lg-4 col-xs-12 hidden-md hidden-sm">
        <div class="product-img frame">

            @if ($product->image)
            <a href="{{ url('/product/' . $product->id) }}"><img class="imgz" src="storage/products/{{$product->image}}" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy /></a>
            @else
            <a href="{{ url('/product/' . $product->id) }}"><img class="imgz" src="img/product/plentylogo.png" alt="" loading=lazy /></a>
            @endif

            <div class="product-action clearfix">
            </div>
        </div>
        <div class="product-info clearfix">
            <div class="fix">
                <h4 class="post-title floatcenter feattitle"><a href="{{ url('/product/' . $product->id) }}">{{$product->name_en}}</a></h4>
                <p class="floatcenter hidden-sm featsubtitle">SAR {{$product->price}}</p>
            </div>
            <div class="fix featlineicons">
                <span class="pro-price floatleft"><img class="featicons" src="img/nav/fav.png" loading=lazy>
                </span>
                <span class="pro-rating floatright">
                    <img class="featicons" src="img/nav/bag.png" loading=lazy>
                </span>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</section>

<section class="wholetabs tabsshops">
    <div class="tab shoplistmobile" style="">
        @if(isset($shops))
        @foreach($shops as $shop)
        @if ($loop->first)
        <button class="tablink activetab buttonmobile frame" onclick="shopname({{$shop->id}},'{{$shop->name_en}}','{{$shop->style->header}}')" id="shop{{$shop->id}}">
            <img class="delicacy-shop-logo imgz" src="{{ url('storage/styles/' . $shop->style->header) }}" style="max-height: 100%;">
        </button>
        @else

        <button class="tablink activetab buttonmobile frame" onclick="shopname({{$shop->id}},'{{$shop->name_en}}','{{$shop->style->header}}')" id="shop{{$shop->id}}">
            <img class="delicacy-shop-logo" src="{{ url('storage/styles/' . $shop->style->header) }}" style="max-height: 100%;">
        </button>
        @endif
        @endforeach
        @endif
    </div>
</section>

<section class="mobiletabs wholetabs">

</section>

<section class="wholetabs wholemobile">
    <div id="Sada">

        <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated owlmobile" style="height:380px;">

            <div class="hero-slide overlay" style="background-image:url(img/store/SADA/sadabanner1.png);background-size: cover !important;background-position: unset;">
                <div class="container">
                    <div class="hero-holder" style="display: grid;padding-top:50px;">
                        <div class="hero-message" style="text-align:right;">
                            <h1 class="hero-title nocaps" style="font-size:40px;font-weight:100;text-transform:uppercase">Early Bird Discount
                            </h1>
                            <h2 class="hero-subtitle-dine lines" style="">Order before 7 am and </h2><br>
                            <h2 class="hero-subtitle-dine lines" style="">get 20% discount on</h2><br>
                            <h2 class="hero-subtitle-dine lines" style="">your coffee </h2><br>
                            <div class="buttons-holder" style="">
                                <a href="/" class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-slide overlay" style="background-image:url(img/store/SADA/sadabanner2.png);background-size: cover !important;background-position: unset;">
                <div class="container">
                    <div class="hero-holder" style="display: grid;padding-top:50px;">
                        <div class="hero-message" style="text-align:right;">
                            <h1 class="hero-title nocaps" style="font-size:40px;font-weight:100;text-transform:uppercase">Early Bird Discount
                            </h1>
                            <h2 class="hero-subtitle-dine lines" style="">Order before 7 am and </h2><br>
                            <h2 class="hero-subtitle-dine lines" style="">get 20% discount on</h2><br>
                            <h2 class="hero-subtitle-dine lines" style="">your coffee </h2><br>
                            <div class="buttons-holder" style="">
                                <a href="/" class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-slide overlay" style="background-image:url(img/store/SADA/sadabanner3.png);background-size: cover !important;background-position: unset;">
                <div class="container">
                    <div class="hero-holder" style="display: grid;padding-top:50px;">
                        <div class="hero-message" style="text-align:right;">
                            <h1 class="hero-title nocaps" style="font-size:40px;font-weight:100;text-transform:uppercase">Early Bird Discount
                            </h1>
                            <h2 class="hero-subtitle-dine lines" style="">Order before 7 am and </h2><br>
                            <h2 class="hero-subtitle-dine lines" style="">get 20% discount on</h2><br>
                            <h2 class="hero-subtitle-dine lines" style="">your coffee </h2><br>
                            <div class="buttons-holder" style="">
                                <a href="/" class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <section class="mt-30 mb-30">
            <div style="text-align:center;">
                <h1 style="font-weight:lighter;color:#288248" id="breadcrumbshopname">
                    Simply Put.
                </h1>
            </div>
        </section>
        <section style="width: 100%;margin: auto;margin-bottom:40px;">
            <div class="tabprod" style="justify-content: space-evenly;width:100%;display:flex;margin-top:20px;">
                <button class="tablinkprod" onclick="getBestSeller(this)" id="defaultOpen">
                    <h2 class="category-name category catmobile">
                        Best Seller </h2>
                </button>
                @foreach($product_categories as $product_category)
                <button class="tablinkprod" onclick="getProducts(this,{{$product_category->id}})">
                    <h2 class="category-name category catmobile"> {{$product_category->name_en}} </h2>
                </button>
                @endforeach
            </div>
        </section>
        <section style="margin: auto;width:90%;text-align:center;" id="product-panel">

        </section>
</section>

</div> <!-- end sada -->




</section>


<script>
    $(document).ready(function() {
        document.getElementById("defaultOpen").click();
        $(".active").css("background-color", "black");
        const shop_id = $('#shopid').val();
        const shop_name = $('#shopname').val();
        makeShopActive(shop_id, color = "#2b854b");
        document.getElementById('breadcrumbshopname2').innerHTML = shop_name;
        document.getElementById('breadcrumbshopname').innerHTML = shop_name;
    });
</script>

<script>
    // Making current link activate
    function makeShopActive(shop_id, color) {
        const shop = 'shop' + shop_id
        document.getElementById(shop).style.boxShadow = '0 0 3px #000000';
        document.getElementById(shop).style.backgroundColor = color;
    }

    // Making sub category link active
    function makeCategoryActive(element) {
        var title = document.getElementsByClassName('category-name');
        for (var i = 0; i < title.length; i++) {
            title[i].classList.remove('category-active');
        }
        element.querySelector('h2').classList.add('category-active');

    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    //for ing product based on category
    function getProducts(element, category = 0) {
        $.ajax({
            type: 'GET',
            url: base_url + 'product-by-category/' + category,
            dataType: 'JSON',
            success: function(data) {
                if (data.length) {
                    renderProduct(data)
                    makeCategoryActive(element)


                } else {
                    renderNoProduct()
                    makeCategoryActive(element)
                }
            }
        });
    }
    //getProducts  //for filtering product based on category
    function getBestSeller(element) {
        shop_id = $('#shopid').val();
        $.ajax({
            type: 'GET',
            url: base_url + 'best-seller/' + shop_id,
            dataType: 'JSON',
            success: function(data) {
                if (data) {
                    renderProduct(data)
                    makeCategoryActive(element)
                } else {
                    //raise error already exist
                }
            }
        });
    }

    // For rendering products in product panel
    function renderProduct(data) {
        url = base_url + 'storage/products/'
        let prod_element = ''
        data.forEach(element => {
            prod_element +=
                "<div class='producthover single-product col-lg-3 col-xs-6 hidden-md hidden-sm ' style='margin-bottom:30px;'>" +
                "<div class='product-img frame'>" +
                "<a href='booking/" + element.product_id + "'><img src='" + url + element.url + "' alt='' loading=lazy  class='imgz'/></a>" +

                "<div class='product-action clearfix'></div></div>" +
                "<div class='product-info clearfix'>" +
                "<div class='fix'>" +
                "<h4 class='post-title floatcenter feattitle'><a href='booking/" + element.product_id + "' style=>" + element.name_en + "</a></h4>" +
                "<p class='floatcenter hidden-sm featsubtitle  post-title'>" + "SAR " + element.price + "</p>" +
                "</div>" +
                "</div>" +
                "</div>"

        });
        document.getElementById('product-panel').innerHTML = prod_element
        $('.buttonsshow').css({
            'visibility': 'visible'
        });
    }

    function renderNoProduct() {

        let prod_element = "<h1>Product is not available!</h1>"
        document.getElementById('product-panel').innerHTML = prod_element
    }

    function shopname(shopid, shoppy, imgy) {

        if (typeof(Storage) !== "undefined") {
            localStorage.shopid = shopid;
            localStorage.shopname = shoppy;
            localStorage.shopimg = '{{ url(' / storage / styles / ') }}' + '/' + imgy;
            window.location = base_url + 'beauty' + '/' + shopid;

        } else {
            window.location = base_url + 'beauty' + '/' + shopid;
        }

    }

    $(".producthover").hover(function() {
        $(this).children(".product-img").children(".buttonsshow").css({
            'visibility': 'visible'
        });
        console.log('hover');
    }, function() {
        $(this).children(".product-img").children(".buttonsshow").css({
            'visibility': 'hidden'
        });
        console.log('nohover');
    });
</script>
<script src="js/prodjs.js"></script>



<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>

@endsection