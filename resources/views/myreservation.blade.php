@extends('layout')
@section('content')
<style>
    .myreservations {
        background-color: #22264c;
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        margin-bottom: 20px;
    }

    .myreservations h3 {
        color: white;
        font-weight: 100;
    }

    .reservation-section {
        max-width: 1000px;
        margin: auto;
    }

    .grid-container {
        max-width: 1000px;
        margin: 0 auto;
        display: grid;
        grid-gap: 1rem;
    }

    @media (min-width: 600px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 900px) {
        .grid-container {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .grid-item {
        padding: 20px;
        font-size: 30px;
        text-align: center;
    }

    .reservation-card {
        box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);
        height: 200px;
        border-radius: 20px;
        position: relative;
    }

    .reservation-card:hover {
        box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    #no-reservation {
        text-align: center;
        font-size: 24px;
    }

    .reservation-card-header span {
        color: black;
        font-size: 18px;
        font-weight: 600;
    }

    .reservation-card-header {
        padding-top: 10px;
    }

    .reservation-card-footer {
        position: absolute;
        text-align: center;
        font-size: 14px;
        width: 100%;
        bottom: 14px;
    }

    .reservation-body {
        padding-top: 40px;
        text-align: left;
        padding-left: 20px;
    }

    .reservation-body>div {
        font-size: 14px;
        font-weight: 600;
    }
</style>
<div class="myreservations">
    <h3>My Reservation</h3>
</div>
<section class="reservation-section">
    <div id="no-reservation">
    </div>
    <div class="grid-container" id="reservation-panel">

    </div>
</section>

<div class="top-footer">
    @include('footer')
</div>

<script>
    $(document).ready(function() {
        var base_url = $('meta[name=api_base_url]').attr('content');
        const bearer_token = getCookie('bearer_token');
        $.ajax({
            type: 'GET',
            url: base_url + 'api/tablebooking',
            dataType: 'JSON',
            data: {
                page: 1,
            },
            headers: {
                "Authorization": 'Bearer ' + bearer_token
            },
            success: function(data) {
                renderReservations(data.data);
            },
            error: function(err) {
                console.log(err)
            }
        });
    });

    function renderReservations(data) {
        var template = ""
        if (data.length > 0) {
            data.forEach((item) => {
                template += `
                <div class="grid-item" >
                    <div class="reservation-card">
                        <div class="reservation-card-header" style="position:relative">
                            <span style="position: absolute;left: 16px;">Order #${item.id} </span>  <span style="${item.date !== null ? 'display:none': 'position: absolute;right: 16px;' }"">Price:${item.total_amount }</span>
                        </div>
                        <div class="reservation-body">
                            <div style="margin-bottom:10px">Created at: ${new Date(item.created_at).toDateString()}</div>
                            <div style="${item.date === null ? 'display:none': 'display:block' }">Booking Date:${item.date}</div>
                            <div style="${item.date === null ? 'display:none': 'display:block' }">Booking Time:${item.preftime}</div>
                        </div>
                        <div class="reservation-card-footer">
                            ${ item.date === null ? 'Your will be notified when your pickup order is ready' :'Your Table is Booked. Please be there on Time' }
                        </div>
                    </div>
                </div>
            `
            })
            $("#reservation-panel").html(template);
        } else {
            $("#no-reservation").html('No Reservations')
        }

    }
</script>
@endsection