@extends('../../layout')

@section('content')
<style>
    .password-reset-container {
        max-width: 700px;
        margin: auto;
        padding-top: 35px;
    }

    .card {
        box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 30px;
        background-color: #fff;
    }

    .card-body {
        max-width: 400px;
        margin: auto;
        padding-top: 40px;
    }

    .passreset-button {
        margin: auto;
        display: block;
    }

    .card-header {
        text-align: center;
        font-size: 18px;
        margin-top: 45px;
    }
</style>
<div class="container">
    <div class="password-reset-container">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="passreset-button">
                                <button type="submit" class="btn btn-primary passreset-button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection