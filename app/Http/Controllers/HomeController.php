<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();
     //   $data['products']=DB::table('product')->get();
        $data['sliders']=DB::table('homeslider')->select('homeslider_title','target_url','homeslider_picture','homeslider_text')->where('status',1)->get();
       return view('website.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category_name)
    {

      //  $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();
       // SELECT DISTINCT* FROM `product` join category on category.category_id=product_category_relation.category_id WHERE category.category_name='electronics-items' SELECT DISTINCT* FROM `product` join product_category_relation on product_category_relation.product_id=product.product_id join category on category.category_id=product_category_relation.category_id WHERE category.category_name='electronics-items'
       $data['products'] =DB::table('product')->join('product_category_relation','product_category_relation.product_id','=','product.product_id')->join('category','category.category_id','=','product_category_relation.category_id')->where('category_name',$category_name)->orderBy('modified_time','DESC')->paginate(18);

$data['category_name']=$category_name;
        return view('website.category',$data);
     }
    public  function  ajax_category(Request $request){
        if($request->ajax())
        {

            $category_name = $request->get('category_name');
           // $query = str_replace(" ", "%", $query);
            $products =DB::table('product')->join('product_category_relation','product_category_relation.product_id','=','product.product_id')->join('category','category.category_id','=','product_category_relation.category_id')->where('category_name',$category_name)->orderBy('modified_time','DESC')->paginate(18);

          //  return view('website.category_ajax', compact('products'));
            $view = view('website.category_ajax',compact('products'))->render();

            return response()->json(['html'=>$view]);
        }

    }
    public   function hot_home_product(){
        $data['products']=DB::table('product')->orderBy('modified_time','desc')->get();
        $view = view('website.hot_home_ajax_product',$data)->render();
        return response()->json(['html'=>$view]);
    }
    public function home_page_category_ajax(){
       // $data['products']=DB::table('product')->get();
        $view = view('website.home_page_ajax_category')->render();
        return response()->json(['html'=>$view]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product($product_name)
    {
       // $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();
        $data['product']=DB::table('product')->select('*')->where('product_name',$product_name)->first();



        return view('website.product',$data);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search_engine(Request $request)
    {
        $search_query = $request->search_query;



        $search_query = str_replace(" ", "%", $search_query);
        $data['products'] = DB::table('product')->select('product_title','folder','feasured_image','product_price','sku','discount_price', 'product_name')->where('sku','LIKE','%'.$search_query.'%')
            ->orWhere('product_title','LIKE','%'.$search_query.'%')->paginate(10);
        $data['search_query']=$search_query;

        $view = view('website.search_engine',$data)->render();
        return response()->json(['html'=>$view]);



    }

    public  function search(Request $request){
        $search_query = $request->search;

        $search_query = str_replace(" ", "%", $search_query);
        $products= DB::table('product')->select('product_id','product_title','folder','feasured_image','product_price','sku','discount_price', 'product_name')->where('sku','LIKE','%'.$search_query.'%')
            ->orWhere('product_title','LIKE','%'.$search_query.'%')->get();
        if(count($products)==1){
            $product_url=url('/product').'/'.$products[0]->product_name;
          //  redirect($product_url;
            return redirect("$product_url");

        }
            return view('website.search', compact('products'));

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
