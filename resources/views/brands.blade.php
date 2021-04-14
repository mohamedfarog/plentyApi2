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

    .ssproduct {
        margin: 0 5px;
    }

    .featicons {
        width: 25px !important;
    }
</style>



<div class="purchase-online-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title-border">Brands</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Nav tabs -->

            </div>
            <div class="col-lg-12">
                <!-- Tab panes -->
                <div class="-">
                    <div class="tab-pane active" id="new-arrivals">
                        <section style="margin: auto;width:90%;text-align:center;">

                            @if(isset($brands))
                            @foreach($brands as $hb)
                            <?php
                            $primary = $hb->primary;
                            $primarycolor = substr($primary, -6);
                            ?>

                            <div class="col-lg-3 col-xs-12" style="margin:0 5px;">
                                <div class="product-img frame" style="border: 2px solid #<?php echo $primarycolor ?>">
                                    <a href="/delicacy/{{$hb->shop_id}}">
                                        <img class="imgz" src="storage/styles/{{$hb->brandheader}}" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 90%;max-height: 90%;width:80%;min-width:80%;" />
                                    </a>

                                    <div class="product-action clearfix">

                                    </div>
                                </div>

                            </div>
                            @endforeach
                            @endif

                        </section>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



<section style="height:50px;">
</section>
<!-- Newsletter -->
<section class="newsletter" id="subscribe" style="background-color:#f2f3f8;border:0;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h4 style="text-transform: uppercase;font-family:'Avenir Bold'">Get the latest updates</h4>
                <form class="relative newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Email here" style="border: 2px solid #001b71;font-size:14px;">
                    <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Subscribe" style="font-weight:500;font-size:14px">
                </form>
            </div>
        </div>
    </div>
</section>




<script>
    $(document).ready(function() {
        $(".promo-inner").hover(function() {
            $(this).siblings(".categoverlay").css("opacity", "0.2");
        }, function() {
            $(this).siblings(".categoverlay").css("opacity", "0.6");
        });
        $(".categoverlay").hover(function() {
            $(this).css("opacity", "0.2");
        }, function() {
            $(this).css("opacity", "0.6");
        });

        $('.featlineicons').css({
            'visibility': 'hidden'
        });
        $(".single-product").hover(function() {
            $(this).children(".product-info").children(".featlineicons").css({
                'visibility': 'visible'
            });
        }, function() {
            $(this).children(".product-info").children(".featlineicons").css({
                'visibility': 'hidden'
            });
        });


        $(".brand-slide").hover(function() {
            $(this).css({
                'transform': 'scale(1.2)'
            });
        }, function() {
            $(this).css({
                'transform': 'scale(1)'
            });
        });
    });
</script>
<div>
    @include('footer')
</div>
@endsection