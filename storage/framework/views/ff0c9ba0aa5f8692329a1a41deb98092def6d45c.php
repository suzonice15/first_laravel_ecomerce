<?php $__env->startSection('pageTitle'); ?>
Add New Order

<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">


        <div class="col-sm-offset-0 col-md-12">


            <form name="product" action="<?php echo e(url('admin/order/store')); ?>" class="form-horizontal"
                  method="post"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>


                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-primary" style="border:2px solid #ddd">
                                <div class="box-header" style="background-color: #ddd;">
                                    <h3 class="box-title">Customer Information</h3>

                                </div>
                                <div class="box-body">

                                    <div class="order_data" id="customer_info_change"
                                         style="padding: 18px;">

                                        <div class="form-group ">
                                            <label for="billing_name">Name </label>


                                            <input required class="form-control" type="text" name="customer_name"
                                                   value=" "/>
                                        </div>


                                        <div class="form-group ">
                                            <label for="billing_email">Email</label>


                                            <input type="text" class="form-control" name="customer_email"
                                                   value=" "/>
                                        </div>


                                        <div class="form-group ">
                                            <label for="billing_email">Customer Phone</label>
                                            <input required type="text" name="customer_phone" class="form-control"
                                                   value=" "/>
                                        </div>


                                        <div class="form-group shipping-address-group ">
                                            <label for="shipping_address1">Customer Address </label>
                                                <textarea required class="form-control" rows="2" name="customer_address"
                                                          id="shipping_address1"></textarea>
                                        </div>


                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="box box-danger" style="border:2px solid #ddd">
                                <div class="box-header" style="background-color:#ddd">
                                    <h3 class="box-title">Actions</h3>
                                </div>
                                <div class="box-body">

                                    <div class="form-group" style="padding: 12px;">
                                        <label>Courier Service</label>
                                        <select name="courier_service" id="courier_service"
                                                class="form-control select2">
                                            <option value="">Select Courier</option>
                                            <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:

                                            <option value="<?php echo e($courier->courier_id); ?>"><?php echo e($courier->courier_name); ?> <?php if ($courier->courier_status == 1) {
                                                    echo " -Inside Dhaka";
                                                } else {
                                                    echo " -Outside Dhaka";
                                                }?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>


                                    <div class="form-group" style="padding: 11px;margin-top: -21px;">
                                        <label>Shipping Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>

                                            <input type="text" name="shipment_time"
                                                   class="form-control pull-right withoutFixedDate"
                                                   value="">
                                        </div>
                                    </div>


                                    <div class="form-group" style="padding: 11px;margin-top: -21px;">
                                        <label>Order Status</label>


                                        <select name="order_status" id="order_status" class="form-control">
                                            <option value="new">New</option>
                                            <option value="pending_payment">Pending for Payment</option>
                                            <option value="processing">On Process</option>
                                            <option value="on_courier">With Courier</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="refund">Refunded</option>
                                            <option value="cancled">Cancelled</option>
                                            <option value="completed">Completed</option>

                                        </select>
                                    </div>

                                    <div class="form-group" style="padding: 11px;margin-top: -21px;">
                                        <label>Shipping Charge</label>



                                            <input type="text" name="shipping_charge" id="shipping_charge"
                                                   class="form-control pull-right "
                                                   value="">

                                    </div>


                                    <div class="form-group" style="padding: 11px;margin-top: -21px;">
                                        <label> Order Note</label>


                                            <textarea rows="3" class="form-control"
                                                      name="order_note"><?php echo $order->order_note; ?></textarea>

                                    </div>



                            </div>
                        </div>

                    </div>


                    </div>

                    <div class="row">



                            <div class="col-md-12">
                                <div class="box box-primary" style="border:2px solid #ddd">
                                    <div class="box-header" style="background-color:#ddd">
                                        <h3 class="box-title">Product Information</h3>
                                    </div>
                                    <div class="box-body">
                           <span id="product_html">
                           <table class="table table-striped table-bordered">
                               <tr>
                                   <th class="name" width="30%">Product</th>
                                   <th class="name" width="5%">Code</th>
                                   <th class="image text-center" width="5%">Image</th>

                                   <th class="quantity text-center" width="10%">Qty</th>
                                   <th class="price text-center" width="10%">Price</th>
                                   <th class="total text-right" width="10%">Sub-Total</th>
                               </tr>

                               <tr>


                           </table>

                           </span>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="product_ids" id="product_ids" class="form-control select2"
                                                        multiple="multiple"
                                                        data-placeholder="Type... product name here..."
                                                        style="width:100%;">

                                                    <?php foreach($products as $product) :

                                                    $product_title=substr($product->product_title,0,50)


                                                    ?>
                                                    <option value="<?php echo e($product->product_id); ?>"



                                                    ><?php echo e($product_title); ?> - <?php echo e($product->sku); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>


                    </div>




                </div>



            </form>


            <script>

                $('#change_order_data').click(function () {
                    $('#customer_info_change').toggle();
                });


                $(document).on('click', '.update_items', function () {
                    var product_ids = [];
                    var product_qtys = [];
                    var _token = $("input[name='_token']").val();

                    var shipping_charge= $('#shipping_charge').val();
                    $.each($(".item_qty"), function () {
                        product_ids.push($(this).attr('data-item-id'));
                        product_qtys.push($(this).val());
                    });

                    product_ids = product_ids.join(",");
                    product_qtys = product_qtys.join(",");
                    //alert(_token)


                    $.ajax({
                        type: 'POST',
                        data: {
                            "product_ids": product_ids,
                            "product_qtys": product_qtys,
                            "shipping_charge":shipping_charge,
                            "_token":_token

                        },
                        url: "<?php echo e(route('productSelectionChange')); ?> ",
                        success: function (result) {
                            //  alert('success');
                            console.log('success')
                            //var response = JSON.parse(result);

                            console.log(result)
                            $('#product_html').html(result);
                        },
                        error:function (result) {
                            console.log('error')
                            console.log(result)
                        }
                    });
                });



            </script>


            <script>
                $(document).on('change', '#product_ids', function () {
                    var product_ids = [];
                    var product_qtys = [];
                    var _token = $("input[name='_token']").val();
                    var shipping_charge= $('#shipping_charge').val();


                    $.each($("#product_ids option:selected"), function () {
                        product_ids.push($(this).val());
                    });

                    product_ids = product_ids.join(",");


                    $.ajax({
                        type: "POST",
                        data: {shipping_charge:shipping_charge,product_id: product_ids, product_quantity: 1,_token:_token},

                        url: "<?php echo e(route('productSelection')); ?> ",
                        success: function (result) {

                            //  alert('success');
                            console.log('success')
                            //var response = JSON.parse(result);

                            console.log(result)
                            $('#product_html').html(result);
                        },
                        errors: function (result) {
                            console.log('error')
                            console.log(result)
                        }

                    });

                });

            </script>






<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/admin/order/create.blade.php ENDPATH**/ ?>