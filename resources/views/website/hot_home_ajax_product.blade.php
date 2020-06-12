<!-- BEST SELLER  -->
<div class="best-deal wow  outer-bottom-xs">
    <h3 class="section-title">Best seller</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
            @if($products)
                @foreach($products as $product)
                    <?php

                    if ($product->discount_price) {
                        $sell_price = $product->discount_price;
                    } else {
                        $sell_price = $product->product_price;
                    }

                    ?>

                    <div class="item">
                        <div class="products best-product">

                            <div class="product">
                                <div class="product-micro">
                                    <div class="row product-micro-row">
                                        <div class="col col-xs-5">
                                            <div class="product-image">
                                                <div class="image">
                                                    <a href="{{ url('product') }}/{{$product->product_name}}">

                                                        <img  src="{{ url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2 col-xs-7">
                                            <div class="product-info">
                                                <h3 class="name"><a href="{{ url('product') }}/{{$product->product_name}}">{{ $product->product_title }}</a></h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price">
                                <span class="price">
                              {{$sell_price}} 				</span>
                                                    <?php
                                                    if($product->discount_price){


                                                    ?>
                                                    <span class="price-before-discount"
                                                          style="color:red">$ {{$product->product_price}}</span>

                                                    <?php


                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>
<!-- FEATURED PRODUCTS  -->
