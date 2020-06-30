<?php $__env->startSection('pageTitle'); ?>
    Update Category Registration Form
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">
        <?php if(count($errors) > 0): ?>
            <div class=" alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <ul>

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li style="list-style: none"><?php echo e($error); ?></li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
        <?php endif; ?>

        <div class="col-sm-offset-0 col-md-12">
            <form  name="category" action="<?php echo e(url('admin/category/update')); ?>/<?php echo e($category->category_id); ?>" class="form-horizontal"
                  method="post"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>


                <div class="box" style="border: 2px solid #ddd;">
                    <div class="box-header with-border" style="background-color: green;color:white;">
                        <h3 class="box-title">Category Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12" style="margin-left: 10px">
                                <div class="form-group">
                                    <label for="category_title">Category Name<span class="required">*</span></label>
                                    <input required="" type="text" id="category_title" class="form-control the_title"
                                           name="category_title" value="<?php echo e($category->category_title); ?>">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group ">
                                    <label for="category_name">Parmalink<span class="required">*</span></label>
                                    <input required="" type="text" class="form-control the_name" id="category_name"
                                           name="category_name"
                                           value="<?php echo e($category->category_name); ?>">
                                    <span id="categoryError"></span>
                                </div>


                                <div class="form-group">
                                    <label for="billing_name">Published Status<span class="text-danger">*</span></label>
                                    <select name="status" id="payment_type" class="form-control">
                                        <option value="1" style="background-color: red;">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6 col-sm-12" style="margin-left: 20px">
                                <div class="form-group">
                                    <label for="parent_id">Select Parent</label>
                                    <select class="form-control select2 " name="parent_id"
                                            tabindex="-1"
                                            aria-hidden="true">
                                        <option value="0" style="background-color: red;">--- choose ---</option>

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <option value="<?php echo e($cat->category_id); ?>"><?php echo e($cat->category_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="rank_order">Rank Order</label>
                                    <input type="text" class="form-control" name="rank_order"
                                           value="<?php echo e($category->rank_order); ?>">
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                </div>


                <div class="box box-success" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #00a65a;color:white">
                        <h3 class="box-title">SEO Options</h3>
                    </div>

                    <div class="box-body" style="padding: 26px;">

                        <div class="form-group">
                            <label for="seo_title"> Title</label>
                            <input type="text" class="form-control" name="seo_title" id="seo_title"
                                   value="<?php echo e($category->seo_title); ?>">
                        </div>
                        <div class="form-group "><label for="seo_meta_title">SEO Meta Title</label> <input
                                    type="text" class="form-control" name="seo_meta_title" id="seo_meta_title"
                                    value="<?php echo e($category->seo_meta_title); ?>">
                        </div>

                        <div class="form-group "><label for="seo_meta_content"> Meta Description</label> <textarea
                                    class="form-control" rows="2" name="seo_meta_content"
                                    id="seo_meta_content"><?php echo e($category->seo_meta_content); ?></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="seo_keywords">Meta Keywords</label>
                            <input type="text" class="form-control"
                                   name="seo_keywords"
                                   id="seo_keywords"
                                   value="<?php echo e($category->seo_keywords); ?>">
                        </div>
                        <div class="form-group ">
                            <label for="seo_content"> Content</label>
                            <textarea   class="form-control"
                                      rows="5" name="seo_content"
                                      ><?php echo e($category->seo_content); ?></textarea>

                        </div>


                    </div>
                </div>


                <div class="box-footer">
                    <input type="submit" class="btn btn-success pull-left" value="Update">

                </div>
            </form>


            </form>
        </div>
    </div>

    <script>

        document.forms['category'].elements['status'].value = "<?php echo e($category->status); ?>";
        document.forms['category'].elements['parent_id'].value = "<?php echo e($category->parent_id); ?>";


    </script>

    <script>
        $(document).ready(function () {
            $("#category_title").on('input click', function () {
                var text = $("#category_title").val();
                var _token = $("input[name='_token']").val();

                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $("#category_name").val(word);
                $.ajax({
                    data: {url: word, _token: _token},
                    type: "POST",
                    url: "<?php echo e(url('category-urlcheck')); ?>",
                    success: function (result) {

                        // $('#categoryError').html(result);
                        var str2 = "es";
                        var word = $("#category_name").val(word);
                        if (result) {
                            var text = $("#category_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            var word = word.concat(str2);
                            $("#category_name").val(word);

                        } else {
                            var text = $("#category_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            $("#category_name").val(word);
                        }
                    }
                });
            });


        });
    </script>




<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>