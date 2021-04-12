@extends('layout')
@section('content')
<style>
    body {
        color: #001b71;
    }

    .product-img {
        margin-bottom: 0;
    }

    .trackprodslide {
        padding: 0 5px;
    }

    .slick-slide {
        margin: 0px 5px;
    }

    .trackorderdiv {
        width: 100%;
        margin: auto;
        padding: 2% 5%;
    }

    .trackorderdiv:nth-child(even) {
        background: #f2f3f8
    }

    .modal-dialog {
        width: 70%;
    }

    .modal-header {
        border-bottom: 0;
        padding: 15px 15px;
    }

    .modal-footer {
        border-top: 0;
    }

    .totext {
        color: #001b71 !important;
    }

    @media only screen and (max-width: 600px) {
        .tablemobile {
            width: 95%;
        }

        .modal-dialog {
            width: 100%;
            padding: 20px;
        }
    }
</style>

<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase" style="font-family:'Avenir Bold'">Track Your Order</h1>

            </div>
        </div>
    </div>
</section>

<div class="content-wrapper oh">

    <!-- Cart -->
    <section class="section-wrap shopping-cart">
        <div class="container relative tablemobile">

            <!-- order -->
            <div class="row trackorderdiv">
                <div class="col-md-12 col-sm-12" style="border-left: 2px solid yellow">
                    <div class="row">
                        <div class="col-md-10 col-xs-6" style="padding-left:30px;">
                            <div class="row" style="text-align: left;">
                                <p style="font-family:'Avenir Bold';font-size:18px;">Order #<span></span></p>
                            </div>
                            <div class="row" style="text-align: left;">
                                <p style="font-weight:100;font-size:18px;">14/02/2021</p>
                            </div>

                        </div>
                        <div class="col-md-2 col-xs-6">
                            <div class="row" style="text-align: right;">
                                <img src="img/nav/delivery.png" style="padding-right:20px;">
                            </div>
                            <div class="row " style="text-align: right;margin-top:10px;">
                                <a class="totext" data-toggle="modal" data-target="#exampleModal">Track Order ></a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="trackorderslider slider" style="width:100%;text-align:center;margin:auto">

                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>



                            </section>
                        </div>

                    </div>

                </div>
            </div> <!-- end col -->
            <!-- end order -->

            <!-- order -->
            <div class="row trackorderdiv">
                <div class="col-md-12 col-sm-12" style="border-left: 2px solid yellow">
                    <div class="row">
                        <div class="col-md-10 col-xs-6" style="padding-left:30px;">
                            <div class="row" style="text-align: left;">
                                <p style="font-family:'Avenir Bold';font-size:18px;">Order #<span></span></p>
                            </div>
                            <div class="row" style="text-align: left;">
                                <p style="font-weight:100;font-size:18px;">14/02/2021</p>
                            </div>

                        </div>
                        <div class="col-md-2 col-xs-6">
                            <div class="row" style="text-align: right;">
                                <img src="img/nav/delivery.png" style="padding-right:20px;">
                            </div>
                            <div class="row  " style="text-align: right;margin-top:10px;        ">
                                <a class="totext" data-toggle="modal" data-target="#exampleModal">Track Order ></a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="trackorderslider slider" style="width:100%;text-align:center;margin:auto">

                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>



                            </section>
                        </div>

                    </div>

                </div>
            </div> <!-- end col -->
            <!-- end order -->

            <!-- order -->
            <div class="row trackorderdiv">
                <div class="col-md-12 col-sm-12" style="border-left: 2px solid yellow">
                    <div class="row">
                        <div class="col-md-10 col-xs-6" style="padding-left:30px;">
                            <div class="row" style="text-align: left;">
                                <p style="font-family:'Avenir Bold';font-size:18px;">Order #<span></span></p>
                            </div>
                            <div class="row" style="text-align: left;">
                                <p style="font-weight:100;font-size:18px;">14/02/2021</p>
                            </div>

                        </div>
                        <div class="col-md-2 col-xs-6">
                            <div class="row" style="text-align: right;">
                                <img src="img/nav/delivery.png" style="padding-right:20px;">
                            </div>
                            <div class="row  " style="text-align: right;margin-top:10px;">
                                <a class="totext" data-toggle="modal" data-target="#exampleModal">Track Order ></a>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="trackorderslider slider" style="width:100%;text-align:center;margin:auto">

                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                <div class=" trackprodslide  col-lg-2 col-xs-12 hidden-md hidden-sm">
                                    <div class="product-img frame">
                                        <a href="/product">
                                            <img class="imgz" src="" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>



                            </section>
                        </div>

                    </div>

                </div>
            </div> <!-- end col -->
            <!-- end order -->
        </div> <!-- end row -->




    </section> <!-- end cart -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-lg-12 col-xs-12">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-family:'Avenir Bold';font-size:24px;">Order #110</h4>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div style="">
                            <div class="row" style="text-align:center;padding:20px 0 ;">
                                <div>
                                    Order Status:
                                </div>
                                <div>
                                    <span style="font-family:'Avenir Bold'">
                                        Waiting for Confirmation
                                    </span>

                                </div>
                            </div>
                            <div class="row" style="padding-top:20px;">
                                <div class="col-lg-6 col-xs-6" style="text-align:center">
                                    <div>
                                        Placed on:
                                    </div>
                                    <div>
                                        <span style="font-family:'Avenir Bold'">
                                            14/03/2021
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6" style="text-align:center">
                                    <div>
                                        Receipt:
                                    </div>
                                    <div>
                                        <span style="font-family:'Avenir Bold'">
                                            view receipt
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="row" style="padding:20px;">
                            <img src="img/trackorder/3.png">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="prodsingle">
                        <div class="row" style="width:100%;border-bottom:2px solid grey;padding:20px 0;">
                            <div class="col-lg-2 col-xs-6">
                                <a href="#">
                                    <img src="img/shop/shop_item_3.jpg" alt="" style="height:100px">
                                </a>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <a href="#" class="itemtitle">Gray Jacket</a>
                                <span class="amount" style="font-family:'Avenir Bold'">SAR 1250.00</span>
                                <ul>
                                    <li class="colorgrey">Color: White</li>
                                    <li class="colorgrey">Size: M</li>
                                    <li class="colorgrey">Qty: 2</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="prodsingle">
                        <div class="row" style="width:100%;border-bottom:2px solid grey;padding:20px 0;">
                            <div class="col-lg-2 col-xs-6">
                                <a href="#">
                                    <img src="img/shop/shop_item_3.jpg" alt="" style="height:100px">
                                </a>
                            </div>
                            <div class="col-lg-2 col-xs-6">
                                <a href="#" class="itemtitle">Gray Jacket</a>
                                <span class="amount" style="font-family:'Avenir Bold'">SAR 1250.00</span>
                                <ul>
                                    <li class="colorgrey">Color: White</li>
                                    <li class="colorgrey">Size: M</li>
                                    <li class="colorgrey">Qty: 2</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div> <!-- end container -->

<div style="border: 2px solid #b2bad4">
    @include('footer')
</div>
<script>


</script>
@endsection