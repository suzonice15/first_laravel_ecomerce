<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request)
    {

       $product_id=$request->product_id;
        $product=DB::table('product')->where('product_id',$product_id)->first();
       // $image=$product->

        if($product->discount_price){
            $price=$product->discount_price;

        } else{
            $price=$product->product_price;
        }
        $product_title=$product->product_title;
        $picture=$request->picture;
       //////////////$url url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }};
        Cart::add(array(
            'id' => $product_id, // inique row ID
            'name' => $product_title,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array('picture'=>$picture)
        ));
        $items = \Cart::getContent();
        //Cart::clear();
        $total=0;
        $quantity=0;
        foreach($items as $row) {

            $total = \Cart::getTotal();
            $quantity +=$row->quantity;

        }
        $quantity= Cart::getContent()->count();
//        $data['total']=$total;
//        $data['count']=$quantity;
        $data1=[
            'total'=>$total,
            'count'=>$quantity,
        ];

        return response()->json(['result'=>$data1]);



    }

    public  function index()
    {

        $cartCollection = Cart::getContent();
        print_r($cartCollection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
