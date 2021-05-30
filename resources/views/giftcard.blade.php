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

    .plenty-pay-wrapper {
        padding-top: 100px;
        background-image: linear-gradient(#252f65, #151d4c);
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        border-bottom-left-radius: 35%;
        border-bottom-right-radius: 35%;
        position: relative;
        padding-bottom: 50px;
    }

    .add-balance {
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        margin: auto;
        display: block;
        background-color: white;
        border-radius: 10px;
        padding: 10px 50px;
        font-weight: 600;
        color: #001b71;

    }

    .redeem-point {
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        margin: auto;
        display: block;
        background-color: white;
        border-radius: 10px;
        padding: 10px 20px;
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
        height: 50px;
    }

    #topup:focus {
        color: #151d4c;
        background-color: white;
    }

    .redeem {
        position: absolute;
        right: 20px;
        top: 15px
    }

    @media only screen and (max-width: 700px) {
        .redeem {
            right: 120px;
        }
    }

    .flex-container {
        justify-content: center;
        display: flex;
        flex-wrap: nowrap;
    }

    .flex-container>div {
        background-color: #fff;
        width: 100px;
        margin: 10px;
        text-align: center;
        line-height: 50px;
        font-size: 12px;
        justify-content: space-between;
        border-radius: 30px;
        box-shadow: 0 0px 5px 1px rgb(0 0 0 / 20%);
        transition: 0.3s;
    }

    .flex-container span {
        font-size: 18px;
        font-weight: 600;
    }

    .flex-container div:hover {
        box-shadow: 0 0px 5px 3px rgb(0 0 0 / 20%);
        cursor: pointer;
    }

    .receiver-name {
        max-width: 350px;
        margin: auto;
        margin-top: 35px;

    }

    .receiver-name input {
        background-color: #f1f1f1;
        border-radius: 10px;
    }

    .receiver-name label {
        font-weight: 600;
    }


    .receiver-name input:focus,
    .receiver-name input:active {
        background-color: #f1f1f1;
        color: black;
    }

    .child .btn-dark {
        margin: auto;
        width: 200px;
        display: block;
        border-radius: 10px;
        margin-top: 40px;

    }

    .get-gift-code {
        margin-top: -120px;
    }
</style>

<div class="parent">
    <div class="child">

        <img src="img/giftcard/gift-card.png" width="100%" alt="" />

        <div class="get-gift-code">

            <div class="receiver-name">
                <label>Receiver Name</label>
                <input type="text" name="receiver" id="receiver" />
            </div>


        </div>
        <div style="max-width:445px;margin:auto;background-color:#fff4e0;padding: 5px 8px;">
            <p style="color:#e2b159;">
                The receiver should redeem the gift code in "Plenty Wallet"
                section the gift amount will be credited to the receiver in App Wallet.
            </p>
        </div>
        <div style="margin-top:32px;">
            <div style="text-align:center;color:black;font-size:16px;font-weight:600">
                Please select the gift amount
            </div>
            <div class="flex-container">
                <div class="gift-amount">SAR <span>100</span></div>
                <div class="gift-amount">SAR <span>150</span></div>
                <div class="gift-amount">SAR <span>200</span></div>
                <div class="gift-amount">SAR <span>250</span></div>
            </div>
            <div class="flex-container">
                <div class="gift-amount">SAR <span>300</span></div>
                <div class="gift-amount">SAR <span>350</span></div>
                <div class="gift-amount">SAR <span>400</span></div>
                <div class="gift-amount">SAR <span>450</span></div>
            </div>
            <div class="flex-container">
                <div class="gift-amount">SAR <span>500</span></div>
                <div class="gift-amount">SAR <span>550</span></div>
                <div class="gift-amount">SAR <span>600</span></div>
                <div class="gift-amount">SAR <span>650</span></div>
            </div>
        </div>
        <input type="submit" class="btn btn-lg btn-dark" value="Get Gift Code" style="font-weight:500;font-size:14px">

    </div>
</div>



<div class="top-footer">
    @include('footer')
</div>

<script>
    $(document).ready(function() {
        $(".gift-amount").on('click', function(event) {
            $(".gift-amount").css('backgroundColor', '#fff');
            event.currentTarget.style.backgroundColor = "#f1f1f1";
        });
    });
</script>

@endsection