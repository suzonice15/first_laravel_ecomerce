<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Orders';
        $data['active'] = 'All Orders';
        $data['title'] = '  ';
        $orders= DB::table('order_data')->orderBy('order_id', 'desc')->paginate(10);
        return view('admin.order.index', compact('orders'),$data);
    }
    public  function  pagination(Request $request){
        if($request->ajax())
        {

            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $orders = DB::table('order_data')->orWhere('order_id','LIKE','%'.$query.'%')
                ->orWhere('customer_phone','LIKE','%'.$query.'%')
                ->orWhere('customer_name','LIKE','%'.$query.'%')->orderBy('order_id', 'desc')
                ->paginate(10);
            return view('admin.order.pagination', compact('orders'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Orders';
        $data['active'] = 'All orders';
        $data['title'] = '  ';
        $data['order']=DB::table('order_data')->where('order_id',268)->first();


        $data['couriers']=DB::table('courier')->get();
        $data['products']=DB::table('product')->select('product_id', 'product_title','sku')->orderby('product_id','desc')->get();


        return view('admin.order.create', $data);

    }
    public function store(Request $request)
    {
        $data['order_status'] = $request->order_status;
        $order_status = $request->order_status;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['created_time'] = date("Y-m-d H:i:s");
        $data['created_by'] = 'Staff';
        $data['modified_time'] = date("Y-m-d H:i:s");
        $data['order_date'] = date("Y-m-d");
        $data['order_total'] =$request->order_total;
        $data['products'] = serialize($request->products);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;

        $data['staff_id'] = 5;
        //$data['delevery_address'] = $request->delevery;
        //  $data['shipping_charge'] = $request->shipping_charge');
        //  $data['discount'] = $request->discount');
        $data['order_note'] = $request->order_note;
        //   $data['payment_type'] = $request->payment_type;
        // $data['city'] = $request->city');
        //$row_data['order_remark'] = $request->order_remark');




        if ($order_status == 'delivered') {

        }


        // $customer_name = $data['customer_name'];
        // $customer_email = $data['customer_email'];
        // $site_title = get_option('site_title');
        // $site_email = get_option('email');



        if($request->shipment_time) {

            $data['shipment_time'] = date('Y-m-d H:i:s', strtotime($request->shipment_time));
        }


        $order_data=DB::table('order_data')->insertGetId($data);

        echo $order_data;



        if ($order_data) {


          return  redirect('admin/orders')->with('success', 'Created successfully.');
        } else {

            return redirect('admin/orders/')->with('error', 'Error to Create this order');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['main'] = 'Orders';
        $data['active'] = 'Update Orders';
        $data['title'] = 'Update Orders Data';
        $data['order']=DB::table('order_data')->where('order_id',$id)->first();

       
        $data['couriers']=DB::table('courier')->get();
        $data['products']=DB::table('product')->select('product_id', 'product_title','sku')->orderby('product_id','desc')->get();
       


            return view('admin.order.edit', $data);
       


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order_number = $id;
        $data['order_status'] = $request->order_status;

        $order_status = $request->order_status;
        $shipping_charge = $request->shipping_charge;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['modified_time'] = date("Y-m-d H:i:s");
        $data['order_total'] =$request->order_total;
        $data['products'] = serialize($request->products);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        //$data['delevery_address'] = $request->delevery;
      //  $data['shipping_charge'] = $request->shipping_charge');
      //  $data['discount'] = $request->discount');
        $data['order_note'] = $request->order_note;
     //   $data['payment_type'] = $request->payment_type;
       // $data['city'] = $request->city');
        //$row_data['order_remark'] = $request->order_remark');




        if ($order_status == 'delivered') {

        }


       // $customer_name = $data['customer_name'];
       // $customer_email = $data['customer_email'];
       // $site_title = get_option('site_title');
       // $site_email = get_option('email');



        if($request->shipment_time) {

            $data['shipment_time'] = date('Y-m-d H:i:s', strtotime($request->shipment_time));
        }



//        if ($order_status == 'cancled') {
//            ob_start();
//            include('applications/views/emails/email-header.php');
//            include('applications/views/emails/cancle-order.php');
//            include('applications/views/emails/email-footer.php');
//            $email_body = ob_get_clean();
//        } elseif ($order_status == 'completed') {
//            ob_start();
//            include('applications/views/emails/email-header.php');
//            include('applications/views/emails/complete-order.php');
//            include('applications/views/emails/email-footer.php');
//            $email_body = ob_get_clean();
//        } else {
//            ob_start();
//            include('applications/views/emails/email-header.php');
//            include('applications/views/emails/order-content.php');
//            include('applications/views/emails/email-footer.php');
//            $email_body = ob_get_clean();
//        }
     //   $order_data = $this->MainModel->updateData('order_id', $order_number, 'order_data', $data);
        $order_data=DB::table('order_data')->where('order_id',$order_number)->update($data);



        if ($order_data) {

          return  redirect('admin/orders')
                ->with('success', 'Updated successfully.');
        } else {

           return redirect('admin/order/'.$order_number)
                ->with('success', 'Error to update this order');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
