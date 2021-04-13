@extends('layout')
@section('content')

<link rel="stylesheet" href="css/hurst.css">
<style>
    .norm-text {
        font-family: 'Avenir', sans-serif;
        color: #001b71;
        line-height: 1;
        text-transform: none;
        font-size: 18px;
        font-weight: 100 !important;
    }

    .leftpane {
        width: 100%;
        padding: 20px 20px;
        background: white;


    }

    .bold-text {
        font-family: 'Avenir Bold', sans-serif;
        font-weight: 100;
    }

    @media only screen and (max-width: 600px) {
        .mobilefix {
            width: 90% !important;
        }
    }
</style>

<section style="text-align:center;">
    <img src="img/profile/profilepic.png" style="width:100px;margin-bottom:20px;">

    <h1 style="font-weight:100">Welcome,
        @if($user->name)
        <span style="font-weight:400;font-family:'Avenir Bold'">{{$user->name}}</span>
        @endif
    </h1>
</section>
<section>
    <!-- Mobile-menu end -->
    <!-- HEADING-BANNER START -->

    <!-- HEADING-BANNER END -->
    <!-- MY-ACCOUNT-AREA START -->
    <div class="my-account-area  pt-80">
        <div class="container mobilefix">
            <div class="my-account">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="panel-group" id="accordion">
                            <div class="panel" style="text-align:right">
                                <div style="margin-bottom:20px;">
                                    <a href="/profile-edit">
                                        <h1 style=" text-decoration: underline;font-size:16px;font-weight:400;">edit
                                        </h1>
                                    </a>
                                </div>

                            </div>

                            <div class="leftpane" style="padding-top:0;">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <h3 class="norm-text">Membership:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <h2 class="norm-text" style="color:#daa900">VIP / Elite Member</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="leftpane" style="background:#f2f3f8">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="norm-text">Email:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @if(isset($user->email))
                                        <h2 class="norm-text">{{$user->email}}</h2>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="leftpane">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="norm-text">Mobile Phone:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @if(isset($user->contact))
                                        <h2 class="norm-text">{{$user->contact}}</h2>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="leftpane" style="background:#f2f3f8">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="norm-text">Mailing Address:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h2 class="norm-text"> 1st Street, Saudi Arabia</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="leftpane">

                            </div>

                            <div class="" style="text-align:center">
                                <div class="" style="padding-bottom:10px;">
                                    <img src="img/profile/acfront.png" style="width:75%;">
                                    <h3 class="norm-text" style="padding:20px;color:#daa900">VIP / Elite Access Card</h3>
                                </div>
                            </div>
                            <div class="" style="text-align:center">
                                <div class="" style="padding-bottom:10px;">
                                    <img src="img/profile/lcfront.png" style="width:75%;margin-bottom;20px;">
                                    <h3 class="norm-text" style="padding:20px;">Membership Rewards Card</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <div class="panel-group" id="accordion">
                            <div class="panel" style="text-align:right">
                                <div style="margin-bottom:20px;">
                                    <a href="#">
                                        <h1 style=" text-decoration: underline;font-size:16px;font-weight:400;color:white">.
                                        </h1>
                                    </a>
                                </div>

                            </div>

                            <div class="leftpane" style="padding-top:0;">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="norm-text">My Wallet:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h2 class="norm-text" style="text-decoration: underline;">view details</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="leftpane" style="background:#f2f3f8">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="norm-text">Track My Order:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h2 class="norm-text"> Delivering</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="leftpane" style="padding:20px;">
                                <div class="row" style=" ">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 class="norm-text">My Bookings:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h2 class="norm-text" style="text-decoration: underline;">add booking</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="leftpane" style="padding:0;">
                                <img src="img/profile/calendar.png" style="width:100%;">
                            </div>

                            <div style="background:#f2f3f8;height:300px;">
                                <div class="leftpane" style="padding:20px;background:#f2f3f8;">
                                    <div class="" style="padding-bottom:10px;">
                                        <div style="width:40%;float:left;">
                                            <h3 class="norm-text bold-text">Shave</h3>
                                            <h3 class="norm-text">Manners</h3>
                                            <h3 class="norm-text">Thursday, 18 March</h3>
                                            <h3 class="norm-text">4:30 p.m.</h3>
                                        </div>
                                        <div style="width:60%;float:left;text-align:right">
                                            <h2 class="norm-text" style="text-decoration: underline;">edit</h2>
                                        </div>
                                    </div>
                                </div>
                                <br><br> <br><br>
                                <div class="leftpane" style="padding:20px;background:#f2f3f8;">
                                    <div class="" style="padding-bottom:10px;">
                                        <div style="width:40%;float:left;">
                                            <h3 class="norm-text bold-text">Hair Cut</h3>
                                            <h3 class="norm-text">Manners</h3>
                                            <h3 class="norm-text">Friday, 19 March</h3>
                                            <h3 class="norm-text">3:30 p.m.</h3>
                                        </div>
                                        <div style="width:60%;float:left;text-align:right">
                                            <a href="#">
                                                <h2 class="norm-text" style="text-decoration: underline;">edit</h2>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="" style="background:#f2f3f8;text-align:center;padding-bottom:20px;">
                                <a href="#">
                                    <h2 class="norm-text" style="text-decoration: underline;">view all</h2>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- MY-ACCOUNT-CART-AREA END -->
    <!-- FOOTER START -->

</section>




<div>
    @include('footer')
</div>
@endsection