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
</style>
<div style="background-color: #22264c;padding-top:10px;padding-bottom:10px;text-align: center;margin-bottom: 20px;">
    <h3 style="color:white;font-weight: 100;">About us</h3>
</div>
<section class="sectionaboutus"> 
    <div id="about-us" class="section section-content" style="padding-bottom: 1rem;width:90%;margin:auto;"> 
        <div class="container-fluid" style="padding-right: 0;padding-left:0;margin:auto"> 
            <div class="hero-image" style="height:600px">
                <div class="hero-text">
                    <h4 class="centermobile" style="text-align: start;padding-top:30px;color:white;">Plenty of welcomes! </h4>
                    <div class="row">

                        <div class="col-lg-4 col-12 aboutusborders" style="text-align: left;
                                    text-justify: inter-word;">
                            <img src="img/logo_dark.png" style="height:100px;text-align: center;display:block;margin:auto;margin-bottom:30px;filter: brightness(0) invert(1);"><br>
                            <span>
                                Summing up how your experience at Plenty is going to be in one word; EXTRAORDINARY!
                                <br><br>
                                The uniqueness of this place will amaze you, it’s a spot where you can find all what you want, from shopping from all places to grooming and entertainment, Plenty of pleasants.
                            </span><br><br> 
                            </span>
                            <div style=" "> 
                            </div>
                        </div> 
                        <div class="col-lg-8 col-12 aboutusborders" style="text-align: start;border-left:2px white solid;text-align: justify;
                                        text-justify: inter-word;height:300px;">
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

<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection

