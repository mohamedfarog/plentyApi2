@extends('layout')
@section('content')
<style>
    .sizestyle {
        border: 2px solid black;
        padding: 5px;
        font-size: 20px;
        border-radius: 10px;
        width: 35px;
        height: 35px;
    }

    .size-filter li {
        margin: 0 12px !important;
    }

    .single-pro-size ul li.active a,
    .single-pro-size ul li a:hover {
        color: green !important;
    }

    .sizestylea {
        text-align: center !important;
        margin-right: 0 !important;
        font-size: 24px;
        margin-top: 2px;
    }

    .tryitheader {
        text-align: left;
        padding: 10px;
        font-weight: lighter;
        color: black;
        font-size: 24px;
    }

    .addtobagbtn {
        border: 2px solid green;
        border-radius: 20px;

        padding: 10px 40px !important;
        font-size: 20px !important;
        background-color: transparent !important;
        color: green !important;
        font-weight: lighter;
    }

    .centermobile {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
        .contmobile {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 350px;
        }

        .product-info {
            width: 100% !important;
        }

        .cart-plus-minus {
            width: 100% !important;
        }

    }


    /*  calendar styling*/
    .calendar-wrapper {
        margin: 3em auto;
        padding: 20px 50px 10px 50px;
        border: 1px solid #dcdcff;
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 -1px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        z-index: 100;
        position: relative;


    }

    .calendar-wrapper table {
        width: 400px;
        height: 300px;
        padding: 50px;
        border-radius: 3px;
        border-collapse: collapse;
        color: #444;
        font-size: 15px;
        font-weight: 800;
        margin: auto;

    }

    .calendar-wrapper td {
        height: 30px;
        text-align: center;
        vertical-align: middle;
        width: 14.285714285714%;
        color: #c31c4a;
    }

    .calendar-wrapper td:hover {
        cursor: pointer;
    }



    .calendar-wrapper .today:hover,
    .calendar-wrapper .normal:hover {
        background-color: palevioletred;
        border-radius: 50%;
    }

    .calendar-wrapper td.not-current {
        color: #cdccce;
    }

    .calendar-wrapper td.today {
        font-weight: 700;
        color: #28283b;
        font-size: 1.5em;
    }

    .calendar-wrapper thead td {
        border: none;
        color: #c31c4a;
        font-size: 1.5em;
    }

    .calendar-wrapper #btnPrev {
        float: left;
        margin-bottom: 20px;
    }

    .calendar-wrapper #btnPrev:before {
        content: '';
        background-image: url('img/Lightbox/prev-gray.png');
        font-family: FontAwesome;
        padding-right: 4px;
        background-size: 100% 100%;
        display: inline-block;
        height: 25px;
        width: 25px;
        position: relative;
        top: 5px;
    }

    .calendar-wrapper #btnNext {
        float: right;
        margin-bottom: 20px;
    }

    .calendar-wrapper #btnNext:after {
        content: '';
        background-image: url('img/Lightbox/next-gray.png');
        padding-left: 4px;
        width: 100px;
        background-size: 100% 100%;
        display: inline-block;
        height: 25px;
        width: 25px;
        position: relative;
        top: 5px;
    }

    .calendar-wrapper #btnPrev,
    #btnNext {
        background: transparent;
        border: none;
        outline: none;
        font-size: 15px;
        color: #c0c0c0;
        cursor: pointer;
        transition: all 0.3s ease;
        =
    }

    .calendar-wrapper #btnPrev {
        position: absolute;
        left: 100px;
    }

    .calendar-wrapper #btnNext {
        position: absolute;
        right: 100px;
    }

    .calendar-wrapper #btnPrev:hover,
    #btnNext:hover {
        color: #28283b;
        font-weight: bold;
    }

    /* styling for calendar footer */

    .time-shedule-wrapper {
        height: 200px;

        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        position: relative;
        top: -60px;
        padding: 60px 50px 150px 50px;

    }

    .day-booked {
        color: pink;
    }

    .time-shedule {
        padding: 10px;
        height: 110px;
        overflow-y: scroll;
    }

    .time-btn {
        position: relative;
        text-align: center;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        width: 150px;
        height: 40px;
        background-color: white;
        color: black;
        border: 2px solid pink;
        border-radius: 30px;
        margin: 5px 5px;

    }



    .time-shedule::-webkit-scrollbar {
        width: 5px;
    }

    .time-shedule::-webkit-scrollbar-track {
        box-shadow: none
    }

    .time-shedule::-webkit-scrollbar-thumb {
        background: pink;
        border-radius: 10px;
    }

    .time-shedule::-webkit-scrollbar-thumb:hover {
        background: #009eb3;
    }

    .your-booking {
        height: 100px;
    }

    .booking-item {
        font-size: 20px;
        margin: 20px;
    }

    .booking-item span {
        font-size: 20px;
        color: #edbddb;
    }

    .day-status {
        text-align: center;
        margin: 10px;
    }

    .day-status span {
        border-radius: 10px;
        padding: 5px 10px;
        font-size: 15px;
    }

    .day-status .booking-available {
        background-color: #edbddb;
        color: white;
    }

    .day-status .booked {
        background-color: #c31c4a;
        color: white
    }

    .calendar-btn-left {
        margin-left: 30px
    }

    .calendar-btn-right {
        margin-right: 30px
    }
