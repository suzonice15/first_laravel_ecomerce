@extends('website.master')
@section('mainContent')
<style>
    .home_print_mobile_class{

    }
    .thank_you_class{
        font-size: 20px;
        background-color:
            green;
        width: 100%;
        height: auto;
        margin-top: 28px;
        color:
            white;
        padding: 8px 8px;
    }

    @media (max-width: 576px) {
        .thank_you_class{
            font-size: 20px;
            background-color:
                green;
            width: 100%;
            height: auto;
            margin-top: 28px;
            color:
                white;
            padding: 8px 8px;
        }
        .order_tank_you_class{
            width: 107%;
        }
    }
</style>



<div class="container">
    <h1 class="text-center  col-12 thank_you_class"
    >Thank you.
        Your Order has been Completly Succesful.</h1>
    <div class="row  order_tank_you_class">


        <?php
        if ((isset($order))) { ?>


        <div class="col-md-12 col-12">

                <div class="panel panel-primary">
                    <div class="panel-heading"><b>
                            Order Details
                        </b>
                    </div>

                    <div class="panel-body">

                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <h4> </h4>

                        </div>
                        <div class="col-md-2 col-sm-12">
                            <a href="{{url('/')}}" class="btn btn-info  d-print-none">
                                <span class="fa fa-backward"></span> BACK TO HOME
                            </a>
                        </div>

                        <div class="col-md-2 col-sm-12">


                            <button  onclick="window.print()"class="btn btn-info print  d-print-none"
                            ><i
                                    class="fa fa-download"></i>  DOWNLOAD
                            </button>

                        </div>


                </div>
                <div class="panel-body">
                    <div class="cart-info">

                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Order Number</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                    <span class="bold totalamout"><b><?php echo $order->order_id; ?></b></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Customer Name</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                                    <span
                                                        class="bold totalamout"><b> <?= $order->customer_name; ?></b></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Customer Phone</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                                    <span
                                                        class="bold totalamout"><b><?= $order->customer_phone ?></b></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Customer Email</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                                    <span
                                                        class="bold totalamout"><b><?= $order->customer_email ?></b></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Customer Address</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                                    <span
                                                        class="bold totalamout"><b><?= $order->customer_address ?></b></span>
                                </td>
                            </tr>

                            </tbody>
                        </table>


                        <div style="overflow-x: scroll;">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th class="name" width="1%">Sl</th>
                                    <th class="name" width="40%">Products</th>
                                    <th class="name" width="10%">Product Code</th>
                                    <th class="name" width="1%">Qnt</th>
                                    <th class="name" width="20%">Price</th>
                                    <th class="name" width="25%">Sub-Total</th>
                                </tr>
                                <?php
                                $product_items = unserialize($order->products);
                                //echo '<pre>'; print_r($product_items); echo '</pre>';
                                $count = 1;
                                $total = 0;
                                foreach ($product_items['items'] as $product_id => $item) {


                                $totall = intval(preg_replace('/[^\d.]/', '', $item['subtotal']));

                                $total += $totall ;
                                $featured_image = isset($item['featured_image']) ? $item['featured_image'] : null;

                                $product=      single_product_information($product_id);
                                $sku=$product->sku;
                                $name=$product->product_name;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>


                                        <img src="<?= $featured_image ?>" height="30" width="30"/>
                                        <a target="_blank" href="{{url('/product')}}/{{$name}}"> <?= $item['name'] ?>
                                        </a>

                                    </td>



                                    <td> {{$sku}} </td>
                                    <td>   <?= $item['qty'] ?></td>
                                    <td>  @money($item['price'])  </td>
                                    <td>  @money($item['subtotal'])     </td>

                                </tr>
                                <?php
                                $count++;
                                }
                                ?>
                            </table>
                        </div>
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Sub Total</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                    <span class="bold totalamout"><b>@money($total)      </b></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Delivery Cost</b></span>
                                </td>
                                <td class="text-right" style="width:50%">
                                                    <span
                                                        class="bold totalamout"><b>@money($order->shipping_charge) </b></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="75%">
                                    <span class="extra bold totalamout"><b>Total</span>
                                </td>
                                <td class="text-right" style="width:50%">
                                                    <span
                                                        class="bold totalamout"><b>@money($order->order_total) </b></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        } else {
        ?><h1 class="error">Invalid Order Request!</h1><?php
        }
        ?>


    </div>
    </div>
</div>


@endsection



