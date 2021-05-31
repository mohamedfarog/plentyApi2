@extends('layout')
@section('content')
<style>
    .parent {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 10px;
    }

    .child {
        min-width: 600px;
        transition: 0.3s;
        border-radius: 30px;
        margin-top: 10px;
        padding-bottom: 110px;
        overflow: hidden;

    }

    .child img {
        max-width: 350px;
        margin: auto;
        display: block;
    }

    .gift-code {
        height: 65px;
        width: 275px;
        background-color: #f8c478;
        margin: auto;
        margin-top: 30px;
        border-radius: 10px;
        position: relative;
        text-align: center;
        line-height: 65px;
        color: white;
        font-size: 28px;
        font-weight: 900;
    }

    .gift-code .left-circle {
        height: 18px;
        width: 18px;
        position: absolute;
        left: -8px;
        top: 22px;
        background-color: white;
        border-radius: 50%;
    }

    .gift-code .right-circle {
        height: 18px;
        width: 18px;
        right: -8px;
        top: 22px;
        position: absolute;
        background-color: white;
        border-radius: 50%;
    }

    .share-button {
        right: 22px;
        top: 0px;
        position: absolute;
    }

    .gift-code:hover {
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .home-button input {
        display: block;
        margin: auto;
        margin-top: 60px;
        border-radius: 10px;
    }
</style>

@if(isset($data))
<div class="parent">
    <div class="child">

        <img src="img/giftcard/people.jpg" alt="" />
        <input type="hidden" value="{{$data->code}}" id="gift-code">
        <div class="gift-code" onclick="copyToClipBoard()">
            <div class="left-circle"></div>
            <div class="right-circle"></div>
            {{$data->code}}
            <div class="share-button"><i class="fas fa-share"></i></div>
        </div>
        <div style="margin-top:40px;color:#98b4c3">
            <div style="text-align:center">
                SAR <span style="font-size:22px;font-weight:900;">{{$data->amount}}</span>
            </div>
            <div style="max-width:400px;margin:auto; margin-top:10px;text-align: center;">
                The gift code can only be used once The amount will be credited to the user's Plenty Wallet
            </div>
        </div>
        <div class="home-button">
            <input class="btn btn-lg btn-dark" value="Home" style="font-weight:500;font-size:14px">
        </div>


    </div>
</div>
@endif



<div class="top-footer">
    @include('footer')
</div>

<script>
    function copyToClipBoard() {
        var copyText = document.getElementById("gift-code");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        showAlertSuccess('Copied to clipboard');
    }
</script>

@endsection