</style>
<link rel="stylesheet" href="css/hurst.css">
<div class="heading-banner-area overlay-bg" style="margin: 0 5%;background: rgba(0, 0, 0, 0) url('img/booking/skirts.png') no-repeat scroll center center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title" style="text-align:center">
                        <img src="img/homebrands/Skirts.png" style="width:30%;padding: 50px 0">
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">BEAUTY</a></li>
                            <li>SKIRT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container contmobile" style="background-color:#f2f3f8;padding-top:50px;margin-top:20px">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <h4 class="floatleft" style="font-size:30px;font-weight:bolder;line-height:200%;font-family:'Avenir bold';color:black;margin:0px">
                    GEL NAILS <span style="color:#edbddb">SAR 50</span></h4>
            </div>
        </div>
    </div>
    <div class="row no-sidebar">
        <!-- Booking section start here -->
        <div class="col-lg-12" style="padding:0;">
            <div class="clearfix" style="background-color:#f2f3f8;">

                <div class="col-lg-5">

                    <div class="single-big-photo view-lightbox slider-for" style="width:100% !important">
                        <div>
                            <img src="img/booking/Main.png" alt="" />
                        </div>

                    </div>
                </div>

                <div class="col-lg-7" style="padding:0 15px">

                    <div class="calendar-wrapper">
                        <button id="btnPrev" type="button"></button>
                        <button id="btnNext" type="button"></button>
                        <div id="divCal"></div>
                        <div class="day-status">
                            <span class="booking-available">Available</span>
                            <span class="booked">Booked</span>
                        </div>
                    </div>
                    <div class="time-shedule-wrapper">
                        <div class="time-shedule">
                            <button class="time-btn">9:30 AM</button>
                            <button class="time-btn">10:30 AM</button>
                            <button class="time-btn">11: 00 AM</button>
                            <button class="time-btn ">10: 00 AM </button>
                            <button class="time-btn">9:30 AM</button>
                            <button class="time-btn">10:30 AM</button>
                            <button class="time-btn">11: 00 AM</button>
                            <button class="time-btn">10: 00 AM </button>
                            <button class="time-btn">9:30 AM</button>
                            <button class="time-btn">10:30 AM</button>
                            <button class="time-btn">11: 00 AM</button>
                            <button class="time-btn">10: 00 AM </button>


                        </div>

                    </div>


                </div>

            </div>

        </div>

        <!-- Booking section end here -->
    </div>
</div>

<div class="container contmobile" style="background-color:#f2f3f8;margin-top:20px">

    <div class="your-booking">
        <h4 style="margin-top: 30px;color:black">Your Booking</h4>
        <div class="row">
            <div class="col-lg-6">
                <div class="booking-item">
                    GET NAILS <span>SAR 50</span>
                </div>
                <div class="booking-item">
                    March 14 <span>04:30 PM</span>
                </div>
            </div>
            <div class="col-lg-6">
                <button class=" addtobagbtn floatright" style="margin-top: 40px;border-color:#c31c4a">
                    <span class="addtobagheader" style="padding-top:10px !important; color:#c31c4a">
                        Add to Bag
                    </span>
                    <img src="img/product/bag-red.png" style="width:30px;">

                </button>
            </div>

        </div>
    </div>

