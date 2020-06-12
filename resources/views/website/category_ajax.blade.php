@if($products)
    @foreach($products as $product)

        <?php
        if ($product->discount_price) {
            $sell_price = $product->discount_price;
        } else {
            $sell_price = $product->product_price;
        }
        ?>

        <div class="col-xs-6 col-sm-6 col-md-2 wow fadeInUp">
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


                    </div>
                    <div class="product-info text-left">
                        <h3 class="name"><a
                                href="{{ url('product') }}/{{$product->product_name}}">{{$product->product_title}}</a>
                        </h3>
                        <div style="display: none" class="rating rateit-small"></div>
                        <br>
                        <span >product code:{{$product->sku}}</span>

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
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                    <button data-product_id="{{ $product->product_id}}" data-picture="{{ url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image}}" class="btn btn-primary add_to_cart icon"
                                            data-toggle="dropdown"
                                            type="button">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                    <button class="btn btn-primary  cart-btn"
                                            type="button">Add to cart
                                    </button>
                                </li>
                                <li class="lnk wishlist">
                                    <a class="add-to-cart" href="detail.html"
                                       title="Wishlist">
                                        <i class="icon fa fa-heart"></i>
                                    </a>
                                </li>
                                <li class="lnk">
                                    <a class="add-to-cart" href="detail.html"
                                       title="Compare">
                                        <i class="fa fa-signal"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
@endif
