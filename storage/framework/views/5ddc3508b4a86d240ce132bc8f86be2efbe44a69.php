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
                        <a href="<?php echo e(url('product')); ?>/<?php echo e($product->product_name); ?>">
                            <img
                                src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>"
                                alt="">

                        </a>


                    </div>
                    <!-- /.image -->
                 </div>
                <!-- /.product-image -->
                <div class="product-info text-left">

                    <div class="product-price">
                                <span class="price">


                                  <?php echo '৳ ' . number_format($sell_price, 2); ?>
                                </span>
                        <?php
                        if($product->discount_price){


                        ?>
                        <span class="price-before-discount"
                              style="color:red">  <?php echo '৳ ' . number_format($product->product_price, 2); ?> </span>

                        <?php


                        }
                        ?>

                       <p  style="margin: -3px 1px;" >Product Code:<?php echo e($product->sku); ?></p>
                        <h3 style="margin-top: 2px;margin-bottom: -2px;"   class="name">
                            <a href="<?php echo e(url('product')); ?>/<?php echo e($product->product_name); ?>">

                                <?php echo e($product->product_title); ?>

                            </a>
                        </h3>


                    </div>



                      <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">

                            <li class="add-cart-button">
                                <button data-product_id="<?php echo e($product->product_id); ?>" data-picture="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>" class="btn btn-primary add_to_cart"
                                        type="button">Add to cart
                                </button>
                            </li>
                            <li class="add-cart-button btn-group">

                                <button data-product_id="<?php echo e($product->product_id); ?>" data-picture="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>" class="btn btn-primary buy-now-cart icon"
                                        data-toggle="dropdown"
                                        type="button">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>

                            </li>
                            <li class="lnk wishlist">
                                <a class="add-to-wishlist" data-product_id="<?php echo e($product->product_id); ?>" href="javascript:void(0)" title="Wishlist">
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
<?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/website/related_product.blade.php ENDPATH**/ ?>