</div>




<script>
    $(document).ready(function() {
        console.log("ready!");
        $(".active").css("background-color", "black");
    });


    var month;
    var year;
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
        month = this.currMonth
        year = this.currYear

    };

    // Goes to next month
    Cal.prototype.nextMonth = function() {
        if (this.currMonth == 11) {
            this.currMonth = 0;
            this.currYear = this.currYear + 1;
        } else {
            this.currMonth = this.currMonth + 1;
        }
        this.showcurr();

    };
    // Goes to next month
    Cal.prototype.currentMonth = function() {
        return this.currMonthl;

    };

    // Goes to previous month
    Cal.prototype.previousMonth = function() {
        if (this.currMonth == 0) {
            this.currMonth = 11;
            this.currYear = this.currYear - 1;
        } else {
            this.currMonth = this.currMonth - 1;
        }
        this.showcurr();
    };

    // Show current month
    Cal.prototype.showcurr = function() {
        this.showMonth(this.currYear, this.currMonth);
        this.updateAdjacentMonth(this.currMonth);
        month = this.currMonth
        year = this.currYear
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
        html += '<td colspan="7">' + this.Months[m] + '</td>';
        html += '</tr></thead>';



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
                    html += '<td class="not-current">' + k + '</td>';
                    k++;
                }
            }

            // Write the current day in the loop
            var chk = new Date();
            var chkY = chk.getFullYear();
            var chkM = chk.getMonth();
            if (chkY == this.currYear && chkM == this.currMonth && i == this.currDay) {
                if (booked.includes(i)) {
                    html += '<td class="today day" id = ' + i + ' onclick ="dayClicked(this.id)"><span class="calendar-col day-booked">' + i + '</span></td>';
                } else {
                    html += '<td class="today day" id = ' + i + ' onclick ="dayClicked(this.id)"><span class="calendar-col">' + i + '</span></td>';
                }

            } else {
                if (booked.includes(i)) {
                    html += '<td class="normal day" id = ' + i + ' onclick ="dayClicked(this.id)"><span class="calendar-col day-booked">' + i + '</span></td>';
                } else {
                    html += '<td class="normal day" id = ' + i + ' onclick ="dayClicked(this.id)"><span class="calendar-col">' + i + '</span></td>';
                }
            }
            // If Saturday, closes the row
            if (dow == 6) {
                html += '</tr>';
            }
            // If not Saturday, but last day of the selected month
            // it will write the next few days from the next month
            else if (i == lastDateOfMonth) {
                var k = 1;
                for (dow; dow < 6; dow++) {
                    html += '<td class="not-current">' + k + '</td>';
                    k++;
                }
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

        // Bind next and previous button clicks
        getId('btnNext').onclick = function() {
            c.nextMonth();
        };
        getId('btnPrev').onclick = function() {
            c.previousMonth();
        };

    }

    // Get element by id
    function getId(id) {
        return document.getElementById(id);
    }

    function getClass(name) {
        console.log('HI')
        return document.getElementsByClassName(name)
    }


    // update adjacent months
    Cal.prototype.updateAdjacentMonth = function($currentMonth) {
        let previousMonth;
        let nextMonth;
        if ($currentMonth == 11) {
            previousMonth = 10
            nextMonth = 0

        } else if ($currentMonth == 0) {
            previousMonth = 11
            nextMonth = 1
        } else {
            previousMonth = $currentMonth - 1
            nextMonth = $currentMonth + 1

        }

        document.getElementById('btnPrev').innerHTML = '<span class="calendar-btn-left"> ' + this.Months[previousMonth] + '</span>';
        document.getElementById('btnNext').innerHTML = '<span class="calendar-btn-right">' +
            this.Months[nextMonth] + '</span>';
    }

    function dayClicked(id) {
        console.log(id, month, year)
    }
</script>
<script src="js/prodjs.js"></script>
@endsection