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
        min-width: 95% !important;
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
            flex: 25%;
            height: 100% !important;
        }

        .shoplistmobile {
            height: 100%;
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


    .delecacy-opt-text {
        border: none;
        color: #b9aeae;
        font-size: 20px;
        font-weight: 900;
    }

    .panel-body {
        border: 2px solid white;
        border-radius: 30px;
        margin: 30px 30px 10px 30px;
        height: 300px;
        width: 300px;
        background-size: cover;
        margin: auto;
    }

    .panel-body:hover {
        border: 2px solid rgb(43, 133, 75);
        cursor: pointer;
    }

    #delicacy-opt2 {
        background-image: url('img/booking/pick-up.png');
    }

    #delicacy-opt1 {
        background-image: url('img/booking/table.png');
    }


    #delicacy-opt1:hover {
        background-image: url('img/booking/table-selected.png');
    }

    #delicacy-opt2:hover {
        background-image: url('img/booking/pick-up-selected.png');
    }

    #delicacy-opt1:hover+div {
        color: rgb(43, 133, 75);
    }

    #delicacy-opt2:hover+div {
        color: rgb(43, 133, 75);
    }

    .day-booking {
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px;
        height: 80px;
        width: 80px;
        padding: 5px;
        margin-right: 0px;
        font-size: large;
        font-weight: 900;
    }

    .day-booking:hover {
        box-shadow: 0px 0px 5px 3px #d3d3d3;
    }

    #time-slot {
        display: inline-block;

    }

    .time-slot-card {
        display: inline-block;
        justify-content: center;
        align-items: center;
        background-color: #288248;
        color: white;
        margin: 10px;
        border-radius: 30px;
        padding: 20px;
        font-size: large;
    }

    .time-slot-card:hover {
        cursor: pointer;
    }



    .nuser-table {
        padding: 50px;

    }

    .nuser-table:hover {
        filter: opacity(0.5) drop-shadow(0 0 0 green);
        border-radius: 30px;
        border: 2px solid #288248;
    }

    .user-select {
        filter: opacity(0.5) drop-shadow(0 0 0 green);
        border-radius: 30px;
        border: 2px solid #288248;
    }

    .day-select {
        box-shadow: 0px 0px 5px 3px #d3d3d3;
    }

    .slot-select {
        box-shadow: 0px 0px 5px 3px #d3d3d3;
    }
</style>
<link rel="stylesheet" href="css/hurst.css">

<input type="hidden" id="shopid" value={{$shop->id}}>
<input type="hidden" id="shopname" value="{{$shop->name_en}}">
<div class="heading-banner-area overlay-bg" style="background: url('img/store/SADA/Dine Banner.png') no-repeat scroll center center / cover;margin: 0 5%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2 style="font-weight:lighter;font-size:60px;padding: 100px 0 100px;">DINE</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html" style="font-weight:lighter;">Home</a></li>
                            <li style="font-weight:lighter;">DINE</li>
                            <li style="font-weight:lighter;" id="breadcrumbshopname">Linen</li>
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

            <img class="delicacy-shop-logo imgz" src="{{$shop->style->header}}" style="max-height: 100%;">
        </button>
        @else

        <button class="tablink activetab buttonmobile frame" onclick="shopname({{$shop->id}},'{{$shop->name_en}}','{{$shop->style->header}}')" id="shop{{$shop->id}}">

            <img class="delicacy-shop-logo" src="{{$shop->style->header}}" style="max-height: 100%;">
        </button>
        @endif
        @endforeach
        @endif
    </div>
</section>



<section class="wholetabs wholemobile">
    <div id="Sada" style="display:none">

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
                                <a class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
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
                                <a class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
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
                                <a class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <section class="mt-30 mb-30">
            <div style="text-align:center;">
                <h1 style="font-weight:lighter;color:#288248" id="breadcrumbshopname2">

                </h1>
            </div>
        </section>
        <section style="width: 100%;margin: auto;">
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
            <div style="margin: auto;width:90%;text-align:center;" id="product-panel">
        </section>
    </div>

    </div> <!-- end sada -->

    <section id="book-table" style="margin: auto;width:90%;text-align:center;margin-top:100px;margin-bottom:100px;display:none">
        <div class="row" id="booking-st1">
            <h4 style="margin-bottom:50px;">Please select the number of people </h4>
            <div class="col-lg-3 col-md-3 col-sm-3 col-3"><img class="nuser-table" src="/img/booking/users1.png" alt="" onclick="userNumber(this,1)"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-3"><img class="nuser-table" src="/img/booking/users2.png" alt="" onclick="userNumber(this,2)"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-3"><img class="nuser-table" src="/img/booking/users3.png" alt="" onclick="userNumber(this,3)"></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-3"><img class="nuser-table" src="/img/booking/users4.png" alt="" onclick="userNumber(this,4)"></div>
        </div>

        <div class="row" style="margin-top:100px;visibility: hidden;" id="booking-st2">
            <h4 style="margin-bottom:20px;">Select the Date</h4>
            <div id="day-for-table">

                <div id="date"></div>
            </div>
        </div>
        <div class="row" style="margin-top:100px;visibility:hidden;" id="booking-st3">
            <h4 style="margin-bottom:20px;">Select the Time</h4>
            <div id="day-for-table">
                <div id="time-slot" class="slider"></div>
            </div>

        </div>
    </section>

    <section id="switch-delecacy" style="margin: auto;width:90%;text-align:center;margin-top:100px;margin-bottom:100px">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default" style="border: none;">
                    <div class="panel-body" id="delicacy-opt1" onclick="renderBookTable()">

                    </div>
                    <div class="panel-footer delecacy-opt-text">
                        Book Table</div>
                </div>
            </div>
            <div class=" col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default" style="border: none;">
                    <div class="panel-body" id="delicacy-opt2" onclick="loadProducts()">

                    </div>
                    <div class="panel-footer delecacy-opt-text">
                        Pick Up
                    </div>
                </div>


            </div>
        </div>

    </section>

