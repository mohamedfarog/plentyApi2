@extends('../layout')
@section('content')
<style>
    .signup {
        background-color: #f1f1f1;
    }

    .signup-form {
        color: red;
        margin: auto;
        max-width: 500px;
    }

    .signup-logo {
        text-align: center;
    }

    .signup-form input {
        border-radius: 20px;
    }

    .signup-form button {
        border-radius: 20px;
    }

    .modal {
        text-align: center;
    }

    .smsCode {
        width: 60px !important;
        padding: 0 !important;
    }

    .smsCode {
        width: 40px !important;

    }

    input:focus {
        background: #e3e3e3 !important;
    }

    .otp-input {}


    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .smsCode {
        text-align: center;
        line-height: 80px;
        font-size: 50px;
        border: solid 1px #ccc;
        box-shadow: 0 0 5px #ccc inset;
        width: 100%;
        outline: none;
        border-radius: 15px !important;
        height: 70px !important;
        width: 70px !important;
    }

    .otp input {
        background-color: #f1f1f1;
        width: auto;
    }

    .otp-field {
        display: inline;
        margin-left: 20px;
    }

    #otpModal .modal-header {

        border-bottom: none;
    }

    #otpModal .modal-dialog {

        text-align: center;
    }

    #otpModal .modal-content {

        border-radius: 30px;
    }

    .modal-body button {
        border-radius: 30px;
    }


    ::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #272c65 !important;
        opacity: 1;
        /* Firefox */
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #272c65 !important;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #272c65 !important;
    }

    input[type="text"],
    input[type="password"] {
        background: #f2f3f8 none repeat scroll 0 0;
        border: medium none;
        box-shadow: none;
        color: #272c65;
        height: 50px;
        margin-bottom: 30px;
        padding: 0 30px;
        transition: all 0.5s ease 0s;
        width: 100%;
        outline: none;
    }

    .loginlogo {
        max-height: 70%;
        margin-bottom: 50px;
    }

    body {
        font-family: 'Avenir', sans-serif;

    }

    .signupbutton {
        background: #272c65 !important;
        font-family: 'Avenir', sans-serif;
        font-weight: 100;
        font-size: 14px !important;
        margin-bottom: 30px;
    }

    .centertxt {
        text-align: center;
        margin-bottom: 30px;
        font-family: 'Avenir', sans-serif;
        font-weight: 100;
        font-size: 14px !important;
    }

    .forgotpass {}

    .clickunderline {
        text-decoration: underline;
        color: #272c65 !important;
    }

    .login {
        background-color: #f1f1f1;
    }

    .signup-form {
        color: red;
        margin: auto;
        max-width: 400px;
    }

    .login-logo {
        text-align: center;
    }

    .login-form input {
        border-radius: 20px;
    }

    .login-form button {
        border-radius: 20px;
    }

    .socialfooter {
        width: 40px;
    }

    .sfa {
        margin-right: 5px !important;
    }

    .modaltextp {
        font-size: 16px;
        font-weight: 100;
    }

    .mccontent {
        padding: 50px;
    }

    @media screen and (min-width: 768px) {
        .modal:before {
            display: inline-block;
            vertical-align: middle;
            content: " ";
            height: 100%;
        }

        .contymobile {
            width: 90%;
        }

    }

    @media only screen and (max-width: 600px) {
        .mccontent {
            padding: 0 !important;
        }
    }

    #contactnumbersignin {
        padding-left: 75px;

    }

    .number-prefix {
        position: absolute;
        top: 1.3rem;
        left: 25px;
        color: black;
    }

    .number-error {
        color: red;
        text-align: center;
        width: 100%;
        position: absolute;
        bottom: 8px;
        visibility: hidden;
    }
</style>
<section class="signup container" style="background:transparent">
    <div class="signup-logo">
        <img class="logo-dark loginlogo" src="img/logo_dark.png" alt="logo">
    </div>
    <input type="hidden" id="previous_url" value="{{ url()->previous() }}">

    <form class="signup-form" id="signup-form">

        <div style="position:relative;">
            <div class="number-prefix"><span style="padding:4px 8px;">+966</span></div>
            <input id="contactnumbersignin" type="text" name="contact" placeholder="MOBILE NO." />
            <div class="number-error" id="contact-error">Please provide a valid number!</div>
        </div>


        <!-- 2 column grid layout for inline styling -->
        <div>
            <div class="justify-content-center mb-40" style="text-align:center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example3" checked />
                    <label class="form-check-label" for="form2Example3">I've read and accept the <a href="/" class="clickunderline">Terms and Condition</a></label>
                </div>
            </div>

        </div>

        <!-- Submit button -->
        <button onclick="generateOTP(event)" class="btn btn-primary btn-block mb-4 signupbutton">Login</button>


    </form>


    <!-- Modal -->
    <div class="modal fade" id="otpModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content mccontent">
                <div class="modal-header" style="margin-bottom:50px;">
                    <p class="modaltextp">Verification Account</p>
                </div>
                <div>

                </div>
                <div>
                    <p class="modaltextp">
                        Please enter the One-Time Password(OTP) to verify your account. An OTP has been sent to <span id="modalinputnumber">+966 00 000 0000</span>
                    </p>
                </div>
                <div class="modal-body">
                    <div class="row otp">
                        <div class="otp-field">
                            <input style="color:black" type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                        </div>
                        <div class="otp-field">
                            <input style="color:black" type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                        </div>
                        <div class="otp-field">
                            <input style="color:black" type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                        </div>
                        <div class="otp-field">
                            <input style="color:black" type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                        </div>

                    </div>
                    <div>
                        <p>
                            Didn't recieve any code? <a href="/" style="text-decoration:underline;color:#001b71;">Resend</a>
                        </p>
                    </div>
                    <div style="margin-top:50px;">
                        <button type="submit" class="btn btn-primary btn-block" onclick="verifyOTP()" style="background:#001b71;font-size:15px;font-weight:100;">Verify</button>
                    </div>
                </div>
            </div>

        </div>
    </div>




