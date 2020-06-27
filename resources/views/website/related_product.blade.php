<h3 class="section-title">Related products</h3>
<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
    <?php

     ?>

    <?php foreach ($products as $product) {

    if ($product->discount_price) {
        $sell_price = $product->discount_price;
    } else {
        $sell_price = $product->product_price;
    }

    ?>

    <div class="item item-carousel">
        <div class="products">
            <div class="product">
                <div class="product-image">
                    <div class="image">
                        <a href="{{ url('product') }}/{{$product->product_name}}">
                            <img
                                src="{{ url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}"
                                alt="">

                        </a>


                    </div>
                    <!-- /.image -->
                 </div>
                <!-- /.product-image -->
                <div class="product-info text-left">

                    <div class="product-price">
                                <span class="price">


                                  @money($sell_price)
                                </span>
                        <?php
                        if($product->discount_price){


                        ?>
                        <span class="price-before-discount"
                              style="color:red">  @money($product->product_price) </span>

                        <?php


                        }
                        ?>
                        <br>
                        Product Code:{{$product->sku}}
                    </div>


                    <p>
                        <a href="{{ url('product') }}/{{$product->product_name}}">

                            {{ $product->product_title }}
                        </a>
                    </p>


                      <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">

                            <li class="add-cart-button">
                                <button data-product_id="{{ $product->product_id}}" data-picture="{{ url('/public/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}" class="btn btn-primary add_to_cart"
                                        type="button">Add to cart
                                </button>
                            </li>
                            <li class="add-cart-button btn-group">

                                <button data-product_id="{{ $product->product_id}}" data-picture="{{ url('/public/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}" class="btn btn-primary buy-now-cart icon"
                                        data-toggle="dropdown"
                                        type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>

                            </li>
                            <li class="lnk wishlist">
                                <a class="add-to-wishlist" data-product_id="{{ $product->product_id}}" href="javascript:void(0)" title="Wishlist">
                                    <i class="icon fa fa-heart"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- /.cart -->
            </div>
            <!-- /.product -->
        </div>
        <!-- /.products -->
    </div>

    <?php  }?>

</div>
<!-- /.home-owl-carousel -->