</section>


<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
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

    //for filtering product based on category
    function getProducts(element, category = 0) {
        var base_url = $('meta[name=base_url]').attr('content');
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
        var base_url = $('meta[name=base_url]').attr('content');
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
        var base_url = $('meta[name=base_url]').attr('content');
        url = base_url + 'storage/products/'
        let prod_element = ''
        data.forEach(element => {
            prod_element +=
                "<div class='producthover single-product col-lg-3 col-xs-6 hidden-md hidden-sm ' style='margin-bottom:30px;'>" +
                "<div class='product-img frame'>" +
                "<a href='/product/" + element.product_id + "'><img src='" + url + element.url + "' alt='' loading=lazy  class='imgz'/></a>" +
                "<div class='fix buttonsshow' style=''>" +
                "<span class='pro-price '><img class='featicons' src='img/nav/bag.png' loading=lazy style='width:25px;min-width:25px;filter: brightness(0) invert(1);'></span>" +
                "<span class='divitext' style=''> | </span> " +
                "<span class='pro-rating '><img class='featicons' src='img/nav/search.png' loading=lazy style='width:25px;min-width:25px;filter: brightness(0) invert(1);'></span>" +
                "</div>" +
                "<div class='product-action clearfix'></div></div>" +
                "<div class='product-info clearfix'>" +
                "<div class='fix'>" +
                "<h4 class='post-title floatcenter feattitle'><a href='/product/" + element.product_id + "'>" + element.name_en + "</a></h4>" +
                "<p class='floatcenter hidden-sm featsubtitle  post-title'>" + "SAR " + element.price + "</p>" +
                "</div>" +
                "</div>" +
                "</div>"

        });
        document.getElementById('product-panel').innerHTML = prod_element
        $('.buttonsshow').css({
            'visibility': 'hidden'
        });
    }

    function renderNoProduct() {

        let prod_element = "<h1>Product is not available!</h1>"
        document.getElementById('product-panel').innerHTML = prod_element
    }

    function shopname(shopid, shoppy, imgy) {
        var base_url = $('meta[name=base_url]').attr('content');
        if (typeof(Storage) !== "undefined") {
            localStorage.shopid = shopid;
            localStorage.shopname = shoppy;
            localStorage.shopimg = '{{ url(' / storage / styles / ') }}' + '/' + imgy;
            window.location = base_url + 'delicacy/' + shopid;

        } else {
            window.location = base_url + 'delicacy/' + shopid;
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

    function loadProducts() {
        document.getElementById("Sada").style.display = "block";
        document.getElementById("switch-delecacy").style.display = "none";

    }

    function renderBookTable() {
        document.getElementById("book-table").style.display = "block";
        document.getElementById("switch-delecacy").style.display = "none";
        renderDates();
    }

    function renderDates() {
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        DaysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        var template = ""
        var day = new Date();
        template = template + "<div style='display:inline-block' onclick='onDayClick(this," + day.getDate() + "," + day.getMonth() + "," + day.getFullYear() + ")'><div class='day-booking'>Today" +
            "</div>" +
            "<div>" +
            DaysOfWeek[day.getDay()] +
            "</div>" +
            "</div>"
        var tomorrow = new Date();

        for (var i = 1; i < 10; i++) {
            tomorrow.setDate(tomorrow.getDate() + 1)
            template = template + "<div style='display:inline-block' onclick='onDayClick(this," + tomorrow.getDate() + "," + tomorrow.getMonth() + "," + tomorrow.getFullYear() + ")'><div class='day-booking'>" + tomorrow.getDate() + "<br/>" +
                months[tomorrow.getMonth()] + "</div>" +
                "<div>" +
                DaysOfWeek[tomorrow.getDay()] +
                "</div></div>"
        }

        document.getElementById("date").innerHTML = template;
    }

    function onDayClick(ele, day, month, year) {
        console.log(ele);
        $(".day-booking").removeClass("day-select");

        ele.childNodes[0].classList.add("day-select");
        console.log(day, month + 1, year);
        $("#booking-st3").css("visibility", "visible");
        renderTimeSlot();
    }

    function renderTimeSlot() {
        var template = ""

        for (var i = 0; i < 10; i++) {
            template = template + "<div  class='time-slot-card' onclick='slotSelected(this," + 1 + ")'><div>" +
                "10:20" +
                "</div><div>" +
                "10:40" +
                "</div></div>"
        }
        document.getElementById("time-slot").innerHTML = template;

    }

    function slotSelected(ele, n) {
        console.log(ele)
        $(".time-slot-card").removeClass("slot-select");
        ele.classList.add("slot-select");

    }

    function userNumber(ele, n) {
        $(".nuser-table").removeClass("user-select");
        $("#booking-st2").css("visibility", "hidden");
        $("#booking-st3").css("visibility", "hidden");
        ele.classList.add("user-select");
        $("#booking-st2").css("visibility", "visible");
    }
</script>
<script src="js/prodjs.js"></script>


@endsection