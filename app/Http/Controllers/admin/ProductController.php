<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Image;
use  Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Products';
        $data['active'] = 'All users';
        $data['title'] = '  ';
        $products= DB::table('product')->orderBy('product_id', 'desc')->paginate(10);
      
        return view('admin.product.index', compact('products'),$data);
    }
    public  function  pagination(Request $request){
        if($request->ajax())
        {

            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $products = DB::table('product')->where('sku','LIKE','%'.$query.'%')
                ->orWhere('product_title','LIKE','%'.$query.'%')
                ->orderBy('product_id', 'desc')->paginate(10);
            return view('admin.product.pagination', compact('products'));
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Products';
        $data['active'] = 'All categories';
        $data['title'] = '  ';
        $data['categories']=DB::table('category')->where('parent_id',0)->orderBy('category_id','ASC')->get();
        return view('admin.product.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $media_path='uploads/'.$request->folder;
       $orginalpath=public_path().'/uploads/'.$request->folder;
        $small=$orginalpath.'/'.'small';
        $thumb=$orginalpath.'/'.'thumb';

        File::makeDirectory($small,$mode=0777,true,true);
        File::makeDirectory($thumb,$mode=0777,true,true);


        $data['product_title']=$request->product_title;
        $data['folder']=$request->folder;
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['purchase_price']=$request->purchase_price;
        $data['discount_price']=$request->discount_price;
        $data['product_summary']=$request->product_summary;
        $data['product_description']=$request->product_description;
        $data['product_terms']=$request->product_terms;
        $data['sku']=$request->sku;
        $data['product_stock']=$request->product_stock;
        $data['stock_alert']=$request->stock_alert;
        $data['product_video']=$request->product_video;
        $data['status']=$request->status;
        $data['created_time']=date('Y-m-d H:i:s');
        $data['modified_time']=date('Y-m-d H:i:s');
        $data['seo_title']=$request->seo_title;
        $data['seo_keywords']=$request->seo_keywords;
        $data['seo_content']=$request->seo_content;
   $product_id=DB::table('product')->insertGetId($data);


        $featured_image_orgianal = $request->file('featured_image');
        $product_image1 = $request->file('product_image1');
        $product_image2 = $request->file('product_image2');
        $product_image3 = $request->file('product_image3');
        $product_image4 = $request->file('product_image4');
        $product_image5 = $request->file('product_image5');
        $product_image6 = $request->file('product_image6');




        if($featured_image_orgianal) {

           // $image_name = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image = $product_id.'.'.$featured_image_orgianal->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_image = Image::make($featured_image_orgianal->getRealPath());
            $resize_image->resize(800, 800, function ($constraint) {

           })->save($destinationPath . '/' . $featured_image);

            $resize_image->resize(273, 273, function ($constraint) {

            })->save($thumb . '/' . $featured_image);

            $resize_image->resize(50, 50, function ($constraint) {

            })->save($small . '/' . $featured_image);
            $image_row_data['feasured_image']=$featured_image;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='featured_image';
            $media_data['media_path']=$media_path.'/'.$featured_image;
            DB::table('media')->insert($media_data);



        }
        if($product_image1){
            $random_number1= rand(10,100);
            $galary_image1 = $random_number1.'.'.$product_image1->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image1 = Image::make($product_image1->getRealPath());
            $resize_galary_image1->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image1);
            $image_row_data['galary_image_1']=$galary_image1;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='galary_image1';
            $media_data['media_path']=$media_path.'/'.$galary_image1;
            DB::table('media')->insert($media_data);
        }
        if($product_image2){
            $random_number2= rand(10,100);
            $galary_image2 = $random_number2.'.'.$product_image2->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image2 = Image::make($product_image2->getRealPath());
            $resize_galary_image2->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image2);
            $image_row_data['galary_image_2']=$galary_image2;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='galary_image2';
            $media_data['media_path']=$media_path.'/'.$galary_image2;
            DB::table('media')->insert($media_data);
        }
        if($product_image3){
            $random_number3= rand(10,100);
            $galary_image3 = $random_number3.'.'.$product_image3->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image3 = Image::make($product_image3->getRealPath());
            $resize_galary_image3->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image3);
            $image_row_data['galary_image_3']=$galary_image3;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='galary_image3';
            $media_data['media_path']=$media_path.'/'.$galary_image3;
            DB::table('media')->insert($media_data);
        }
        if($product_image4){
            $random_number4= rand(10,100);
            $galary_image4 = $random_number4.'.'.$product_image4->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image4 = Image::make($product_image4->getRealPath());
            $resize_galary_image4->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image4);
            $image_row_data['galary_image_4']=$galary_image4;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='galary_image4';
            $media_data['media_path']=$media_path.'/'.$galary_image4;
            DB::table('media')->insert($media_data);
        }
        if($product_image5){
            $random_number5= rand(10,100);
            $galary_image5 = $random_number5.'.'.$product_image5->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image5 = Image::make($product_image5->getRealPath());
            $resize_galary_image5->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image5);
            $image_row_data['galary_image_5']=$galary_image5;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='galary_image5';
            $media_data['media_path']=$media_path.'/'.$galary_image5;
            DB::table('media')->insert($media_data);
        }
        if($product_image6){
            $random_number6= rand(10,100);
            $galary_image6 = $random_number6.'.'.$product_image6->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image6 = Image::make($product_image6->getRealPath());
            $resize_galary_image6->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image6);
            $image_row_data['galary_image_6']=$galary_image6;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image6;
            $media_data['media_type']='galary_image6';
            DB::table('media')->insert($media_data);
        }

        DB::table('product')->where('product_id',$product_id)->update($image_row_data);

           $category_id= $request->category_id;
        foreach ($category_id as $key=>$cat){
            $category_data['product_id']=$product_id;
            $category_data['category_id']=$cat;
            DB::table('product_category_relation')->insert($category_data);

        }
        if ($product_id) {
            return redirect('admin/products')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/product/create')
                ->with('error', 'No successfully.');
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

        $data['product']=DB::table('product')->where('product_id',$id)->first();
        $data['main'] = 'Products';
        $data['active'] = 'Update user';
        $data['title'] = 'Update User Registration Form';
        $data['categories']=DB::table('category')->where('parent_id',0)->orderBy('category_id','ASC')->get();
        $data['product_categories']=DB::table('product_category_relation')->where('product_id',$id)->orderBy('product_id','ASC')->get();
       

        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {

        $media_path='uploads/'.$request->folder;
        $orginalpath=public_path().'/uploads/'.$request->folder;
        $small=$orginalpath.'/'.'small';
        $thumb=$orginalpath.'/'.'thumb';

        $data['product_title']=$request->product_title;
        $data['folder']=$request->folder;
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['purchase_price']=$request->purchase_price;
        $data['discount_price']=$request->discount_price;
        $data['product_summary']=$request->product_summary;
        $data['product_description']=$request->product_description;
        $data['product_terms']=$request->product_terms;
        $data['sku']=$request->sku;
        $data['product_stock']=$request->product_stock;
        $data['stock_alert']=$request->stock_alert;
        $data['product_video']=$request->product_video;
        $data['status']=$request->status;
        $data['created_time']=date('Y-m-d H:i:s');
        $data['modified_time']=date('Y-m-d H:i:s');
        $data['seo_title']=$request->seo_title;
        $data['seo_keywords']=$request->seo_keywords;
        $data['seo_content']=$request->seo_content;
       // $product_id=DB::table('product')->insertGetId($data);
        DB::table('product')->where('product_id',$product_id)->update($data);



        $featured_image_orgianal = $request->file('featured_image');
        $product_image1 = $request->file('product_image1');
        $product_image2 = $request->file('product_image2');
        $product_image3 = $request->file('product_image3');
        $product_image4 = $request->file('product_image4');
        $product_image5 = $request->file('product_image5');
        $product_image6 = $request->file('product_image6');




        if($featured_image_orgianal) {

            // $image_name = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image = $product_id.'.'.$featured_image_orgianal->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_image = Image::make($featured_image_orgianal->getRealPath());
            $resize_image->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $featured_image);

            $resize_image->resize(273, 273, function ($constraint) {

            })->save($thumb . '/' . $featured_image);

            $resize_image->resize(50, 50, function ($constraint) {

            })->save($small . '/' . $featured_image);
            $data['feasured_image']=$featured_image;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_type']='featured_image';
            $media_data['media_path']=$media_path.'/'.$featured_image;
            //DB::table('media')->insert($media_data);
            DB::table('media')->where('product_id',$product_id)->where('media_type','featured_image')->update($media_data);




        }
        if($product_image1){
            $random_number1= rand(10,100);
            $galary_image1 = $random_number1.'.'.$product_image1->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image1 = Image::make($product_image1->getRealPath());
            $resize_galary_image1->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image1);
            $data['galary_image_1']=$galary_image1;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image1;
            $media_data['media_type']='galary_image_1';
            DB::table('media')->where('product_id',$product_id)->where('media_type','galary_image_1')->update($media_data);


        }
        if($product_image2){
            $random_number2= rand(10,100);
            $galary_image2 = $random_number2.'.'.$product_image2->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image2 = Image::make($product_image2->getRealPath());
            $resize_galary_image2->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image2);
            $data['galary_image_2']=$galary_image2;
        
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image2;           
            $media_data['media_type']='galary_image_2';
            DB::table('media')->where('product_id',$product_id)->where('media_type','galary_image_2')->update($media_data);

        }
        if($product_image3){
            $random_number3= rand(10,100);
            $galary_image3 = $random_number3.'.'.$product_image3->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image3 = Image::make($product_image3->getRealPath());
            $resize_galary_image3->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image3);
            $data['galary_image_3']=$galary_image3;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image3;
            $media_data['media_type']='galary_image_3';
            DB::table('media')->where('product_id',$product_id)->where('media_type','galary_image_3')->update($media_data);

        }
        if($product_image4){
            $random_number4= rand(10,100);
            $galary_image4 = $random_number4.'.'.$product_image4->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image4 = Image::make($product_image4->getRealPath());
            $resize_galary_image4->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image4);
            $data['galary_image_4']=$galary_image4;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image4;
            $media_data['media_type']='galary_image_4';
            DB::table('media')->where('product_id',$product_id)->where('media_type','galary_image_4')->update($media_data);

        }
        if($product_image5){
            $random_number5= rand(10,100);
            $galary_image5 = $random_number5.'.'.$product_image5->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image5 = Image::make($product_image5->getRealPath());
            $resize_galary_image5->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image5);
            $data['galary_image_5']=$galary_image5;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image5;
            $media_data['media_type']='galary_image_5';
            DB::table('media')->where('product_id',$product_id)->where('media_type','galary_image_5')->update($media_data);

        }
        if($product_image6){
            $random_number6= rand(10,100);
            $galary_image6 = $random_number6.'.'.$product_image6->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image6 = Image::make($product_image6->getRealPath());
            $resize_galary_image6->resize(800, 800, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image6);
            $data['galary_image_6']=$galary_image6;
            $media_data['media_title']=$request->product_title;
            $media_data['product_id']=$product_id;
            $media_data['product_code']=$request->sku;
            $media_data['created_time']=date('Y-m-d H:i:s');
            $media_data['modified_time']=date('Y-m-d H:i:s');
            $media_data['media_path']=$media_path.'/'.$galary_image6;          
            $media_data['media_type']='galary_image_6';
            DB::table('media')->where('product_id',$product_id)->where('media_type','galary_image_6')->update($media_data);

        }

        DB::table('product')->where('product_id',$product_id)->update($data);
        DB::table('product_category_relation')->where('product_id',$product_id)->delete();

        $category_id= $request->category_id;
        foreach ($category_id as $key=>$cat){
            $category_data['product_id']=$product_id;
            $category_data['category_id']=$cat;
            DB::table('product_category_relation')->updateOrInsert($category_data);

        }







        if ($product_id) {
            return redirect('admin/products')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/product/create')
                ->with('error', 'No successfully.');
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
        $result=DB::table('product')->where('product_id',$id)->delete();
        if ($result) {
            return redirect('admin/products')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/products')
                ->with('error', 'No successfully.');
        }

    }
    public  function  urlCheck(Request $request){
        $product_name = $request->get('url');
        $result= DB::table('product')->where('product_name',$product_name)->first();
        if($result){
            echo 'This product exit';
        } else {
            echo '';
        }
    }
    public  function  foldercheck(Request $request){
      //  $product_name = $request->get('url');
        $result= DB::table('product')->orderby('product_id','desc')->first();
        if($result){
           $product_id= $result->product_id;
           $product_id=$product_id + 1;
            echo $product_id;
        } else {
            echo '1';
        }
    }
}
