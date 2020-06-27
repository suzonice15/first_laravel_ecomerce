
    <div class="container">
        <h3>Wishlist</h3> <table class="table table-striped table-bordered">

            <thead>
            <tr>
                <th class="name">Product</th>
                <th class="quantity">Availability</th>
                <th class="price">Price</th>
                <th class="total text-center">Action</th>
            </tr>
            </thead>

            <tbody>

            <?php if($products): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                    if ($product->discount_price) {
                        $sell_price = $product->discount_price;
                    } else {
                        $sell_price = $product->product_price;
                    }
                    ?>
                    <tr>
                        <td class="name">
                            <a href="<?php echo e(url('/products/')); ?>/<?php echo e($product->product_title); ?>">
                                <img
                                    src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>"
                                    alt="Menz full sleev polo-shirt-4327" width="30"> <?php echo e($product->product_title); ?> </a></td>
                        <td class="quantity">
                            <div class="availability">In Stock</div>
                        </td>
                        <td class="price">৳<?php echo e($sell_price); ?>.00</td>
                        <td class="total text-center" width="8%">
                            <a href="javascript:void(0)" data-product_id="<?php echo e($product->product_id); ?>" data-picture="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>" class="btn btn-primary add_to_cart icon"
                            > <i
                                    class="fa fa-shopping-cart"></i> </a> <a href="javascript:void(0)" class="remove_wish_list"
                                                                             date-product_id="<?php echo e($product->product_id); ?>"> <i
                                    class="tooltip-test font24 fa fa-remove" data-original-title="Remove"></i> </a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <tr>

                    <td class="quantity">
                        There are no product to your whislised
                    </td>


                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
<?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/website/wishlist_ajax.blade.php ENDPATH**/ ?>