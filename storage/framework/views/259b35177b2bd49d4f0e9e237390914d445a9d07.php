<?php $__env->startSection('mainContent'); ?>


    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Handbags</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs">
        <div class='container-fluid'>
            <div class='row'>

                <div class='col-md-12'>
                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">

                                        <?php if($products): ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                                                                    <a href="<?php echo e(url('product')); ?>/<?php echo e($product->product_name); ?>">
                                                                        <img
                                                                            src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>"
                                                                            alt="">
                                                                    </a>
                                                                </div>


                                                            </div>
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
                                                                </div>
                                                                <p  style="margin: -3px 1px;" >Product Code:<?php echo e($product->sku); ?></p>
                                                                <h3 style="margin-top: 2px;margin-bottom: -2px;"   class="name">
                                                                    <a href="<?php echo e(url('product')); ?>/<?php echo e($product->product_name); ?>">

                                                                        <?php echo e($product->product_title); ?>

                                                                    </a>
                                                                </h3>
                                                            </div>
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
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>


                                        <div class="ajax-load text-center" style="display:none">

                                            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.category-product -->
                            </div>

                        </div>
                        <!-- /.tab-content -->

                    </div>
                </div>
            </div>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/website/search.blade.php ENDPATH**/ ?>