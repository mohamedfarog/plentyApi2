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


    .flex-container {
        justify-content: center;
        display: flex;
        flex-wrap: nowrap;
    }

    .flex-container>div {
        background-color: #fff;
        width: 150px;
        height: 50px;
        margin: 10px;
        text-align: center;
        line-height: 50px;
        font-size: 12px;
        justify-content: space-between;
        border-radius: 30px;
        color: black !important;
    }

    .flex-container span {
        font-size: 18px;
        font-weight: 600;
    }

    .flex-container>div:hover {
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

    #custom-amount {
        display: inline-block;
        position: absolute;
        width: 90px;
        background-color: #f1f1f1;
        border: none;
        margin: 6px 10px;
        font-size: 18px;
        font-weight: 600;
        text-align: left;
        padding: 0px 5px;
        right: -6px;
        height: 35px;
        border-radius: 30px;
    }

    #custom-amount:focus {
        background-color: #fff;
        color: black;

    }

    .gift-amount {
        position: relative;
    }

    .sar-title {
        display: inline-block;
        position: absolute;
        left: 10px;
        top: 1px;
    }

    #custom-amount::placeholder {
        color: black;
        font-size: 15px;
        text-align: center;
        font-weight: 100;
    }

    .gift-card-right {
        height: 750px;
        border-radius: 10px;
        padding: 15px 20px;
        overflow-y: auto;
    }

    .gift-cards {
        background-color: white;
        border-radius: 10px;
        padding: 10px 20px;
        margin-bottom: 8px;
        box-shadow: 0 0px 4px 1px rgb(0 0 0 / 20%);
        transition: 0.3s;
    }

    .gift-cards span {
        color: black;
        font-weight: 100px;
    }

    .gift-card-header {
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        margin-top: 18px;
        color: #001b71;
    }

    @media only screen and (max-width: 650px) {
        .flex-container>div {
            width: 70px;
            line-height: 50px;
        }

        #custom-amount {
            width: 60px;
            font-size: 12px;
        }

        #custom-amount::placeholder {
            font-size: 12px;
        }
    }
</style>

<div class="container">
    <div class="row">

        <div class="col-lg-7 col-md-7">
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
                    <div style="margin-top:32px;overflow:auto;">
                        <div style="text-align:center;color:black;font-size:16px;font-weight:600">
                            Please select the gift amount
                        </div>
                        <input type="hidden" id="gift-amount-data">
                        <div class="flex-container">
                            <div class="gift-amount" data-id="100">SAR <span>100</span></div>
                            <div class="gift-amount" data-id="150">SAR <span>150</span></div>
                            <div class="gift-amount" data-id="200">SAR <span>200</span></div>
                            <div class="gift-amount" data-id="250">SAR <span>250</span></div>
                        </div>
                        <div class="flex-container">
                            <div class="gift-amount" data-id="300">SAR <span>300</span></div>
                            <div class="gift-amount" data-id="350">SAR <span>350</span></div>
                            <div class="gift-amount" data-id="400">SAR <span>400</span></div>
                            <div class="gift-amount" data-id="450">SAR <span>450</span></div>
                        </div>
                        <div class="flex-container">
                            <div class="gift-amount" data-id="500">SAR <span>500</span></div>
                            <div class="gift-amount" data-id="550">SAR <span>550</span></div>
                            <div class="gift-amount" data-id="600">SAR <span>600</span></div>
                            <div class="gift-amount" id="dynamic-amount" data-id="600">
                                <div class="sar-title"> SAR </div> <input type="number" id="custom-amount" placeholder="Amount?" />
                            </div>
                        </div>
                    </div>
                    <input type="button" onclick="generateGiftCard()" class="btn btn-lg btn-dark" value="Get Gift Code" style="font-weight:500;font-size:14px">

                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5">

            @if(isset($giftcards))
            <div class="gift-card-header">
                Gift History
            </div>
            <div class="gift-card-right">
                @foreach($giftcards as $giftcard)
                <div class="gift-cards">
                    <div class="row">
                        <div class="col-sm-4">
                            <span>Name:</span> {{$giftcard->name}}
                        </div>
                        <div class="col-sm-4">
                            <span>Code:</span> {{$giftcard->code}} <br />
                            <span>Amount:</span> {{$giftcard->amount}}
                        </div>
                        <div class="col-sm-4">
                            <span>Status:</span>
                            @if($giftcard->status == 0)
                            Invalid
                            @elseif($giftcard->status == 1)
                            Paid
                            @elseif($giftcard->status == 2)
                            Redeem
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>


<div class="top-footer">
    @include('footer')
</div>

<script>
    $(document).ready(function() {
        $(".gift-amount").on('click', function(event) {
            $(".gift-amount").css('border', '1px solid #fff');
            event.currentTarget.style.border = '1px solid #f8b237';
            const amount = $(event.currentTarget).data("id");
            $("#gift-amount-data").val(amount);
        });
        $("#custom-amount").on("input", function() {
            $("#dynamic-amount").data("id", $(this).val());
            $("#gift-amount-data").val($("#dynamic-amount").data("id"));
        });
    });

    function generateGiftCard() {
        const bearer_token = getCookie('bearer_token');
        var base_url = $('meta[name=api_base_url]').attr('content');
        url = base_url + 'api/giftcard'
        const amount = $("#gift-amount-data").val();
        const receiver = $("#receiver").val();
        if (parseFloat(amount) > 0 && receiver.length > 0) {
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "amount": amount,
                    "name": receiver
                },
                headers: {
                    "Authorization": 'Bearer ' + bearer_token
                },

                success: function(data) {
                    if (data.success) {
                        const trans_url = data.trans.original.transaction.url;
                        window.location.replace(trans_url);
                    } else {
                        showAlertError('Error occurred, sorry for the inconvenience!');
                    }
                },
                error: function(err) {
                    showAlertError('Error occurred, sorry for the inconvenience!');
                }

            });

        } else {
            showAlertError('Please provide Receiver Name & Choose a gift amount!')
        }
    }
</script>

@endsection