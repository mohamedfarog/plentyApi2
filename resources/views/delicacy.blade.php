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
</style>
<link rel="stylesheet" href="css/hurst.css">


<div class="heading-banner-area overlay-bg"
    style="background: url('img/store/SADA/Dine Banner.png') no-repeat scroll center center / cover;margin: 0 5%;">
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tab links -->
<section class="wholetabs">
    <div class="tab" style="justify-content: space-evenly;width:100%;display:flex;background:#b9b9b9;margin-top:20px;">
        <button class="tablink" onclick="openPage('Linen', this, '#2b854b')">
            <img src="img/dine/linen.png" style="height:30px;">
        </button>

        <button class="tablink activetab" onclick="openPage('Sada', this, '#2b854b')" id="defaultOpen">
            <img src="img/dine/sada.png" style="height:30px;">
        </button>
        <button class="tablink" onclick="openPage('Solid', this, '#2b854b')">
            <img src="img/dine/solid.png" style="height:30px;">
        </button>
        <button class="tablink" onclick="openPage('Mikroulii', this, '#2b854b')">
            <img src="img/dine/mikroulii.png" style="height:30px;">
        </button>
        <button class="tablink" onclick="openPage('Gokasakana', this, '#2b854b')">
            <img src="img/dine/gokasakana.png" style="height:30px;">
        </button>
        <button class="tablink" onclick="openPage('Perimeter', this, '#2b854b')">
            <img src="img/dine/perimeter.png" style="height:30px;">
        </button>
        <button class="tablink" onclick="openPage('Hyphen', this, '#2b854b')">
            <img src="img/dine/hyphen.png" style="height:30px;">
        </button>

        <button class="tablink" onclick="openPage('Portion', this, '#2b854b')">
            <img src="img/dine/portion.png" style="height:30px;">
        </button>
    </div>

    <div id="Linen" class="tabcontent">
        <h3>Linen</h3>

    </div> <!-- end linen -->

    <div id="Sada" class="tabcontent">
        <section>
            <div id="owl-hero" class="owl-carousel owl-theme light-arrows slider-animated" style="height:380px;">

                <div class="hero-slide overlay"
                    style="background-image:url(img/store/SADA/sadabanner1.png);background-size: cover !important;background-position: unset;">
                    <div class="container">
                        <div class="hero-holder" style="display: grid;padding-top:50px;">
                            <div class="hero-message" style="text-align:right;">
                                <h1 class="hero-title nocaps"
                                    style="font-size:50px;font-weight:100;text-transform:uppercase">Early Bird Discount
                                </h1>
                                <h2 class="hero-subtitle-dine lines" style="">Order before 7 am and </h2><br>
                                <h2 class="hero-subtitle-dine lines" style="">get 20% discount on</h2><br>
                                <h2 class="hero-subtitle-dine lines" style="">your coffee </h2><br>
                                <div class="buttons-holder" style="">
                                    <a href="#" class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span
                                            style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-slide overlay"
                    style="background-image:url(img/store/SADA/sadabanner2.png);background-size: cover !important;background-position: unset;">
                    <div class="container">
                        <div class="hero-holder" style="display: grid;padding-top:50px;">
                            <div class="hero-message" style="text-align:right;">
                                <h1 class="hero-title nocaps"
                                    style="font-size:50px;font-weight:100;text-transform:uppercase">Early Bird Discount
                                </h1>
                                <h2 class="hero-subtitle-dine lines" style="">Order before 7 am and </h2><br>
                                <h2 class="hero-subtitle-dine lines" style="">get 20% discount on</h2><br>
                                <h2 class="hero-subtitle-dine lines" style="">your coffee </h2><br>
                                <div class="buttons-holder" style="">
                                    <a href="#" class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span
                                            style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-slide overlay"
                    style="background-image:url(img/store/SADA/sadabanner3.png);background-size: cover !important;background-position: unset;">
                    <div class="container">
                        <div class="hero-holder" style="display: grid;padding-top:50px;">
                            <div class="hero-message" style="text-align:right;">
                                <h1 class="hero-title nocaps"
                                    style="font-size:50px;font-weight:100;text-transform:uppercase">Early Bird Discount
                                </h1>
                                <h2 class="hero-subtitle-dine lines" style="">Order before 7 am and </h2><br>
                                <h2 class="hero-subtitle-dine lines" style="">get 20% discount on</h2><br>
                                <h2 class="hero-subtitle-dine lines" style="">your coffee </h2><br>
                                <div class="buttons-holder" style="">
                                    <a href="#" class="btn btn-lg btn-transparent dinebtn" style="width:35%;"><span
                                            style="font-size:24px;color:green;font-weight:lighter">Order Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> <!-- end hero slider -->
        <section class="mt-30 mb-30">
            <div style="text-align:center;">
                <h1 style="font-weight:lighter;color:#288248">
                    Simply Put.
                </h1>
            </div>
        </section>
        <section style="width: 50%;margin: auto;">
            <div class="tabprod" style="justify-content: space-evenly;width:100%;display:flex;margin-top:20px;">
                <button class="tablinkprod" onclick="">
                    <h2
                        style="font-weight:lighter;color:#288248;text-decoration: underline;text-decoration-thickness: 2px;">
                        Best Seller </h2>
                </button>

                <button class="tablinkprod activetab" onclick="">
                    <h2 style="font-weight:lighter;color:black">Hot </h2>
                </button>
                <button class="tablinkprod" onclick="">
                    <h2 style="font-weight:lighter;color:black">Cold </h2>
                </button>
                <button class="tablinkprod" onclick="">
                    <h2 style="font-weight:lighter;color:black">Sweets </h2>
                </button>

            </div>

        </section>
        <section style="margin: auto;width:90%;text-align:center;">

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle  post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

            <div class="single-product col-lg-3 col-xs-12 hidden-md hidden-sm" style="margin-bottom:30px;">
                <div class="product-img">
                    <a href="/product"><img src="img/product/8.jpg" alt="" loading=lazy /></a>
                    <div class="product-action clearfix">

                    </div>
                </div>
                <div class="product-info clearfix">
                    <div class="fix">
                        <h4 class="post-title floatcenter feattitle"><a href="#">Hot Choco</a></h4>
                        <p class="floatcenter hidden-sm featsubtitle post-title">SAR 60</p>
                    </div>

                </div>
            </div>

        </section>
</section>

</div> <!-- end sada -->

<div id="Solid" class="tabcontent">
    <h3>Solid</h3>
</div> <!-- end solid -->

<div id="Mikroulii" class="tabcontent">
    <h3>Mikroulii</h3>

</div> <!-- end mikroulii -->

<div id="Gokasakana" class="tabcontent">
    <h3>Gokasakana</h3>

</div> <!-- end gokasakana -->

<div id="Perimeter" class="tabcontent">
    <h3>Perimeter</h3>

</div> <!-- end perimeter -->

<div id="Hyphen" class="tabcontent">
    <h3>Hyphen</h3>

</div> <!-- end hyphen -->

<div id="Portion" class="tabcontent">
    <h3>Portion</h3>

</div> <!-- end portion -->



</section>


<script>
$(document).ready(function() {
    document.getElementById("defaultOpen").click();
    $(".active").css("background-color", "black");

});
</script>

<script>
function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
        tablinks[i].style.boxShadow = "";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific color to the button used to open the tab content
    elmnt.style.backgroundColor = color;
    elmnt.style.boxShadow = '0 0 3px #000000';
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script src="js/prodjs.js"></script>
@endsection