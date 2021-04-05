@extends('../layout')
@section('content')
{{-- 272c65 --}}
<style>
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
        background: #f6f6f6 none repeat scroll 0 0;
        border: medium none;
        box-shadow: none;
        color: #999;
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

    .loginbtn {
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

    .login-form {
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

    @media only screen and (max-width: 600px) {
        .contymobile {
            width: 90%;
        }
    }

</style>
<section class="login container contymobile" style="background:transparent;">
    <div class="login-logo">
        <img class="logo-dark loginlogo" src="img/logo_dark.png" alt="logo">
    </div>

    <form class="login-form">

        <input type="text" placeholder="USERNAME" />
        <input type="password" placeholder="PASSWORD" />
        <!-- 2 column grid layout for inline styling -->




        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4 loginbtn">LOGIN</button>

        <p class="centertxt">Forget your password? <a href="#" class="clickunderline">Click here</a></p>

        <!-- Register buttons -->
        <div class="text-center mb-40">
            <p>or login using</p>
            <div class="footer-socials">
                <div class="social-icons nobase" style="padding:0 20px;">
                    <a href="#" class="sfa"><img class="socialfooter" src="img/social/signupgoogle.png"></a>
                    <a href="#" class="sfa"><img class="socialfooter" src="img/social/signupfb.png"></a>
                    <a href="#" class="sfa"><img class="socialfooter" src="img/social/signupapple.png"></a>

                </div>
            </div>
        </div>
        <p class="centertxt">Don't have an account? <a href="/signup" class="clickunderline">Sign up here!</a></p>
    </form>



</section>



@endsection

