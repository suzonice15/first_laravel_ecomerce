<?php
$html = 'No Products Info. Found!';
if (count($products) > 0) {

?>
<table class="table table-striped table-bordered">
    <tr>
        <th class="name" width="30%">Product</th>
        <th class="name" width="5%">Code</th>
        <th class="image text-center" width="5%">Image</th>
        <th hidden class="image text-center" width="10%">Size</th>
        <th hidden class="image text-center" width="15%">Color</th>
        <th class="quantity text-center" width="10%">Qty</th>
        <th class="price text-center" width="10%">Price</th>
        <th class="total text-right" width="10%">Sub-Total</th>
    </tr>
    <?php
    $subtotall=0;
    foreach ($products as $prod) {
    $qty = $pqty[$prod->product_id];
    $total_quntity = $qty + $pqty[$prod->product_id];;

    if ($prod->discount_price) {
        $sell_price = floatval($prod->discount_price);


    } else {
        $sell_price = floatval($prod->product_price);

    }
    $subtotal = ($sell_price * $qty);
    $subtotall += $subtotal;
   //$totalamout = $subtotall;
 // $totalamout[] = $totalamout.'.00';
    $product_link = url('/') . 'product/' . $prod->product_name;
    $featured_image = url('/public') . '/uploads/' . $prod->folder . '/small/' . $prod->feasured_image;;//get_product_thumb($prod->product_id, 'thumb');

    //    $products_sku = DB::table('product')->select('sku')->first();
    //    $product_code =$products_sku->sku;



    ?>
    <tr>
        <td><a href=""><?=$prod->product_title?></a></td>
        <td><?=$prod->sku?></td>
        <td class="image text-center">
            <img src="<?=$featured_image?>" height="30" width="30">
        </td>
        </td>
        <td class="text-center">
            <input type="number" name="products[items][<?=$prod->product_id?>][qty]" class="form-control item_qty"
                   value="<?= $qty ?>" data-item-id="<?=$prod->product_id?>" style="width:60px;">
        </td>
        <td class="text-center">৳ <?=$sell_price ?>.00</td>
        <td class="text-right">৳ <?=$subtotal?>.00</td>
    </tr>
    <input type="hidden" id="featured_image" name="products[items][<?=$prod->product_id?>][featured_image]"  value="<?= $featured_image; ?>"/>

    <input type="hidden" id="price" name="products[items][<?=$prod->product_id?>][price]"  value="<?= $sell_price; ?>"/>
    <input type="hidden" id="name" name="products[items][<?=$prod->product_id?>][name]"  value="<?=  $prod->product_title; ?>"/>
    <input type="hidden" id="subtotal" name="products[items][<?=$prod->product_id?>][subtotal]"  value="<?= $subtotal; ?>"/>

    <?php



    }
    } ?>


</table>
<a class="btn btn-primary pull-right update_items">Change</a><br><br><br>
<?php
$order_total = $subtotall;
//$delivery_cost = $shipping_charge;//get_option('shipping_charge_in_dhaka');

$order_total = $order_total + $shipping_charge;
//$order_total = $order_total . '.00';
?>
<table class="table table-striped table-bordered">
    <tbody>
    <tr>
        <td>
            <span class="extra bold">Sub-Total</span>
        </td>
        <td class="text-right">
							<span class="bold">৳
								<span id="subtotal_cost">
									<?php echo $subtotall ?>.00
								</span>
							</span>
        </td>
    </tr>
    <tr>
        <td>
            <span class="extra bold">Delivery Cost</span>
        </td>
        <td class="text-right">
							<span class="bold">
                                <span id="delivery_cost">৳ <?=$shipping_charge?>.00
                                    <input type="hidden" id="shipping_charge" name="shipping_charge"
                                           value="<?= $shipping_charge; ?>"/>
							</span>
                            </span>


        </td>
    </tr>
    <tr>
        <td>
            <span class="extra bold totalamout">Total</span>
        </td>
        <td class="text-right">
            <input type="hidden" id="subtotal" name="order_total"  value="<?= $order_total; ?>"/>
            <span class="bold totalamout">৳ <span id="total_cost"><?php echo $order_total; ?>.00</span></span>

        </td>
    </tr>
    </tbody>
</table><?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/admin/order/product_selection_change.blade.php ENDPATH**/ ?>