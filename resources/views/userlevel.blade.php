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
        font-family: 'Avenir Bold';
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

</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<section class="page-title text-center bg-light ">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase" style="font-family:'Avenir Bold'">USER LEVEL</h1>

            </div>
        </div>
    </div>
</section>

<section class="mt-30 mb-30">
    <div class="row" style="width:50%;margin:auto">
        <div class="" style="border: 1px solid #001b71;width:120px;float:left;">
            <img src="img/userlevel/sapphire.png">
        </div>

        <div class="align-middle" style="margin-left:5px;border: 1px solid #001b71;width:75%;float:left;padding:0 5px;height:120px;vertical-align:middle;line-height:120px;border-right:20px solid blue">
            <span style="font-size:18px;width:100%;">You are a
                <span style="font-size:18px;font-family:'Avenir Bold'">Sapphire</span>
                <span style="font-size:18px;">user</span>
            </span><br>
        </div>
    </div>
</section>

<section class="mt-30 mb-30">
    <div class="container" style="width:60%;margin:auto">
        <div class="col-md-4 col-sm-12 col-xs-12" style="text-align:center">
            <div>
                <img src="img/userlevel/info.png" style="vertical-align: top;padding-top:15px;">
                <img src="img/userlevel/sapphire.png">
            </div>
            <br>
            <h4 class="boldfont" style="color:#2257f4;font-family'Avenir Bold';font-family:18px;">Sapphire</h4>
            <span>1 SAR</span>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12" style="text-align:center">
            <div style="width:100%;">
                <img src="img/userlevel/info.png" style="vertical-align: top;padding-top:15px;">
                <img src="img/userlevel/emerald.png">
            </div>
            <br>
            <h4 class="boldfont" style="color:#0c9d18;">Emerald</h4>
            <span>19,999 SAR</span>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12" style="text-align:center">
            <div style="width:100%;">
                <img src="img/userlevel/info.png" style="vertical-align: top;padding-top:15px;">
                <img src="img/userlevel/topaz.png">
            </div>
            <br>
            <h4 class="boldfont" style="color:#3fdcec;">Topaz</h4>
            <span>29,999 SAR</span>
        </div>
    </div>
</section>
<section style="width:60%;margin:auto;margin-bottom:50px;">
    <div class="w3-border" style="border-radius:50px;background-color: #e2e2e2;">
        <div class="w3-grey" style="height:20px;width:20%;border-radius:50px;background-color:#ffa400 !important;"></div>
    </div>
</section>

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

