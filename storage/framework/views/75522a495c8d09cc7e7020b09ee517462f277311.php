<?php if(isset($orders)): ?>
    <?php $i=$orders->perPage() * ($orders->currentPage()-1);?>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($order->order_id); ?></td>
            <td><?php echo e($order->customer_name); ?></td>
            <td><span class="label label-info"><?php echo e($order->customer_phone); ?><span class="label label-success"></td>
            <td><?php echo e($order->order_area); ?></td>
            <td><?php echo e($order->customer_address); ?></td>
            <td>sujon</td>
            <td><?php echo e($order->order_total); ?></td>
            <td><?php echo e($order->shipping_charge); ?></td>
            <td><span class="label label-success"><?php echo e($order->order_status); ?></span></td>
            <td><?php echo e(date('d-F-Y h:i:s a',strtotime($order->created_time))); ?></td>
            <td><?php echo e(date('d-F-Y h:i:s a',strtotime($order->shipment_time))); ?></td>
            <td>
                <a title="edit" href="<?php echo e(url('admin/order')); ?>/<?php echo e($order->order_id); ?>">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>

                
                    
                
            </td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td colspan="3" align="center">
            <?php echo $orders->links(); ?>

        </td>
    </tr>
<?php endif; ?>


<?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/admin/order/pagination.blade.php ENDPATH**/ ?>