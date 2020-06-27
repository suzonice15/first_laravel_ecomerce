
@extends('website.master')
@section('mainContent')


    <?php




    /*# product stock availability #*/
    $product_availabie = $product->product_stock;
    $product_availability = '<span class="text-success"> In Stock</span>';
    if ($product_availabie == 0) {
        $product_availability = '<span class="text-danger">Out Of Stock</span>';

    }
    ?>

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>Floral Print Buttoned</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">


                        <div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
                            <span id="hot_deal_product"></span>

                        </div>


                    </div>
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-productg">
                                        <div class="single-product-gallery-item">
                                                <img class="img-responsive" id="thum_image_hover" alt="" src="{{ url('/public/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}" />

                                        </div>

                                    </div>
                                    <!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                     <img class="img-responsive thum_image_hover " width="85" alt="" data-echo="{{ url('/public/uploads') }}/{{ $product->folder }}/{{ $product->feasured_image }}"/>

                                            </div>
                                            <div class="item">
                                                     <img class="img-responsive thum_image_hover " width="85" alt=""  data-echo="{{ asset('assets/font_end/')}}/images/products/p18.jpg"/>
                                             </div>

                                        </div>
                                        <!-- /#owl-single-product-thumbnails -->
                                    </div>
                                    <!-- /.gallery-thumbs -->
                                </div>
                                <!-- /.single-product-gallery -->
                            </div>
                            <!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h3 class="name">{{$product->product_title}}</h3>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.rating-reviews -->
                                    <div class="stock-container info-container m-t-2">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value" style="font-weight: bold"><?=$product_availability?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.stock-container -->
                                    @if($product->product_summary)
                                    <div class="description-container m-t-20">

                                       {{$product->product_summary}}

                                    </div>
                                @endif
                                    <!-- /.description-container -->
                                    <div class="price-container info-container m-t-2">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="price-box">
                                                    <?php
                                                    if ($product->discount_price) {
                                                        $sell_price = $product->discount_price;
                                                    } else {
                                                        $sell_price = $product->product_price;
                                                    }
                                                    ?>
                                                        <span class="price" style="color:black">


                                  @money($sell_price)
                                </span>


                                                        <?php
                                                        if($product->discount_price){


                                                        ?>
                                                        <span class="price-strike"
                                                              style="color:red;font-weight: bold">  @money($product->product_price) </span>

                                                        <?php


                                                        }
                                                        ?>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.price-container -->
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <span class="label">Quantity :</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" id="quantity_of_sell" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <a href="#" class="btn btn-primary">  ADD TO CART</a>
                                                <a href="#" class="btn btn-success"> BUY NOW  </a>
                                                <button data-product_id="{{ $product->product_id}}"  class="btn btn-success add-to-wishlist icon"
                                                        data-toggle="dropdown"
                                                        type="button">
                                                    <i class="icon fa fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>

                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12" style="padding:0">
                                                <h4 style="font-weight:bold;color:red"><i class="fa fa-address-book"> </i> ফোনে অর্ডারের জন্য ডায়াল করুন</h4>
                                                <div class="col-sm-6 col-xs-12" style="padding:0">
                                                    <h4 style="font-size:25px;margin: 15px 0 15px 0;text-align:center;color:red;font-weight:900;text-align: left">
                                                        <i class="fa fa-phone-square" style="padding-left:20px;color: green;">   </i> 01760 442 442 <br>
                                                        <i class="fa fa-phone-square" style="padding-left:20px;color: green;"> </i> 01841 305 335 <br>
                                                        <i class="fa fa-phone-square" style="padding-left:20px;color: green;"> </i>  01405 955 855<br>
                                                    </h4>
                                                </div>

                                                <div class="col-sm-12 col-md-12  col-xs-12" style="padding: 0">
                                                    <img style="width: 60px;padding: 10px" class="img-responsive pull-left mobile-icon" src="http://www.egbazar.com//front_asset/d.png" alt="Call azibto" title="Call azibto"><h3 class="font-size-title-mobile" style="font-weight: bold;font-size: 18px;text-align:left">   ঢাকায় ডেলিভারি খরচ: ৳ 50.00</h3>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-xs-12" style="padding:0">
                                                    <img style="width: 60px;padding: 10px" class="img-responsive pull-left  mobile-icon" src="http://www.egbazar.com//front_asset/od.png" alt="Call azibto" title="Call azibto"><h3 class="font-size-title-mobile" style="font-weight: bold;font-size: 18px;text-align:left">
                                                        ঢাকার বাইরের ডেলিভারি খরচ: ৳ 100.00
                                                    </h3>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-xs-12" style="padding:0">
                                                    <img style="width: 60px;padding: 10px" class="img-responsive pull-left  mobile-icon" src="http://www.egbazar.com//front_asset/bk.png" alt="Call azibto" title="Azibto  "><h3 class="font-size-title-mobile" style="font-weight: bold;font-size: 18px;text-align:left">
                                                        বিকাশ মার্চেন্ট নাম্বার: 01309-806797
                                                    </h3>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.row -->
                                    </div>

                                    <!-- /.quantity-container -->
                                </div>
                                <!-- /.product-info -->
                            </div>
                            <!-- /.col-sm-7 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-4">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li class="active"><a data-toggle="tab" href="#tearm">terms and condition</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>

                                </ul>
                                <!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-8">
                                <div class="tab-content">
                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                           {{$product->product_description}}
                                        </div>
                                    </div>
                                    <div id="tearm" class="tab-pane in ">
                                        <div class="product-tab">
                                            {{$product->product_description}}
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>
                                                </div>
                                                <!-- /.reviews -->
                                            </div>
                                            <!-- /.product-reviews -->
                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- /.table .table-bordered -->
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.review-table -->
                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div>
                                                            <!-- /.action -->
                                                        </form>
                                                        <!-- /.cnt-form -->
                                                    </div>
                                                    <!-- /.form-container -->
                                                </div>
                                                <!-- /.review-form -->
                                            </div>
                                            <!-- /.product-add-review -->
                                        </div>
                                        <!-- /.product-tab -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">
                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">
                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">
                                                    </div>
                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div>
                                                <!-- /.form-container -->
                                            </form>
                                            <!-- /.form-cnt -->
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form>
                                            <!-- /.form-cnt -->
                                        </div>
                                        <!-- /.product-tab -->
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.product-tabs -->

                    <section class="section featured-product wow fadeInUp">
                        <span id="related_product"></span>

                                </section>
                    <!-- /.section -->
                </div>
                <!-- /.col -->
                <div class="clearfix"></div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->
    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">


    <script>
        $(".thum_image_hover").on("mouseover", function () {
          let  image=$(this).attr('src');
         $("#thum_image_hover").attr('src',image);


        });
    </script>

    <script>
        jQuery(document).ready(function () {




                $.ajax({

                    url:"{{url('hotdeal/product')}}",
                    method: "get",
                    success: function (data) {
console.log(data.html)
                         jQuery("#hot_deal_product").html(data.html);
                        jQuery(".sidebar-carousel").owlCarousel({
                            items : 1,
                            navigation : true,
                            itemsDesktopSmall :[979,2],
                            itemsDesktop : [1199,2],
                            slideSpeed : 300,
                            pagination: false,
                            paginationSpeed : 400,
                            navigationText: ["", ""]
                        });

                    }
                });
            });

    </script>

    <script>
        jQuery(document).ready(function () {


            var product_id = jQuery('input[name=product_id]').val();



            $.ajax({

                url:"{{url('related/product')}}?product_id="+product_id,
                method: "get",
                success: function (data) {
                    console.log(data.html)
                    jQuery("#related_product").html(data.html);
                    jQuery(".home-owl-carousel").owlCarousel({
                        items : 4,
                        navigation : true,
                        itemsDesktopSmall :[979,2],
                        itemsDesktop : [1199,2],
                        slideSpeed : 300,
                        pagination: false,
                        paginationSpeed : 400,
                        navigationText: ["", ""]
                    });

                }
            });
        });

    </script>



@endsection
