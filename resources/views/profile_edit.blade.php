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
    .form-group input[type="password"] {
        background: #f6f6f6 none repeat scroll 0 0;
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




    @media only screen and (max-width: 600px) {
        .contymobile {
            width: 90%;
        }
    }
</style>
<section class="container contymobile" style="background:transparent;min-height:600px">


    <form class="profile-form" id="profile-form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="file" class="form-control" id="avatar" placeholder="Avatart" name="avatar">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="name" value="{{$user->name}}" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="contact" value="{{$user->contact}}" placeholder="Contact" name="contact">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="bday" value="{{$user->bday}}" placeholder="Birth Date" name="bday">
        </div>
        <div class="form-group gender">
            <label class="radio-inline"><input type="radio" name="gender" value="male" {{ ($user->gender) == 'male' ? 'checked' : ''}}>Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="female" {{ ($user->gender) == 'female' ? 'checked' : ''}}>Female</label>
            <label class="radio-inline"><input type="radio" name="gender" value="other" {{ ($user->gender) == 'other' ? 'checked' : ''}}>Other</label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" onclick="updatProfile(this)" value="Send">Update</button>
        </div>

    </form>

</section>

<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>

<script>
    function updatProfile() {
        const form = new FormData(document.getElementById("profile-form"))
        const bearer_token = getCookie('bearer_token');
        url = base_url + 'api/profile'
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'JSON',
            headers: {
                "Authorization": 'Bearer ' + bearer_token
            },
            data: {
                action: 'update',
                name: form.get('name'),
                email: form.get('email'),
                contact: form.get('contact'),
                gender: form.get('gender'),
                bday: form.get('bday')
            },
            success: function(data) {
                getUser();
                window.location.replace(base_url + 'profile');

            },
            error: function(err) {
                console.log('Error!', err)
            }

        });
    }
</script>

@endsection