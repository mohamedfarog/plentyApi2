@extends('layout')
@section('content')
<style>
.sizestyle{
	border: 2px solid black;
	padding:5px;
	font-size:16px;
	border-radius: 10px;
	width: 35px;
	height: 35px;
}
.size-filter li { 
    margin: 0 12px !important; 
}

</style>
<link rel="stylesheet" href="css/hurst.css">
<div class="heading-banner-area overlay-bg" style="margin: 0 5%;background: rgba(0, 0, 0, 0) url('img/product/Banner.png') no-repeat scroll center center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-banner">
                    <div class="heading-banner-title">
                        <h2>SADA</h2>
                    </div>
                    <div class="breadcumbs pb-15">
                        <ul>
                            <li><a href="index.html">DELICACY</a></li>
                            <li>SADA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area single-pro-area pt-30 pb-30 product-style-2" >
				<div class="container" style="background-color:#f2f3f8">	
					<div class="row shop-list single-pro-info no-sidebar">
						<!-- Single-product start -->
						<div class="col-lg-12">
							<div class="single-product clearfix" style="background-color:#f2f3f8">
								<!-- Single-pro-slider Big-photo start -->
								<div class="single-pro-slider single-big-photo view-lightbox slider-for">
									<div>
										<img src="img/product/Main.png" alt="" />
										<!-- <a class="view-full-screen" href="img/product/Main.png"  data-lightbox="roadtrip" data-title="My caption">
											<i class="zmdi zmdi-zoom-in"></i>
										</a> -->
									</div>
									
								</div>	
								<!-- Single-pro-slider Big-photo end -->								
								<div class="product-info mt-30">
									<div class="fix">
										<h4 class="post-title floatleft" style="font-size:20px;">dummy Product name</h4>
										<!-- <span class="pro-rating floatright">
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<span>( 27 Rating )</span>
										</span> -->
									</div>
									<div class="fix mb-30">
										<span class="pro-price" style="font-size:18px">AED 56.20</span>
									</div>
									<div class="product-description" >
										<p style="font-size:18px">There are many variations of passages of Lorem Ipsum available, but the majority have be suffered alteration in some form, by injected humou or randomised words which donot look even slightly believable. If you are going to use a passage of Lorem Ipsum. </p>
									</div>
									<!-- color start -->								
 
									<!-- color end -->
									<!-- Size start -->
									<span class="color-title text-capitalize mb-20" style="font-size:18px;text-transform:uppercase">size</span>
									<div class="size-filter single-pro-size mb-35 clearfix">
										<ul> 
											<li class="sizestyle"><a href="#">S</a></li>
											<li class="sizestyle active"><a href="#">M</a></li> 
											<li class="sizestyle"><a href="#">L</a></li> 
										</ul>
									</div>
									<!-- Size end -->
									<div>

									</div>

									<!-- Single-pro-slider Small-photo end -->
								</div>
							</div>
						</div>
						<!-- Single-product end -->
					</div>
					<!-- single-product-tab start -->

					<!-- single-product-tab end -->
				</div>
			</div>



<section class="brandsslider slider" style="width:90%;text-align:center;margin:auto; background-color:#f2f3f8">

<div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
	<div class="product-img">
		<a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
		<div class="product-action clearfix">

		</div>
	</div>
</div>

<div class="brand-slide    col-lg-4 col-xs-12 hidden-md hidden-sm">
	<div class="product-img">
		<a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
		<div class="product-action clearfix">

		</div>
	</div>
</div>

<div class="brand-slide   col-lg-4 col-xs-12 hidden-md hidden-sm">
	<div class="product-img">
		<a href="single-product.html">
			<img src="img/product/8.jpg" alt="" /></a>
		<div class="product-action clearfix">

		</div>
	</div>
</div>

<div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
	<div class="product-img">
		<a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
		<div class="product-action clearfix">

		</div>
	</div>
</div>

<div class="brand-slide  col-lg-4 col-xs-12 hidden-md hidden-sm">
	<div class="product-img">
		<a href="single-product.html"><img src="img/product/8.jpg" alt="" /></a>
		<div class="product-action clearfix">

		</div>
	</div>
</div>

</section>
@endsection