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

    .calendar-wrapper {
        width: 100%;
        margin: 3em auto;
        padding: 2em;
        background: #fff;
    }

    .calendar-wrapper table {
        clear: both;
        width: 100%;
        border-radius: 3px;
        border-collapse: collapse;
        color: #000d67;
    }

    .calendar-wrapper td {
        height: 48px;
        text-align: center;
        font-weight: 200;
        font-size: 1.5em;
        vertical-align: middle;
        width: 14.285714285714%;
    }


    .calendar-wrapper td.not-current {
        color: #c0c0c0;
    }

    /* .calendar-wrapper td.today {
        font-weight: 700;
        color: #28283b;
        font-size: 1.5em;
    } */

    .calendar-wrapper thead td {
        border: none;
        color: #000d67;
        font-size: 1.5em;
    }

    .first-in-week {
        color: #daa80b;
    }

    .booked {
        background-color: #dddef3;
        box-shadow: inset 0px 0px 0px 8px white;
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
                                        <h3 class="norm-text">Birthdate:</h3>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @if(isset($user->bday))
                                        <h2 class="norm-text">{{$user->bday}}</h2>
                                        @endif
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
                                    <a href="/">
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
                                        <h2 class="norm-text" style="text-decoration: underline;"> <a href="/wallet">view details</a> </h2>
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
                                <div class="calendar-wrapper">
                                    <div id="divCal"></div>
                                </div>
                            </div>

                            <div style="background:#f2f3f8;min-height:300px;">
                                <div id="my-orders">
                                </div>

                            </div>
                            <div class="" style="background:#f2f3f8;text-align:center;padding-bottom:20px;">

                                <a onclick="renderBookings(3)" style="cursor:pointer">
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




<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
<script>
    var orders = <?php echo ($orders); ?>;
    var dates = <?php echo ($dates); ?>;
    var booked = [1, 16, 21]
    var Cal = function(divId) {

        //Store div id
        this.divId = divId;

        // Days of week, starting on Sunday
        this.DaysOfWeek = [
            'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
        ];

        // Months, stating on January
        this.Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Set the current month, year
        var d = new Date();

        this.currMonth = d.getMonth();
        this.currYear = d.getFullYear();
        this.currDay = d.getDate();

    };

    function renderBookings(limit = 2) {
        template = '';

        for (var i = 0; i < orders.length; i++) {
            template += `<div class="leftpane" style="padding:20px;background:#f2f3f8;display:block">
                        <div class="" style="padding-bottom:10px;">
                            <div style="width:40%;">
                                <h3 class="norm-text bold-text">Beauty</h3>
                                <h3 class="norm-text">${orders[i].product.name_en}</h3>
                                <h3 class="norm-text">${orders[i].booking_date}</h3>
                                <h3 class="norm-text">${orders[i].booking_time}</h3>
                            </div>
                        </div>
                    </div>`
            if (i == 1 && limit > 2) {
                break;
            }
        }

        document.getElementById("my-orders").innerHTML = template;
    }

    function getCurrentMonthBooking() {

        var dateObj = new Date();
        var currDates = [];
        dates.forEach(ele => {
            if (ele.split("-")[1] == dateObj.getMonth() + 1) {
                currDates.push(parseInt(ele.split("-")[2]))
            }
        });

        return currDates;

    }



    // Show current month
    Cal.prototype.showcurr = function() {
        this.showMonth(this.currYear, this.currMonth);
        this.updateAdjacentMonth(this.currMonth);
    };

    // Show month (year, month)
    Cal.prototype.showMonth = function(y, m) {

        var d = new Date()
            // First day of the week in the selected month
            ,
            firstDayOfMonth = new Date(y, m, 1).getDay()
            // Last day of the selected month
            ,
            lastDateOfMonth = new Date(y, m + 1, 0).getDate()
            // Last day of the previous month
            ,
            lastDayOfLastMonth = m == 0 ? new Date(y - 1, 11, 0).getDate() : new Date(y, m, 0).getDate();


        var html = '<table>';

        // Write selected month and year
        html += '<thead><tr>';
        html += '<td colspan="7" style="font-weight: 900; font-size: 2em;">' + this.Months[m] + '</td> </tr>';
        html += '<tr><td style="color:#daa80b;">S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td></tr>';
        html += '</thead>';



        // Write the days
        var i = 1;
        do {

            var dow = new Date(y, m, i).getDay();

            // If Sunday, start new row
            if (dow == 0) {
                html += '<tr>';
            }
            // If not Sunday but first day of the month
            // it will write the last days from the previous month
            else if (i == 1) {
                html += '<tr>';
                var k = lastDayOfLastMonth - firstDayOfMonth + 1;
                for (var j = 0; j < firstDayOfMonth; j++) {
                    html += '<td></td>';
                    k++;
                }
            }

            // Write the current day in the loop
            var chk = new Date();
            var chkY = chk.getFullYear();
            var chkM = chk.getMonth();
            var booked = getCurrentMonthBooking();
            if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
                if (dow == 0) {
                    if (booked.includes(i)) {
                        html += '<td class="today first-in-week booked">' + i + '</td>';
                    } else {
                        html += '<td class="today first-in-week">' + i + '</td>';
                    }

                } else {
                    if (booked.includes(i)) {
                        html += '<td class="today booked">' + i + '</td>';
                    } else {
                        html += '<td class="today ">' + i + '</td>';
                    }

                }

            } else {
                if (dow == 0) {
                    if (booked.includes(i)) {
                        html += '<td class="normal first-in-week booked">' + i + '</td>';
                    } else {
                        html += '<td class="normal first-in-week">' + i + '</td>';
                    }
                } else {
                    if (booked.includes(i)) {
                        html += '<td class="normal booked">' + i + '</td>';
                    } else {
                        html += '<td class="normal">' + i + '</td>';
                    }
                }
            }
            // If Saturday, closes the row
            if (dow == 6) {
                html += '</tr>';
            }
            i++;
        } while (i <= lastDateOfMonth);

        // Closes table
        html += '</table>';

        // Write HTML to the div
        document.getElementById(this.divId).innerHTML = html;
    };

    // On Load of the window
    window.onload = function() {

        // Start calendar
        var c = new Cal("divCal");
        c.showcurr();


    }

    // Get element by id
    function getId(id) {
        return document.getElementById(id);
    }
    $(document).ready(function() {
        renderBookings();
        getCurrentMonthBooking();

    });
</script>

@endsection