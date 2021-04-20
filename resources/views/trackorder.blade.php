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
            @if(isset($orders))
            @foreach($orders as $ord)

            <!-- order -->
            <div class="row trackorderdiv">
                <?php
                $orderstatus = $ord->order_status;
                $color = 'red';
                if ($orderstatus == 0){
                    $color = 'grey';
                }
                else if ($orderstatus == 1){
                    $color = 'lightgreen';
                }
                else if ($orderstatus == 2){
                    $color = 'lime';
                }
                else if ($orderstatus == 3){
                    $color = 'yellow';
                }
                else if ($orderstatus == 4){    
                    $color = 'green';
                }
                else if ($orderstatus == 5){
                    $color = 'red';
                }
                else{
                    $color = 'red';
                }
            ?>
                <div class="col-md-12 col-sm-12" style="border-left: 5px solid {{$color}}">
                    <div class="row">
                        <div class="col-md-10 col-xs-6" style="padding-left:30px;">
                            <div class="row" style="text-align: left;">
                                <p style="font-family:'Avenir Bold';font-size:16px;">Order #<span>{{$ord->id}} </span></p>
                            </div>
                           
                            <div class="row" style="text-align: left;">
                                <p style="font-weight:100;font-size:16px;">{{$ord->created_at}}</p>
                            </div>
                            <div class="row" style="text-align: left;">
                                <p style="font-weight:100;font-size:16px;">Total: {{$ord->total_amount}} SAR</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-xs-6">
                            <a class="totext open-trackordermodal" data-toggle="modal" data-target="#exampleModal" data-ref="{{$ord->ref}}" data-ordstatus="{{$ord->order_status}}" data-cdate="{{$ord->created_at}}" data-ordid="{{$ord->id}}">
                                <div class="row" style="text-align: right;">
                                    <img src="img/nav/delivery.png" style="padding-right:20px;">
                                </div>
                                <div class="row " style="text-align: right;margin-top:10px;">
                                    Track Order >
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="trackorderslider slider" style="width:100%;text-align:center;margin:auto">
                                @foreach($ord->details as $orddets)

                                <div class=" trackprodslide  col-lg-3 col-xs-12 hidden-md hidden-sm">

                                    <div class="product-img frame">
                                        <a href="/product/{{$orddets->product->id}}">
                                            @foreach($orddets->product->images as $prodimg)
                                            <div style="width:120px;height:120px;padding:5px;border:1px solid black;margin:0 10px;display:table-cell; vertical-align:middle;">
                                                <img class="imgz" src="storage/products/{{ $prodimg->imgurl}}" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="max-width: 100%;max-height: 100%;width: 100%;min-width: 100%;" />
                                            </div>
                                            @endforeach
                                        </a>
                                        <div class="product-action clearfix">

                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </section>
                        </div>

                    </div>

                </div>
            </div> <!-- end col -->
            <!-- end order -->
            @endforeach
            @endif

        </div> <!-- end row -->




    </section> <!-- end cart -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-lg-12 col-xs-12">
                        <h4 class="modal-title" id="exampleModalLabel" style="font-family:'Avenir Bold';font-size:24px;">Order #<span id="refmodal"></span></h4>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div style="">
                            <div class="row" style="text-align:center;padding:20px 0 ;">
                                <div>
                                    Order Status:
                                </div>
                                <div>
                                    <span style="font-family:'Avenir Bold'" id="ordstatusmodal">
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
                                        <span style="font-family:'Avenir Bold'" id="cdatemodal">
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
                            <img id="trackorderimg" src="img/trackorder/0.png">
                            <h4></h4>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                @if(isset($ordermodal))
                    @foreach($ordermodal as $ord)
                   @if(isset($ord->details ))
                        @foreach($ord->details as $orddets)
            
                            <div class="prodsingle prod-{{$orddets->order_id}}">
                                <div class="row" style="width:100%;border-bottom:2px solid grey;padding:20px 0;">
                                    <div class="col-lg-2 col-xs-6">
                                          <a href="/product/{{$orddets->product->id}}">
                                          @if(isset($orddets->product->images))
                                          @foreach($orddets->product->images as $prodimg)
                                            <img src="storage/products/{{ $prodimg->imgurl}}" onerror="this.src='img/product/plentylogo.png'" alt="" loading=lazy style="width:100%;">
                                          @endforeach
                                          @else
                                            <img src="img/product/plentylogo.png" alt="" loading=lazy style="width:100%;">
                                          @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <a href="/product/{{$orddets->product->id}}" class="itemtitle">{{$orddets->product->name_en}}<br></a>
                                        <span class="amount" style="font-family:'Avenir Bold'">SAR {{$orddets->product->price}}</span>
                                        <ul>
                                        
                                            <li class="colorgrey">Color: {{$orddets->product->color}}</li>
                                            @if(isset($orddets->size))
                                                <li class="colorgrey">Size:  {{$orddets->size->value}}</li>
                                             @endif
                                            <li class="colorgrey">Qty: {{$orddets->qty}}</li>
                                          
                                            
                                            
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                        
                    @endforeach
                @endif
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div> <!-- end container -->

<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div> 
<script>
    $(document).on("click", ".open-trackordermodal", function() {
        var trackorderref = $(this).data('ref');
        var ordstat = $(this).data('ordstatus');
        var ordstatstr = "unknown";
        var ordpic = 'img/trackorder/0.png';
        var ordcdate = $(this).data('cdate');
        var ordid = $(this).data('ordid');
        var prodordid = '.prod-' + ordid;
        if (ordstat == '1') {
            ordstatstr = "Order Placed";
            ordpic = 'img/trackorder/1.png';
        } else if (ordstat == '2') {
            ordstatstr = "Preparing";
            ordpic = 'img/trackorder/2.png';
        } else if (ordstat == '3') {
            ordstatstr = "Out for Delivery";
            ordpic = 'img/trackorder/3.png';
        } else if (ordstat == '4') {
            ordstatstr = "Delivered";
            ordpic = 'img/trackorder/4.png';
        } else if (ordstat == '5') {
            ordstatstr = "Rejected";
            ordpic = 'img/trackorder/0.png'
        } 
        else if (ordstat == '0') {
            ordstatstr = "Pending";
            ordpic = 'img/trackorder/0.png'
        } else {
            ordstatstr = "Unknown";
            ordpic = 'img/trackorder/0.png'
        }
        $("#refmodal").text(ordid + ' (' + trackorderref +') ');
        $("#ordstatusmodal").text(ordstatstr);
        $("#trackorderimg").attr("src", ordpic);
        $("#cdatemodal").text(ordcdate);
 
        $('.prodsingle').hide();  
        $(prodordid).show();  
        
    });

</script>
@endsection

