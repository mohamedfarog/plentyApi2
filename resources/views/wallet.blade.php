@extends('layout')
@section('content')
<style>
    .parent {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .child {
        min-width: 700px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        border-radius: 30px;
        margin-top: 10px;
        padding-bottom: 200px;

    }

    .plenty-pay-wrapper {
        padding-top: 100px;
        background-color: #151d4c;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        border-bottom-left-radius: 40%;
        border-bottom-right-radius: 40%;
        position: relative;
    }

    .add-balance {
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        margin: auto;
        display: block;
        background-color: white;
        border-radius: 10px;
        padding: 10px 40px;
        font-weight: 600;
        color: #001b71;

    }

    .center {
        margin: auto;
        display: block;
        max-width: 300px;
    }

    .wallet-balance {
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        color: white;
        margin-bottom: 50px;
    }

    .wallet-balance img {
        display: inline;
    }

    #topup {
        background-color: #2c3b9c;
        border: none;
        color: white;
        border-radius: 10px;
        text-align: center;
        font-weight: 700;
        font-size: 22px;
        height: 60px;
    }

    #topup:focus {
        color: #151d4c;
        background-color: white;
    }
</style>

<div class="parent">
    <div class="child">
        <div class="plenty-pay-wrapper">
            <div style="position:absolute;right:20px;top:30px">
                <button class="add-balance"><i class="fas fa-gift" style="margin-right:5px;"></i>Redeem Gift</button>
            </div>
            <div class="center wallet-balance">
                <div style="margin-bottom:10px;">Wallet Balance</div>
                <div>SAR<span style="font-size:30px;font-weight:900;margin-left:5px">78797</span> <img src="img/payment/plenty-pay-logo.png" width="30px" alt="plenty" style="position:relative;margin-top:-10px"> </div>
            </div>
            <div class="center" style="margin-top:50x;">
                <p style="color:white;text-align:center;font-size:18px;font-weight:600;">Top Up</p>
                <input type="number" name="topup" id="topup" style="width:100%">
            </div>
        </div>
        <div>
            <button class="add-balance" style="position:relative;margin-top:-18px;">Add Balance</button>
        </div>
    </div>
</div>


<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection