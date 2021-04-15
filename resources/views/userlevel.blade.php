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

    .howtext {
        font-size: 20px;
    }

    .userlvlrowuser {
        width: 50%;
        margin: auto
    }

    .userlevelimg {
        border: 1px solid #001b71;
        width: 120px;
        float: left;
    }

    .userleveltxt {
        margin-left: 5px;
        border: 1px solid #001b71;
        width: 75%;
        float: left;
        padding: 0 5px;
        height: 120px;
        vertical-align: middle;
        line-height: 120px;
        border-right: 20px solid blue;
    }

    .containerpoints {
        width: 60%;
        margin: auto
    }

    .containerbar {
        width: 60%;
        margin: auto;
        margin-bottom: 50px;
    }

    .howworkssec {
        width: 70%;
        margin: auto;
        margin-top: 100px;
    }

    .howworkstxt {
        font-weight: 600;
        color: black;
        margin-left: 10%;
    }

    .howworkssecdesc {
        width: 70%;
        margin: auto;
    }

    .title-text {
        margin-left: 10%;
    }

    @media only screen and (max-width: 1000px) {
        .userlvlrowuser {
            width: 95%;
            margin: auto
        }

        .userlevelimg {
            border: 1px solid #001b71;
            width: 30%;
            float: left;
        }

        .userleveltxt {
            width: 65%;
        }

        .containerbar {
            width: 90%;
            margin: auto;
            margin-bottom: 50px;
        }

        .howworkssec {
            width: 100%;
            margin: auto;
            margin-top: 100px;
        }

        .howworkstxt {
            font-weight: 600;
            color: black;
            text-align: center;
            margin: auto;
            padding: 10px 0;
        }

        .howworkssecdesc {
            width: 90%;
            margin: auto;
        }

        .title-text {
            margin-left: 0;
            text-align: center
        }

        .howsworksdivsecdesc {
            width: 100%;
        }

        .howtext {
            width: 100%;
            display: block;
            text-align: center;
        }

        .imgworksdesc {
            margin: auto;
        }
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
    <div class="row userlvlrowuser" style="">
        <div class="userlevelimg" style="">
            <img src="img/userlevel/sapphire.png">
        </div>

        <div class="align-middle userleveltxt" style="">
            <span style="font-size:18px;width:100%;">
                @if(isset($userlevel))

                @if($userlevel == 'NA')
                <span style="font-size:18px;">User level is not applicable for you!</span>
                @else
                You are a<span style="font-size:18px;font-family:'Avenir Bold'"> {{$userlevel}}</span>
                <span style="font-size:18px;">user</span>
                @endif
                @endif

            </span><br>
        </div>
    </div>
</section>

<section class="mt-30 mb-30">
    <div class="container userlvlrowuser containerpoints" style="">
        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center">
            <div>
                <a data-toggle="modal" data-target=".sapphiremodal"><img src="img/userlevel/info.png" style="vertical-align: top;padding-top:15px;">
                    <img src="img/userlevel/sapphire.png">
                </a>
            </div>
            <br>
            <h4 class="boldfont" style="color:#2257f4;font-family'Avenir Bold';font-family:18px;">Sapphire</h4>
            <span>1 SAR</span>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center">
            <div style="width:100%;">
                <a data-toggle="modal" data-target=".emeraldmodal"><img src="img/userlevel/info.png" style="vertical-align: top;padding-top:15px;">
                    <img src="img/userlevel/emerald.png">
                </a>
            </div>
            <br>
            <h4 class="boldfont" style="color:#0c9d18;">Emerald</h4>
            <span>19,999 SAR</span>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center">
            <div style="width:100%;">
                <a data-toggle="modal" data-target=".topazmodal"><img src="img/userlevel/info.png" style="vertical-align: top;padding-top:15px;">
                    <img src="img/userlevel/topaz.png">
                </a>
            </div>
            <br>
            <h4 class="boldfont" style="color:#3fdcec;">Topaz</h4>
            <span>29,999 SAR</span>
        </div>
    </div>
</section>
<section class="containerbar" style="">
    <div class="w3-border" style="border-radius:50px;background-color: #e2e2e2;margin-top:30px;position:relative;display:block;">
        <img src="img/userlevel/checkprogcircle.png" style="position:absolute;top: -35px;left:1%">
        <img src="img/userlevel/greyprogcircle.png" style="position:absolute;top: -35px;left:35%;">
        <img src="img/userlevel/greyprogcircle.png" style="position:absolute;top: -35px;left:65%">
        <img src="img/userlevel/triangle.png" style="position:absolute;top: 30px;left:{{$percentage-2}}%">
        <span style="position:absolute;top: 50px;left:{{$percentage-6}}%">15,450 SAR</span>
        <div class="w3-grey" style="height:20px;width:{{$percentage}}%;border-radius:50px;background-color:#ffa400 !important;"></div>
    </div>
</section>

<section class="bg-light howworkssec" style="margin-bottom:30px;">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h4 class="howworkstxt" style="">How it works?</h4>

            </div>
        </div>
    </div>

</section>
<section class="howworkssecdesc" style="">
    <div class="container relative clearfix howsworksdivsecdesc">
        <div class="title-holder">
            <div class="title-text" style="">
                <div class="row">
                    <img src="img/userlevel/star.png" class="imgworksdesc">
                    <span class="howtext">You earn points everytime you spend at Plenty <span>
                </div>
                <div class="row">
                    <img src="img/userlevel/gift-box.png" class="imgworksdesc">
                    <span class="howtext">Use your points to redeem exciting deals & <span>
                </div>
                <div class="row">
                    <img src="img/userlevel/crown.png" class="imgworksdesc">
                    <span class="howtext">Promotions<span>
                </div>


            </div>
        </div>
    </div>
</section>

<section style="margin-top:50px;margin-bottom:50px;">

</section>
<!-- Modal -->
<div class="modal fade bd-example-modal-sm sapphiremodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width:400px;">
        <div class="modal-content">
            <div style="text-align:center;margin-top:10px">
                <img src="img/userlevel/sapphire.png">
            </div>
            <div style="text-align:center;background:#08298a;padding:10px 0;">
                <span style="font-family:'Avenir Bold';color:white;font-size:24px;">Sapphire</span>
            </div>
            <div style="text-align:center;margin-top:50px">
                <h4 style="color:black;font-weight:600;margin:0"> Get x1 Loyalty Points for every Riyal spent</h4>
                <span style="color:#c8c8c8">(eg. 1000 SAR = 1000 Points)</span>
            </div>
            <div style="text-align:center;margin-top:30px">
                <h4 style="color:black;font-weight:600;margin:0">Get a discount of 1% for Loyalty Point Redeemed</h4>
                <span style="color:#c8c8c8">(eg. 1000 Points = 10 SAR Discount)</span>
            </div>
            <div style="margin-bottom:20px;padding:0 20px;margin-top:50px;">
                <button class="btn" style="width:100%;background:#001b71;font-weight:100;font-size:16px" data-dismiss="modal"> OKAY </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm emeraldmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width:400px;">
        <div class="modal-content">
            <div style="text-align:center;margin-top:10px">
                <img src="img/userlevel/emerald.png">
            </div>
            <div style="text-align:center;background:#11ad1a;padding:10px 0;">
                <span style="font-family:'Avenir Bold';color:white;font-size:24px;">Emerald</span>
            </div>
            <div style="text-align:center;margin-top:50px">
                <h4 style="color:black;font-weight:600;margin:0"> Get x2 Loyalty Points for every Riyal spent</h4>
                <span style="color:#c8c8c8">(eg. 1000 SAR = 2000 Points)</span>
            </div>
            <div style="text-align:center;margin-top:30px">
                <h4 style="color:black;font-weight:600;margin:0">Get a discount of 2% for Loyalty Point Redeemed</h4>
                <span style="color:#c8c8c8">(eg. 1000 Points = 20 SAR Discount)</span>
            </div>
            <div style="margin-bottom:20px;padding:0 20px;margin-top:50px;">
                <button class="btn" style="width:100%;background:#001b71;font-weight:100;font-size:16px" data-dismiss="modal"> OKAY </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-sm topazmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" style="width:400px;">
        <div class="modal-content">
            <div style="text-align:center;margin-top:10px">
                <img src="img/userlevel/topaz.png">
            </div>
            <div style="text-align:center;background:#40daea;padding:10px 0;">
                <span style="font-family:'Avenir Bold';color:white;font-size:24px;">Topaz</span>
            </div>
            <div style="text-align:center;margin-top:50px">
                <h4 style="color:black;font-weight:600;margin:0"> Get x3 Loyalty Points for every Riyal spent</h4>
                <span style="color:#c8c8c8">(eg. 1000 SAR = 3000 Points)</span>
            </div>
            <div style="text-align:center;margin-top:30px">
                <h4 style="color:black;font-weight:600;margin:0">Get a discount of 3% for Loyalty Point Redeemed</h4>
                <span style="color:#c8c8c8">(eg. 1000 Points = 30 SAR Discount)</span>
            </div>
            <div style="margin-bottom:20px;padding:0 20px;margin-top:50px;">
                <button class="btn" style="width:100%;background:#001b71;font-weight:100;font-size:16px" data-dismiss="modal"> OKAY </button>
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
        console.log("ready!");
    });
</script>
@endsection