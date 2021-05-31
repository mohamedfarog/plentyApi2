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

    .gift-code {
        height: 74px;
        width: 275px;
        background-color: #f8c478;
        margin: auto;
        margin-top: 12px;
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

    .redeem-btn {
        display: block;
        margin: auto;
        margin-top: 60px;
        border-radius: 10px;
    }

    #gift-code {
        width: 220px;
        border-radius: 10px;
    }

    .modal {
        text-align: center;
    }

    @media screen and (min-width: 768px) {
        .modal:before {
            display: inline-block;
            vertical-align: middle;
            content: " ";
            height: 100%;
        }
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-content {
        border-radius: 22px;
    }

    .modal-body {
        text-align: center;
        padding-top: 0px;
    }

    #code-modal-btn {
        background-color: #f7ae2a !important;
        border-radius: 18px;
        width: 100%;
        height: 55px;
        margin: 32px 5px;
        font-size: 28px;
        text-transform: none;
    }

    .code-modal-image {
        margin: 32px auto !important;
    }
</style>

<div class="parent">
    <div class="child">

        <img src="img/giftcard/gift-card.png" width="100%" alt="" />

        <div style="max-width:350px;margin:auto;background-color:#fff4e0;padding: 5px 8px;">
            <p style="color:#e2b159;">
                The gift amount will be credited to your App Wallet
            </p>
        </div>
        <div>
            <p style="color:#f8c883;text-align:center;font-size: 21px;font-weight: 900;margin-top: 50px;">
                Please enter the gift code
            </p>
        </div>
        <div class="gift-code">
            <div class="left-circle"></div>
            <div class="right-circle"></div>
            <input type="text" name="gift-code" id="gift-code">
            <div class="share-button"><i class="fas fa-share"></i></div>
        </div>
        <input onclick="RedeemGiftCard()" type="button" class="btn btn-lg btn-dark redeem-btn" value="Redeem Gift Code" style="font-weight:500;font-size:14px">

    </div>
</div>

<div id="successModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p style="color:#f7ad29;font-size: 28px;
    font-weight: 900;">Congratulations!</p>
                <img src="img/giftcard/gift-icon.png" class="code-modal-image" width="75px" alt="">
                <p style="color:#91aebf;font-size: 18px;">You have earned</p>
                <p style="color:#f7ad29;font-size: 34px;">SAR <span style="font-weight: 900">400</span></p>
                <p style="color:#91aebf;font-size: 18px;">The amount is credited to your wallet</p>
                <input type="button" data-toggle="modal" data-target="#successModal" class="btn btn-lg" id="code-modal-btn" value="Okay">
            </div>
        </div>

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


    function RedeemGiftCard() {
        const bearer_token = getCookie('bearer_token');
        var base_url = $('meta[name=api_base_url]').attr('content');
        url = base_url + 'api/redeemgift'
        const code = $("#gift-code").val();
        if (code.length > 0) {
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                headers: {
                    "Authorization": 'Bearer ' + bearer_token
                },

                success: function(data) {
                    if (data.success) {
                        console.log(data);
                        $('#successModal').modal('show');
                    } else {
                        showAlertError('Error occurred, sorry for the inconvenience!');
                    }
                },
                error: function(err) {
                    showAlertError('Error occurred, sorry for the inconvenience!');
                }

            });

        } else {
            showAlertError('Please provide a valid voucher code!')
        }
    }
</script>

@endsection