</section>


<style>

</style>

<script>
    $(function() {
        var smsCodes = $('.smsCode');

        function goToNextInput(e) {
            var key = e.which,
                t = $(e.target),
                // Get the next input
                sib = t.closest('div').next().find('.smsCode');

            // Not allow any keys to work except for tab and number
            if (key != 9 && (key < 48 || key > 57)) {
                e.preventDefault();
                return false;
            }

            // Tab
            if (key === 9) {
                return true;
            }

            // Go back to the first one
            if (!sib || !sib.length) {
                sib = $('.smsCode').eq(0);
            }
            sib.select().focus();
        }

        function onKeyDown(e) {
            var key = e.which;

            // only allow tab and number
            if (key === 9 || (key >= 48 && key <= 57)) {
                return true;
            }

            e.preventDefault();
            return false;
        }

        function onFocus(e) {
            $(e.target).select();
        }

        smsCodes.on('keyup', goToNextInput);
        smsCodes.on('keydown', onKeyDown);
        smsCodes.on('click', onFocus);

    })

    function combineSMSCodes() {
        var otp = "";
        $('.smsCode').each(function(i, element) {
            otp += $(element).val();
        })

        return otp
    }

    function generateOTP(e) {
        var cc = $('#contactnumbersignin').val();
        document.getElementById('modalinputnumber').innerHTML = cc;
        e.preventDefault();
        const form = new FormData(document.getElementById("signup-form"))
        const error = checkPhoneNumber('+966' + form.get('contact'));
        contactError(error);
        var base_url = $('meta[name=base_url]').attr('content');
        if (error) {
            $.ajax({
                type: 'POST',
                url: base_url + 'api/otp',
                data: {
                    contact: form.get('contact')
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#otpModal').modal('show');
                    console.log(data)
                }
            });
        }

    }

    function verifyOTP() {
        const form = new FormData(document.getElementById("signup-form"))
        var base_url = $('meta[name=api_base_url]').attr('content');
        $.ajax({
            type: 'POST',
            url: base_url + 'api/verify',
            data: {
                contact: form.get('contact'),
                otp: parseInt(combineSMSCodes())
            },
            dataType: 'JSON',
            success: function(data) {
                if (data.success) {
                    if (data.user) {
                        setCookie('bearer_token', data.token, 1);
                        const user = {
                            "id": data.user.id,
                            "name": data.user.name,
                            "typeofuser": data.user.typeofuser
                        }
                        setCookie('user', JSON.stringify(user), 1);
                        if ($("#previous_url").val()) {
                            window.location.href = $("#previous_url").val();
                        } else {
                            window.location.href = $('meta[name=base_url]').attr('content');
                        }

                    } else {
                        register(data)
                    }
                }
            }
        });
    }

    function register(data) {
        const form = new FormData(document.getElementById("signup-form"))
        //  console.log(data)
        var base_url = $('meta[name=api_base_url]').attr('content');
        $.ajax({
            type: 'POST',
            headers: {
                "AuthRegister": data.authtoken
            },
            url: base_url + 'api/register',
            data: {
                contact: form.get('contact'),
            },
            dataType: 'JSON',
            success: function(data) {
                console.log(data)
                setCookie('bearer_token', data.token, 1);
                const user = {
                    "id": data.user.id,
                    "name": data.user.name,
                    "typeofuser": data.user.typeofuser
                }
                setCookie('user', JSON.stringify(user), 1);
                window.location.href = $('meta[name=base_url]').attr('content') + "profile-edit";
            }
        });
    }
    $(document).ready(function() {
        const user = getCookie('user');
        if (!user) {
            eraseCookie('bearer_token');
            eraseCookie('user');
        } else {
            var base_url = $('meta[name=base_url]').attr('content');
            window.location.replace(base_url);
        }

    });

    function checkPhoneNumber(number) {
        var regex = new RegExp(/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/);
        return regex.test(number);
    }

    function contactError(status = false) {
        if (status) {
            $('#contact-error').css("visibility", "hidden");
        } else {
            $('#contact-error').css("visibility", "visible");
        }

    }
</script>

@endsection