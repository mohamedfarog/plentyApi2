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
</style>

<div class="parent">
    <div class="child">
        <div class="plenty-pay-wrapper">
            <div class="redeem">
                <button class="redeem-point"><i class="fas fa-gift" style="margin-right:5px;"></i>Redeem Gift</button>
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
            <button class="add-balance" style="position:relative;margin-top:-18px;" onclick="addPlentyBalance()">Add Balance</button>
        </div>
    </div>
</div>

<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>

<script>
    function addPlentyBalance() {
        const bearer_token = getCookie('bearer_token');
        var base_url = $('meta[name=api_base_url]').attr('content');
        url = base_url + 'api/wallet/topup'
        const topup = $("#topup").val();
        if (parseInt(topup) > 0) {
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": topup
                },
                headers: {
                    "Authorization": 'Bearer ' + bearer_token
                },

                success: function(data) {
                    if (data.success) {
                        if (data.message.original.transaction) {
                            const transaction_url = data.message.original.transaction.url;
                            window.location.replace(transaction_url);

                        } else {

                        }
                    }

                },
                error: function(err) {

                    console.log('Error!', err)
                }

            });
        } else {
            console.log("error!")
        }


    }
</script>

@endsection