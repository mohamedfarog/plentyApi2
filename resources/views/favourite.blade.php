@extends('layout')
@section('content')

<section style="height:50px;">
</section>

<!-- Featured Product -->
<section class="section-wrap-sm new-arrivals ">
    <div class="purchase-online-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Favourites</h2>
                    </div>
                </div>
            </div>
            <section style="margin: auto;width:90%;text-align:center;" id="fav-product-panel">

            </section>

        </div>
    </div>
</section> <!-- end Featured Product -->

<div style="border-top: 2px solid #b2bad4;margin-top: 30px;">
    @include('footer')
</div>


<script>
    $(document).ready(function() {
        renderFavourites();
    });

    function renderFavourites() {

        let favourites = getFavouritesLocal().favourite_items

        url = base_url + 'storage/products/'
        let prod_element = ''
        favourites.forEach(element => {
            prod_element +=
                "<div class='producthover single-product col-lg-3 col-xs-6 hidden-md hidden-sm ' style='margin-bottom:30px;'>" +
                "<div class='product-img frame'>" +
                "<a href=''><img src='" + url + element.image + "' alt='' loading=lazy  class='imgz'/></a>" +
                "<div class='fix buttonsshow' style=''>" +
                "<span class='pro-price '><img class='featicons' src='img/nav/bag.png' loading=lazy style='width:25px;min-width:25px;filter: brightness(0) invert(1);'></span>" +
                "<span class='divitext' style=''>  </span> " +
                "<span class='pro-rating '><img class='featicons' src='img/nav/search.png' loading=lazy style='width:25px;min-width:25px;filter: brightness(0) invert(1);'></span>" +
                "</div>" +
                "<div class='product-action clearfix'></div></div>" +
                "<div class='product-info clearfix'>" +
                "<div class='fix'>" +
                "<h4 class='post-title floatcenter feattitle'><a href='#' style=>" + element.name_en + "</a></h4>" +
                "<p class='floatcenter hidden-sm featsubtitle  post-title'>" + "SAR " + element.price + "</p>" +
                "</div>" +
                "</div>" +
                "</div>"

        });
        $("#fav-product-panel").html(prod_element)
        $('.buttonsshow').css({
            'visibility': 'visible'
        });

    }
</script>
@endsection