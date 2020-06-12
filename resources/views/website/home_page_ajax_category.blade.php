<?php
$categories=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();
if($categories){
foreach ($categories as  $category) {
    $category_id=$category->category_id;

$products= DB::table('product')->join('product_category_relation','product.product_id','=','product_category_relation.product_id')
        ->join('category','category.category_id','=','product_category_relation.category_id')->where('category.category_id',$category_id)->get();
?>
<section class="section featured-product wow fadeInUp">
    <h3 class="section-title"><a href="{{ url('/') }}/category/{{ $category->category_name }}">{{ $category->category_title }}</a></h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

        <?php


        if($products){
        foreach ($products as  $product){

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
                            </a>                        </div>

                    </div>
                    <div class="product-info text-left">
                        <h3 class="name"><a
                                href="{{ url('product') }}/{{$product->product_name}}">{{$product->product_title}}</a>
                        </h3>                        <div class="rating rateit-small"></div>


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
                                    <button  data-toggle="dropdown"
                                             type="button" class="btn btn-primary cart-btn" ><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </li>
                                <li></li>
                                <li class="lnk wishlist">
                                    <a class="add-to-cart" href="detail.html" title="Wishlist">
                                        <i class="icon fa fa-heart"></i>
                                    </a>
                                </li>
                                <li class="lnk">
                                    <a class="add-to-cart" href="{{ url('product') }}/{{$product->product_name}}" title="Compare">
                                        <i class="fa fa-signal" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>


            </div>
        </div>
            <?php } } ?>


    </div>
</section>

<?php

}
}
?>
