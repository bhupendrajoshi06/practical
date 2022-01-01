<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Blogs;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // if(empty(session('userid')))
        // {

        //     return redirect('/login')->with('success','Login Before Viewing Blogs');


        // }

        
        $data['title']="Blog List";
       $data['blogs']=Blogs::where('userid',session('userid'))->get();



        return view('blogs')->with(compact('data'));
    }


    public function home()
    {
        //
        $data['title']="Blog ";
       $data['blogs']=Blogs::get();



        return view('home')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

       
         
        $data = $request->input();
      $data['userid']=session('userid');



        if($request->hasFile('image')){
            $img_name=$request->file('image');
         if( $img_name->isValid()){
           $ext=  $img_name->getClientOriginalExtension();
           $file=rand(111,9999).'.'.$ext;
           $img_path='uploads/blogs/'.  $file;
           $img_name-> move($img_path,$file);
     $data['image']= $file;
         }
        }

        unset($data['_token']);
        DB::table('blogs')->insert($data);

        return redirect('/blogs')->with('success','Blogs Inserted Successfully');

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

       $data['blog']= Blogs::where(['id'=>$id])->first();


       return view('update_blog')->with(compact('data'));

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
        $data = $request->input();


       if($request->hasFile('image')){
        $img_name=$request->file('image');
     if( $img_name->isValid()){
       $ext=  $img_name->getClientOriginalExtension();
       $file=rand(111,9999).'.'.$ext;
       $img_path='uploads/blogs/'.  $file;
       $img_name-> move($img_path,$file);
        $data['image']= $file;
     }
    }else{

        $data['image']= $data['himage'];

    }

    unset($data['himage']);
    unset($data['_token']);

    Blogs::where(['id' => $id])->update($data);
  
    return redirect('/blogs')->with('success','Blogs Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        Blogs::where(['id'=>$id])->delete();

        return redirect()->back()->with('success','Blog Deleted Successfully');

        //
    }

    public function signup(Request $request)
    {
        $data = $request->input();

      $validator = Validator::make($request->all(), [
        'name' => 'required|max:55',
        'email' => 'required|unique:users',
        'mobile' => 'required|unique:users|min:10',
        'password' => 'required|min:4|max:13',
    ]);

    // return $validator->errors();
     if($validator->fails()){


        return redirect()->back()->with('error','Error');

    }else{

      
        $user = new User;

        $user->name= $data['name'];
        $user->email= $data['email'];
        $user->mobile= $data['mobile'];
        $user->password= bcrypt($data['password']);
        $user->save();

        return redirect('/login')->with('success','Registration Successful ! Login to Continue');

    }

 
    }



    public function login(Request $request)
    {
       $data = $request->input();


      if(Auth::attempt(['email' => $data['email'],'password' => $data['password'] ]))
      {

        $user= User::where(['email' => $data['email']])->first();

    
        //echo"corret";
        $request->session()->put('userid',$user->id);
        $request->session()->put('name',$user->name);
        $request->session()->put('email',$user->email);
        $request->session()->put('mobile',$user->mobile);
        
        return redirect('/blogs')->with('success','Login Successful ! Welcome Back');

      }else{

        return redirect('/login')->with('error','Invalid Email Id or Password');

      }
    }
    
    
      public function logout()
      {

            session::flush();


            return redirect('/')->with('Logout Successfully');



      }
    }


