@extends('../layout2')
@section('content')

<section class="login container">
    <div class="login-logo">
        <img class="logo-dark" src="img/logo_dark.png" alt="logo" style="max-height:80%;">
    </div>

    <form class="login-form">

        <input type="text" placeholder="USERNAME" />
        <input type="password" placeholder="PASSWORD" />
        <!-- 2 column grid layout for inline styling -->

        <p>Forget your password? <a href="#">Click here</a></p>



        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">LOGIN</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>or login using</p>
            <div class="footer-socials">
                <div class="social-icons nobase" style="padding:0 20px;">
                    <a href="#"><img class="socialfooter" src="img/social/whatsapp.png"></a>
                    <a href="#"><img class="socialfooter" src="img/social/facebook.png"></a>
                    <a href="#"><img class="socialfooter" src="img/social/twitter.png"></a>

                </div>
            </div>
        </div>
        <p>Don't have an account? <a href="/signup">Sign up here!</a></p>
    </form>







</section>


<style>
    .login {
        background-color: #f1f1f1;
    }

    .login-form {
        color: red;
        margin: auto;
        max-width: 500px;
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

</style>


@endsection
