<?php if(isset($categories)): ?>
    <?php $i=0;?>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($category->category_id); ?></td>

            <td><?php echo e($category->category_title); ?> </td>
            <td><?php echo e($category->category_name); ?> </td>
            <td><?php if($category->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
            <td><?php echo e(date('d-m-Y',strtotime($category->registered_date))); ?></td>
            <td>
                <a title="edit" href="<?php echo e(url('admin/category')); ?>/<?php echo e($category->category_id); ?>">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>


                <a title="delete" href="<?php echo e(url('admin/category/delete')); ?>/<?php echo e($category->category_id); ?>" onclick="return confirm('Are you want to delete this information :press Ok for delete otherwise Cancel')">
                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                </a></td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td colspan="6" align="center">
            <?php echo $categories->links(); ?>

        </td>
    </tr>
<?php endif; ?>


<?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/admin/category/pagination.blade.php ENDPATH**/ ?>