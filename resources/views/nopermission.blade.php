@extends('layout')
@section('content')
<style>
    .container {
        text-align: center;
        font-size: 34px;
        color: #001b71;
        height: 28vh;
    }
</style>

<div class="container">
    No permission
    <div style="margin-top:30px;">
        <input onclick="goHome()" class="btn btn-lg btn-dark" value="Home" style="font-weight:500;font-size:14px">
    </div>
</div>


<div class="top-footer">
    @include('footer')
</div>

@endsection