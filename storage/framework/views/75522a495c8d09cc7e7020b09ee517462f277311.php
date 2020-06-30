<?php if(isset($orders)): ?>
    <?php $i=$orders->perPage() * ($orders->currentPage()-1);?>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($order->order_id); ?></td>
            <td><?php echo e($order->customer_name); ?></td>
            <td><span class="label label-info"><?php echo e($order->customer_phone); ?><span class="label label-success"></span></td>
            <td><span class="label label-success"><?php if($order->order_area=='inside'): ?>
                Inside Dhaka <?php else: ?> Outside Dhaka <?php endif; ?>
                </span></td>
            <td><?php echo e($order->customer_address); ?></td>
            <td><?php echo e($order->created_by); ?></td>
            <td> <?php echo '৳ ' . number_format($order->order_total, 2); ?>
                </td>
            <td> <?php echo '৳ ' . number_format($order->shipping_charge, 2); ?></td>
            <td><span class="label label-success"><?php echo e($order->order_status); ?></span></td>
            <td><?php echo e(date('d-F-Y H:i:s a',strtotime($order->created_time))); ?></td>

            <td>
                <a title="edit" href="<?php echo e(url('admin/order')); ?>/<?php echo e($order->order_id); ?>">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>

                
                    
                
            </td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td colspan="13" align="center">
            <?php echo $orders->links(); ?>

        </td>
    </tr>
<?php endif; ?>


<?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/admin/order/pagination.blade.php ENDPATH**/ ?>