<?php $__env->startSection('mainContent'); ?>
<?php
$delivery=60;

 ?>

    <div class="container-fluid">

        <div class="row">
            <?php
            if ( !Cart::isEmpty()){
            ?>
            <div class="col-md-6 ">

                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Customer Information</b>
                    </div>
                    <div class="panel-body">
                        <form style="z-index: 10000000000" action="<?php echo e(url('/chechout')); ?>" id="checkout" name="checkout" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="checkoutstep">
                                <div class="form-group">

                                    <input required="" type="text" id="customer_name" name="customer_name" value="" class="form-control " placeholder="Type Your Name">
                                </div>
                                <div class="form-group">

                                    <input required="" type="text" id="customer_phone" name="customer_phone" value="" class="form-control " placeholder="Type Your Mobile">
                                    <p id="customer_phone_error" class="text-danger"></p>
                                </div>
                                <div class="form-group" hidden="">
                                    <label for="billing_name"><b>Email</b></label>

                                    <input type="text" name="customer_email" id="customer_email" value="" class="form-control " placeholder="Email">
                                    <p id="customer_email_error" class="text-danger"></p>
                                </div>
                                <div class="form-group">

                                    <select name="order_area" id="city" class="form-control">
                                        <option value="inside">Select Your Area</option>
                                        <option value="inside">In Dhaka City</option>
                                        <option value="outside">Out Of Dhaka City</option>

                                    </select>
                                </div>



                                <div class="form-group">

                                    <input type="text" id="customer_address" name="customer_address" class="form-control" placeholder="Type Your Address">
                                </div>

                                <div class="checkbox" hidden="">
                                    <label>
                                        <input type="checkbox" name="ship_to_billing" id="ship_to_billing" value="1">
                                        <b class="fgreen">Same as Customer Address </b>
                                    </label>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Confirm Order</button>
                            <a href="<?php echo e(url('/')); ?>" style="background-color:#FF6061;border: none" class="btn btn-info">Continue   Shopping</a>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-header"><b>Order Review</b>
                    </div>
                    <div class="panel-body">

							<div class="checkoutstep">
                                <div class="cart-info">
                                    <div class="table-responsive">
                                    <table class="table  table-bordered">
                                        <tbody>
                                        <tr>
                                            <th class="name" width="35%">Products</th>
                                            <th class="name" width="5%">Qnt</th>
                                            <th class="name" width="30%">Price</th>
                                            <th class="name" width="30%">Total</th>
                                        </tr>
                                        <?php
                                        $items = \Cart::getContent();
                                        //Cart::clear();
                                        foreach($items as $row) {

                                        $subTotal = \Cart::getSubTotal();
                                        $total = \Cart::getTotal();
                                        $subTotal_price=$row->price*$row->quantity;
                                        $imagee=$row->attributes['picture'];
                                        $product_id=$row->id;
                                        $total +=$delivery;
                                        ?>

                                                <tr id="<?php echo e($row->id); ?>">
                                                <td>
                                                    <img src="<?=$imagee?>"
                                                         width="30">

                                                    <p><?php echo e($row->name); ?></p>
                                                </td>

                                                <td>
                                                    <div class="quantity-action ">

                                                        <div class="col-md-1">
	<span id="quantity_value_<?php echo e($row->id); ?>">	<?php echo $row->quantity;?></span>
                                                        </div>



                                                    </div>
                                                </td>

                                                <td>
													<span id="per_poduct_price"> Tk <?php echo $row->price;?></span>

                                                </td>
                                                <td>
												<span id="per_poduct_total_price_181">Tk
												<?=$subTotal_price?>													</span>

                                                </td>
                                                <input type="hidden" name="products[items][<?=$product_id?>][featured_image]" value="<?=$imagee?>">
                                                <input type="hidden" id="product_quantity" name="products[items][<?=$product_id?>][qty]" value="<?php echo $row->quantity;?>">
                                                <input type="hidden" id="product_price" name="products[items][<?=$product_id?>][price]" value="<?php echo $row->price;?>">
                                                <input type="hidden" name="products[items][<?=$product_id?>][subtotal]" value="<?=$subTotal_price?>">
                                                <input type="hidden" name="products[items][<?=$product_id?>][name]" value="<?php echo $row->name;?>">


                                            </tr>

                                        <?php } ?>


                                            <tr>
                                                <input type="hidden" class="shipping_charge_in_dhaka" value="60">
                                                <input type="hidden" class="shipping_charge_out_of_dhaka" value="120">
                                            </tr>



                                        </tbody>
                                    </table>

                                   </div>



                                    <table class="table  table-bordered review_cost">
                                        <tbody>


                                        <tr>
                                            <td>
                                                <span class="extra bold">Sub-Total</span>
                                            </td>
                                            <td class="text-right">
													<span class="bold">Tk
														<span id="subtotal_cost">
														<?=$subTotal?>
                                                        </span>
													</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="extra bold">Delivery Cost
                                            </span></td>
                                            <td class="text-right">
													<span class="bold">Tk <span id="delivery_cost"> <?php echo e($delivery); ?></span></span>


                                                <input type="hidden" id="shipping_charge" name="shipping_charge" value="<?php echo e($delivery); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="extra bold totalamout">Total</span>
                                            </td>
                                            <td class="text-right">
													<span class="bold totalamout">Tk <span id="total_cost"><?=$total?></span></span>


                                                <input type="hidden" name="checkout_type" value="cash_on_delivery">
                                                <input type="hidden" name="order_total" value="<?php echo e($total); ?>">

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
            </div>


                </form>
            <?php } else { ?>
                <div class="col-md-12 text-center"><a href="<?php echo e(url('/')); ?>"><img style="margin-bottom: -68px"
                                                                                 src="<?php echo e(url('/')); ?>images/stop.png"/></a>
                </div>
                <div class="col-md-12 mt-5 text-center">
                    <h1 class="text-danger text-center text-capitalize">You have no product in your cart.
                    </h1>
                    <a class="text-center text-capitalize btn btn-info" href="<?php echo e(url('/')); ?>"> back to home</a>
                </div>
            <?php } ?>
        </div>




    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/website/checkout.blade.php ENDPATH**/ ?>