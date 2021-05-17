@extends('layout')
@section('content')


@php
var_dump($data);
@endphp
<div class="container" style="display: flex;
  justify-content: center;
  align-items: center;height: 50rem;
">
    <div id="success" style="">
        <div class="icon icon--order-success svg" style="display: flex;
  justify-content: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                <g fill="none" stroke="#8EC343" stroke-width="2">
                    <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                    <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                </g>
            </svg>
        </div>
        <h3 style="text-align:center;margin-top:10px"><span>Thank you for your time.</span></h3>
        <h4 style="text-align:center;"><span>payment sent successfully !</span></h4>
        <hr>
        <div style="display: flex;
  justify-content: center;"><img src="img/logo_dark.png" style='width:100px' /></div>
    </div>
</div>


<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection