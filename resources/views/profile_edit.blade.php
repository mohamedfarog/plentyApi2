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

    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group input[type="email"],
    .form-group input[type="date"],
    .form-group input[type="file"],
        {
        background: white;
        border: 1px solid #dedede;
        color: #999;
        height: 50px;
        margin-bottom: 30px;
        padding: 0 30px;
        transition: all 0.5s ease 0s;
        width: 100%;
        outline: none;
    }



    body {
        font-family: 'Avenir', sans-serif;
    }

    .updatebtn {
        background: #272c65 !important;
        font-family: 'Avenir', sans-serif;
        font-weight: 100;
        font-size: 14px !important;
        margin-bottom: 30px;
        margin-top: 100px;
    }

    .centertxt {
        text-align: center;
        margin-bottom: 30px;
        font-family: 'Avenir', sans-serif;
        font-weight: 100;
        font-size: 14px !important;
    }


    input[type="radio"] {
        display: block;
    }

    .profile-form {
        color: red;
        margin: auto;
        max-width: 400px;
        margin-top: 100px;
    }



    .profile-form input {
        border-radius: 20px;
    }

    .profile-form button {
        border-radius: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }



    @media only screen and (max-width: 600px) {
        .contymobile {
            width: 90%;
        }

        .form-group {
            height: 80px !important;
            margin-bottom;
            20px;
        }
    }

</style>
<section class="page-title text-center bg-light ">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 class="uppercase" style="font-family:'Avenir Bold'">Edit Profile</h1>

            </div>
        </div>
    </div>
</section>

<section class="container contymobile" style="background:transparent;min-height:600px">


    <form class="profile-form" id="profile-form" style="max-width:600px;margin-top:50px;" onsubmit="event.preventDefault()">
        {{ csrf_field() }}
        <!-- <div class="form-group" style="margin-bottom;50px;height: 50px;">
            <div class="col-lg-3">
                <h6>Profile Picture:</h6>
            </div>
            <div class="col-lg-9">
                <input type="file" class="form-control" id="avatar" placeholder="Avatart" name="avatar">
            </div>
        </div> -->

        <div class="form-group" style="margin-bottom;50px;height: 50px;">
            <div class="col-lg-3">
                <h6>Name:</h6>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="name" value="{{$user->name}}" placeholder="Name" name="name">
            </div>
        </div>

        <div class="form-group" style="margin-bottom;50px;height: 50px;">
            <div class="col-lg-3">
                <h6>Email:</h6>
            </div>
            <div class="col-lg-9">
                <input type="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Email" name="email">
            </div>
        </div>

        <div class="form-group" style="margin-bottom;50px;height: 50px;">
            <div class="col-lg-3">
                <h6>Contact Number:</h6>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="contact" value="{{$user->contact}}" placeholder="Contact" name="contact" disabled>
            </div>
        </div>

        <div class="form-group" style="margin-bottom;50px;height: 50px;">
            <div class="col-lg-3">
                <h6>Birthdate:</h6>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" id="bday" value="{{$user->bday}}" placeholder="Birth Date" name="bday">
            </div>
        </div>
        <div class="form-group" style="margin-bottom;50px;height: 50px;">
            <div class="col-lg-3">
                <h6>Gender:</h6>
            </div>
            <div class="col-lg-9">
                <div class="form-group gender">
                    <label class="radio-inline"><input type="radio" name="gender" value="male" {{ ($user->gender) == 'male' ? 'checked' : ''}}>Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="female" {{ ($user->gender) == 'female' ? 'checked' : ''}}>Female</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="other" {{ ($user->gender) == 'other' ? 'checked' : ''}}>Other</label>
                </div>
            </div>
        </div>


        <div class="form-group" style="margin-top:50px;">
            <button class="btn btn-primary" onclick="updateProfile(this)" value="Send" style="width:100%;background-color:#001b71">Update</button>
        </div>

    </form>

</section>

<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>

<script>
    function updateProfile() {
        const form = new FormData(document.getElementById("profile-form"))
        const bearer_token = getCookie('bearer_token');
        var base_url = $('meta[name=base_url]').attr('content');
        url = base_url + 'api/profile'
        $.ajax({
            type: 'POST'
            , url: url
            , dataType: 'JSON'
            , headers: {
                "Authorization": 'Bearer ' + bearer_token
            }
            , data: {
                action: 'update'
                , name: form.get('name')
                , email: form.get('email')
                , contact: form.get('contact')
                , gender: form.get('gender')
                , bday: form.get('bday')
            }
            , success: function(data) {
                const user = {
                    "id": data.user.id
                    , "name": data.user.name
                    , "typeofuser": data.user.typeofuser
                }
                setCookie('user', JSON.stringify(user), 1);
                window.location.replace(base_url + 'profile');
            }
            , error: function(err) {
                console.log('Error!', err)

            }

        });
    }

</script>

@endsection

