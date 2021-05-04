@extends('layout')
@section('content')
<style>
    .sectionaboutus {
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("img/aboutus/aboutusbg.jpg");
        height: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        padding-top: 100px;
    }

    span,
    div {
        color: white;
    }
    .cf-fluid{
        padding-right: 0;
        padding-left:0;
        margin:auto;
    }
    .div-cont-aboutus{
        background-color: #22264c;
        padding-top:10px;
        padding-bottom:10px;
        text-align: center;
        margin-bottom: 20px;
    }
    .h3-aboutus{
        color:white;
        font-weight: 100;
    }
    .ssc-content{
        padding-bottom: 1rem;
        width:90%;
        margin:auto;
    }
    .centermobile{
        text-align: start;
        padding-top:30px;
        color:white;
    }
    .imglogo-dark{
        height:100px;
        text-align: center;
        display:block;
        margin:auto;
        margin-bottom:30px;
        filter: brightness(0) invert(1);
    }
    .aboutusborders{
        text-align: left;
        text-justify: inter-word;
    }
    .aub{
        text-align: start;
        border-left:2px white solid;
        text-align: justify;
        text-justify: inter-word;
        height:300px;
    }
    .h-image{
        height:600px;
    }
    .top-footer{
        border-top: 2px solid #b2bad4;
        margin-top: 30px;
    }
</style>
<div class="div-cont-aboutus" >
    <h3 class="h3-aboutus" >About us</h3>
</div>
<section class="sectionaboutus">
    <div id="about-us" class="section section-content ssc-content" >
        <div class="container-fluid cf-fluid" >
            <div class="hero-image h-image" style="">
                <div class="hero-text">
                    <h4 class="centermobile" >Plenty of welcomes! </h4>
                    <div class="row">

                        <div class="col-lg-4 col-12 aboutusborders" >
                            <img src="img/logo_dark.png" class="imglogo-dark" ><br>
                            <span>
                                Summing up how your experience at Plenty is going to be in one word; EXTRAORDINARY!
                                <br><br>
                                The uniqueness of this place will amaze you, it’s a spot where you can find all what you want, from shopping from all places to grooming and entertainment, Plenty of pleasants.
                            </span><br><br>
                            </span>
                            <div  >
                            </div>
                        </div>
                        <div class="col-lg-8 col-12 aboutusborders aub">
                            At Plenty, we deliver the ultimate experience through our prime location, website, and application, and we strive to make your journey as satisfying as possible.
                            <br><br>
                            Plenty of international concepts are gathered with a Saudi vision, where we proudly and selectively created our own brands under one platform to meet all your needs and wishes, as we always go above average, and constantly evolving and innovating.
                            <br><br>
                            Expect the unexpected. Ever Enough!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="top-footer">
    @include('footer')
</div>
@endsection

