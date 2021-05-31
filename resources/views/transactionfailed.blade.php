@extends('layout')
@section('content')


<div class="container" style="display: flex;
  justify-content: center;
  align-items: center;height: 50rem;
">
    <div id="success" style="">
        <div class="icon icon--order-success svg" style="display: flex;
  justify-content: center;">
            <i style="font-size:75px;margin-bottom:20px;" class="fas fa-exclamation-circle"></i>
        </div>
        <h3 style="text-align:center;margin-top:10px;color:red"><span>Transaction Failed</span></h3>
        <h4 style="text-align:center;"><span>Try again later!</span></h4>
        <div style="display: flex;
  justify-content: center;"><img src="img/logo_dark.png" style='width:100px;margin-top:50px;' /></div>
    </div>
</div>


<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>
@endsection