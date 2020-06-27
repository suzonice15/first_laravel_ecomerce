
@extends('website.master')
@section('mainContent')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">

            <!-- SIDEBAR : END  -->
            <!-- CONTENT -->
            <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">
                <!-- SECTION – HERO -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                       @if($sliders)
                           @foreach($sliders as $slider)
                        <div class="item" style="background-image: url({{ url('public/uploads/sliders')}}/{{$slider->homeslider_picture}});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">


                                    <div class="big-text fadeInDown-1">
                                        {{$slider->homeslider_title}}
                                    </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs">
                                        <span>   {{$slider->homeslider_text}}</span>
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="{{ $slider->target_url }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                           @endif
                    </div>
                </div>
                <!-- INFO BOXES  -->

                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Delivery </h4>
                                        </div>
                                    </div>
                                    <h6 class="text">One  Day Inside Dhaka</h6>
                                </div>
                            </div>
                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over 2,000</h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  SCROLL TABS  -->

                <!--  WIDE PRODUCTS  -->

                <!-- FEATURED PRODUCTS  -->
               <span class="home_page_category"></span>




                <span id="hot_ajax_product"></span>

            </div>
        </div>

    </div>
</div>

<script>

    jQuery.ajax(

        {

            url:"{{url('/home_page_category_ajax')}}",

            type: "get",



        })

        .done(function(data)

        {
            // console.log(data.html)
            if(data.html == " "){



            }


            jQuery(".home_page_category").html(data.html);

            jQuery('.home-owl-carousel').each(function(){

                var owl = $(this);
                var  itemPerLine = owl.data('item');

                if(!itemPerLine){
                    itemPerLine = 6;

                }
                owl.owlCarousel({
                    items : itemPerLine,
                    itemsTablet:[768,2],
                    navigation : true,
                    pagination : false,

                    navigationText: ["", ""]
                });
            });

        })

        .fail(function(jqXHR, ajaxOptions, thrownError)

        {

            // alert('server not responding...');

        });
</script>
    <script>

        jQuery.ajax(

            {

                url:"{{url('/hot_home_product')}}",

                type: "get",



            })

            .done(function(data)

            {
                // console.log(data.html)
                if(data.html == " "){



                }


                jQuery("#hot_ajax_product").html(data.html);
                jQuery(".best-seller").owlCarousel({
                    items : 4,
                    navigation : true,
                    itemsDesktopSmall :[979,2],
                    itemsDesktop : [1199,2],
                    slideSpeed : 300,
                    pagination: false,
                    paginationSpeed : 400,
                    navigationText: ["", ""]
                });


            })

            .fail(function(jqXHR, ajaxOptions, thrownError)

            {

                // alert('server not responding...');

            });
    </script>


@endsection
