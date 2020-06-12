<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  Cart;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
          $items = \Cart::getContent();


        $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();

        return view('website.checkout',$data);
    }
    public  function checkoutStore(Request $request){
        $data['order_status'] ='new';
        $data['shipping_charge'] = $request->shipping_charge;
        $data['created_time'] = date("Y-m-d H:i:s");
        $data['created_by'] = 'Customer';
    //    $data['modified_time'] = date("Y-m-d H:i:s");
        $data['order_date'] = date("Y-m-d");
        $data['order_total'] =$request->order_total;
        $data['products'] = serialize($request->products);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['staff_id'] = 0;

         $data['payment_type'] = $request->payment_type;
    //    $data['city'] = $request->city;







        // $customer_name = $data['customer_name'];
        // $customer_email = $data['customer_email'];
        // $site_title = get_option('site_title');
        // $site_email = get_option('email');



        $order_data=DB::table('order_data')->insertGetId($data);




        if ($order_data) {


            return  redirect('thank-you?order_id='.$order_data);
        } else {

            return redirect('/chechout')->with('error', 'Error to Create this order');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankYou(Request $request)
    {
        $items = \Cart::clear();

        $id= $request->order_id;
        $data['order']=DB::table('order_data')->where('order_id',$id)->first();
        $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();

        return view('website.thank_you',$data);



    }
    public function cart(){

   /////     $data['order']=DB::table('order_data')->where('order_id',$id)->first();
    //    $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();

        return view('website.cart');

    }

    public  function  plus_cart_item(Request $request){
        if($request->ajax())
        {

            $product_id = $request->get('product_id');
            Cart::update($product_id, array(
                'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));

            //  return view('website.category_ajax', compact('products'));
            $view = view('website.cart_ajax')->render();

            return response()->json(['html'=>$view]);
        }

    }

    public function minus_cart_item(Request $request){
        if($request->ajax())
        {

            $product_id = $request->get('product_id');
            Cart::update($product_id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));

            //  return view('website.category_ajax', compact('products'));
            $view = view('website.cart_ajax')->render();

            return response()->json(['html'=>$view]);
        }

    }
    public function remove_cart_item(Request $request){
        if($request->ajax())
        {

            $product_id = $request->get('product_id');
            Cart::remove($product_id);
            //  return view('website.category_ajax', compact('products'));
            $view = view('website.cart_ajax')->render();

            return response()->json(['html'=>$view]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
