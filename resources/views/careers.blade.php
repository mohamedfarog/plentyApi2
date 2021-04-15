@extends('layout')
@section('content')
<style>
    label {
        color: #1b2458;
    }

    ::placeholder {
        color: #e2e2e2;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #e2e2e2;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #e2e2e2;
    }

    .custom-file-upload {
        background-color: #001B71;
        color: white;
        border-radius: 20px;
        display: inline-block;
        padding: 6px 20px;
        cursor: pointer;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    span {
        color: #001B71;
    }

</style>
<section class="page-title text-center bg-light">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase" style="font-family:'Avenir Bold'">Careers</h1>

            </div>
        </div>
    </div>
</section>

<div class="animsition" style="width: 90%;margin: auto;">
    <div class="wrapper" style="margin-bottom: 10rem;">

        <div class="section section-content" style="margin-top:50px;padding-bottom: 1rem;">
            <div class="container-fluid" style="padding-right: 0;padding-left:0;">
                <div class="row" style="padding:20px;">
                    <div class="col-lg-3 col-xs-12">
                        <h2> Join us </h2>
                        <h6 class="">
                            <br>
                            Join our team and send your CV to
                            <br>
                            <span style="font-weight: 900;margin-top:10px;"><a href="mailto:hr@plentyofthings.com">hr@plentyofthings.com</a></span>
                        </h6>
                    </div>
                    <div class="col-lg-7 col-xs-12">
                        <form method="post" action="sendcareers.php" enctype="multipart/form-data">
                            <div class="row" style="margin:15px 0">
                                <div class="col-lg-3">
                                    <h6>Name:</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="username" id="name" style="background-color: #f8f8f8;border:0px solid #ccc;width:100%;padding: 5px;" placeholder="First and Last  " required>
                                </div>
                                <br>
                            </div>
                            <div class="row" style="margin:15px 0">
                                <div class="col-lg-3">
                                    <h6>Mobile:</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="mobile" id="mobile" style="background-color: #f8f8f8;border:0px solid #ccc;width: 100%;padding: 5px;" placeholder="country code +966" required>
                                </div>
                                <br>
                            </div>
                            <div class="row" style="margin:15px 0">
                                <div class="col-lg-3">
                                    <h6> Email:</h6>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text" name="email" id="email" style="background-color: #f8f8f8;border:0px solid #ccc;width: 100%;padding: 5px;" placeholder="@gmail @hotmail @windowslive @yahoo @outlook" required>
                                </div>
                                <br>
                            </div>

                            <div class="row" style="margin:15px 0">
                                <div class="col-lg-3">
                                    <h6>CV :</h6>
                                </div>
                                <div class="col-lg-9">
                                    <label for="file-upload" class="custom-file-upload">
                                        Attach File
                                    </label>
                                    <input type="file" id="file-upload" name="uploadedFile" style="display: none;" accept=".pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="required">

                                    <span id="filenametext"></span>
                                </div>
                                <br>
                            </div>

                            <div class="row" style="margin:15px 0;direction: ltr !important;text-align: left !important;">
                                <div class="col-lg-12" style="direction: ltr !important;">
                                    <button id="msgbtn" class="plenty-form-button" style="padding: .75rem 2rem;font-weight: 700;text-transform: uppercase;border-radius: 0;background-color: #001B71;color: white;">Send</button>
                                </div>
                            </div>
                            <div class="row" style="margin:15px 0;direction: ltr !important;text-align: left !important;">
                                <div class="col-lg-12" style="direction: ltr !important;">
                                    <div id="msgsent" style="padding:10px;direction:ltr !important;font-size:1.5rem;color:green;">Thank you, your request has been received </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>




</div>
<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
<style>
    .langdiv {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 99999;
        padding: 5px;
        padding-left: 10px;
    }

    .langlist {
        display: none;
        list-style-type: none;
        z-index: 99999;
        background: white;

    }

</style>
<script>
    $(document).ready(function() {
        $('.langlist').hide();
        $(".langdiv").hover(function() {
            $('.langlist').show();
        }, function() {
            $('.langlist').hide();
        });
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        $('#file-upload').change(function() {
            var i = $(this).prev('label').clone();
            var file = $('#file-upload')[0].files[0].name;
            $("#filenametext").text(file);
        });
    });
    console.log(localStorage.getItem("52msgsent"));
    $("#msgsent").hide();
    var x = localStorage.getItem("52msgsent");
    if (x == 1) {
        $("#msgsent").show();
        localStorage.setItem("52msgsent", 0);
    }
    $("#msgbtn").click(function() {
        localStorage.setItem("52msgsent", 1);
    });

</script>
@endsection

