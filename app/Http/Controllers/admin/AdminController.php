<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use  Session;
use Image;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
		
//
//for($i=0;$i<150;$i++){
//$id=public_path('uploads/');
//if (!is_dir($id.$i)) {
//mkdir($id . $i, 0777, TRUE);
//
//}
//}


        return view('login');
    
	}
    public function loginCheck(Request $request)
    {
        $email= $request->email;
        $password=md5($request->password);
        $result = DB::table('admin')->where('email', $email)->where('password', $password)->first();
        if($result){
            $id =$result->admin_id;
            $name =$result->name;
            $status =$result->status;
            Session::put('id', $id);
            Session::put('status', $status);


            return redirect('dashboard');

        } else {
            return view('login',['error'=>'Your Email Or Password Invalid Try Again']);
        }

    }

    public function index()
    {

        $data['main'] = 'Users';
        $data['active'] = 'All users';
        $data['title'] = '  ';
        $data['users']=DB::table('admin')->orderBy('admin_id','desc')->get();
        return view('admin.user.index', $data);
    }

    public function create()
    {

        $data['main'] = 'Users';
        $data['active'] = 'Add user';
        $data['title'] = 'User registration form';
       return view('admin.user.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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
    public function store(Request $request)
    {

        $data['name']=$request->user_name;
        $data['email']=$request->user_email;
        $data['status']=$request->user_type;
        $password=md5($request->user_pass);
        $data['password']=$password.'admin';
        $data['registered_date']=date('Y-m-d');
        
        $image = $request->file('user_picture');
            if($image) {

                $image_name = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/users');

                $resize_image = Image::make($image->getRealPath());

                $resize_image->resize(150, 150, function ($constraint) {

                })->save($destinationPath . '/' . $image_name);


                $data['picture']=$image_name;
            }



        $result =DB::table('admin')->insert($data);
        if ($result) {
            return redirect('admin/users')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/users')
                ->with('error', 'No successfully.');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['user']=DB::table('admin')->where('admin_id',$id)->first();

        $data['main'] = 'Users';
        $data['active'] = 'Update user';
        $data['title'] = 'Update User Registration Form';
        return view('admin.user.edit', $data);
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


        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['status']=$request->status;
        $old_picture= public_path('/uploads/users').'/'.$request->old_picture;
        $password_id=$request->user_pass;
        if($password_id) {
            $password = md5($request->user_pass);
            $data['password'] = $password . 'admin';
        }
        $image = $request->file('user_picture');
        if($image) {
if(file_exists($old_picture)){

    unlink($old_picture);
}
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/users');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->resize(150, 150, function ($constraint) {

            })->save($destinationPath . '/' . $image_name);
            $data['picture']=$image_name;
        }
        $result= DB::table('admin')->where('admin_id',$id)->update($data);
        if ($result) {
            return redirect('admin/users')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/users')
                ->with('error', 'No successfully.');
        }


    }

    public function delete($id)
    {
        $result=DB::table('admin')->where('admin_id',$id)->delete();
        if ($result) {
            return redirect('admin/users')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/users')
                ->with('error', 'No successfully.');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Session::put('id','');
        return redirect('/')->with('success','You are successfully Logout !');
    }
    public function logout()
    {
        Session::put('id','');
        return redirect('/admin')->with('success','You are successfully Logout !');
    }
}
