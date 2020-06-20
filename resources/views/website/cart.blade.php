@extends('website.master')
@section('mainContent')


    <div class="container-fluid" id="cart">

        <div class="row order_tank_you_class">


        <?php


            if ( !Cart::isEmpty()){ ?>

            <div class="col-md-12  col-lg-12 col-12 ">


                <div class="card">
                    <div class="card-header">Order Review
                    </div>
                    <div class="card-body">


					<span class="checkout-fields">


							<div class="checkoutstep">
                                <div class="cart-info" >
<div style="overflow-x:scroll;">
                                    <table class="table table-striped table-bordered" >
                                        <tbody>
                                        <tr>
                                            <th width="5%" class="name">Sl</th>
                                            <th   width="40%"  class="name">Products</th>
                                            <th  width="10%" class="name">Code</th>
                                            <th  width="20%" class="name">Quantity</th>
                                            <th   width="10%" class="name">Price</th>
                                            <th   width="10%" class="name">Total</th>
                                            <th   width="5%" class="total text-right">Remove </th>
                                        </tr>

                                        <?php
                                        $quntity = 0;
                                        $count=0;
                                        $items = \Cart::getContent();

                                        foreach ($items as $row) {
                                    //    $subTotal = \Cart::getSubTotal();
                                        $total = \Cart::getTotal();
                                        $subTotal_price=$row->price*$row->quantity;
                                        $imagee=$row->attributes['picture'];
                                        $product_id=$row->id;


                                        ?>
                                            <tr id="<?=$row->id?>">
                                                <td>


                                                    <?php echo ++$count; ?>
                                                </td>
                                                <td>
                                                    <img src="<?=$imagee?>" width="30">

                                                    <a href="" target="_blank"><?=$row->name?></a>
                                                </td>
                                                <td>
                                                   33
                                                </td>


                                                  <td>
                                <a class="btn btn-xs btn-info  plus_cart_item" id="<?=$row->id;?>" href="javascript:void(0);">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                                <span id="cart_quantity_{{$row->id}}"> <?=$row->quantity;?></span>
                                <a class="btn  btn-xs btn-danger minus_cart_item" id="<?=$row->id;?>" href="javascript:void(0);">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                            </td>

                                                <td>
													<span
                                                        id="per_poduct_price"> <?= $row->price ?></span>
                                                    টাকা
                                                </td>
                                                <td>
												<span id="per_poduct_total_price_<?= $row->id?>">
												 <?=$subTotal_price?>
													</span>
                                                    টাকা


                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                       onclick="CartDataRemove('<?= $row->id?>')"
                                                       style="color:red ;font-weight: bold;padding: 2px 5px;margin-left: 12px;">
                                                        <i class="fa fa-remove" title="Remove"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>

</div>

                                    <table class="table table-striped table-bordered review_cost">
                                        <tbody>

                                       <tr>
                                            <td>
                                                <span class="extra bold totalamout">Total</span>
                                            </td>
                                            <td class="text-right">
													<span class="bold totalamout">৳ <span
                                                            id="total_cost"><?= $total ?></span></span>


                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
									  <a style="margin-left: 1px;" href="{{ url('/') }}/chechout"  class="btn btn-info">Checkout</a>


                    <a  href="{{ url('/') }}"    style="background-color:#FF6061;border: none" class="btn btn-info" >continue shopping</a>
                                </div>
                            </div>

                    </span>

                </div>


            </div>
            <?php } else { ?>
            <div class="col-md-12 text-center"><a href="{{ url('/') }}"><img style="margin-bottom: -68px"
                                                                                       src="{{ url('/') }}images/stop.png"/></a>
            </div>
            <div class="col-md-12 mt-5 text-center">
                <h1 class="text-danger text-center text-capitalize">You have no product in your cart.
                </h1>
                <a class="text-center text-capitalize btn btn-info" href="{{ url('/') }}"> back to home</a>
            </div>
            <?php } ?>

        </div>

    </div>

    </div>
    <script>
        $('.plus_cart_item').click(function () {
          let product_id= $(this).attr('id');
          let quantity=$('#cart_quantity_'+product_id).text();
            quantity=quantity.trim();

            jQuery.ajax(

                {

                    url:"{{url('/plus_cart_item')}}?product_id="+product_id,
                    type: "get",


                })

                .done(function(data)

                {
                    $('body .count').text(data.result.count);
                    $('body .value').text(data.result.total);

                    jQuery("#cart").html(data.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    // alert('server not responding...');

                });


        })
    </script>

    <script>
        $('.minus_cart_item').click(function () {
            let product_id= $(this).attr('id');
            let quantity=$('#cart_quantity_'+product_id).text();
            quantity=quantity.trim();

            jQuery.ajax(

                {

                    url:"{{url('/minus_cart_item')}}?product_id="+product_id,
                    type: "get",


                })

                .done(function(data)

                {
                    $('body .count').text(data.result.count);
                    $('body .value').text(data.result.total);

                    jQuery("#cart").html(data.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    // alert('server not responding...');

                });


        })
    </script>

    <script>
        function CartDataRemove(id){


            jQuery.ajax(

                {

                    url:"{{url('/remove_cart_item')}}?product_id="+id,
                    type: "get",


                })

                .done(function(data)

                {

                    $('body .count').text(data.result.count);
                    $('body .value').text(data.result.total);

                    jQuery("#cart").html(data.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    // alert('server not responding...');

                });


        }
    </script>

@endsection
