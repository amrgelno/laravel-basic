<?php
// crud system
namespace App\Http\Controllers;
use App\Models\Admin ;
use App\Http\Traits\UploadImg;
use Illuminate\Http\Request;


/* CRUD App */


class Adminscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
    
        $admin=Admin::all();
        $countadmins = count($admin);
        $avgadmins =Admin::avg('id');
        $sumadmins= $admin ->sum('id');   // $sumadmins= $admin ->sum('id'); =  $avgadmins= $admin ->avg('id'); 
        
  
  // return view('index3',['admins' => $admins , 'sum_admins' => $sum_admins ]);   admins' => $admins =  compact('admins')
  
  if( $countadmins > 0){                         //  = while(mysqli_fetch_array)

    return view('/index3',compact('admin'),[
         
       'count_admins' => $countadmins ,        
       'sum_admins' => $sumadmins , 
       'avg_admins' => $avgadmins ,
    ]); 
 
 }
 
 echo "No Data found";
 
   
 
 }



    public function Sum( ){

   $SumAdmin=Admin::sum('id');
 
 
   return view('/index3',[
 
    'SumAdmin'=> $SumAdmin  ,
    
    
    ]);
 
 
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Form'); 
    }

    /**
     * Store a newly created resource in storage.
     * @param  App\Http\UploadImg;
     * @param  \App\Models\Admin
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    USE UploadImg;   //  use Traits


    public function store(Request $request)
    {

        $FILENAME= $this -> saveImage($request -> IMG ,'IMG/');

        
        $request->validate([  

            'username'=>'required',
            'password'=>'required',
            'email'=>'required',
          ]);
          
   
          Admin::create([
          'username'=>$request->username,
          'password'=>$request->password,
          'email'=>$request->email,
          'Pic'=>$FILENAME,
          
            
          
          ]);

          
          
          return redirect()->route('Form')
          ->with('success','create  sent  succefuly');
    }


    /**
     * Display the specified resource.
     * @param App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$admin)
    {
       
        $ID=$request->Admin;

        $admin=Admin::leftJoin('adminposts' , 'admins.id' , '=', 'adminposts.admin_id')->where('admins.id', $ID)->get();
        //$admin=Admin::where('id', $ID)->get();
     
 foreach ( $admin as $Admins ) { 
 
    $username = $Admins->username;
    $email = $Admins->email;
    $password = $Admins->password;
    $posts=$Admins->AdminPosts;
 
 return view('/index2',[
 
    'username'=> $username  ,
    'email'=> $email  ,
    'password'=> $password  ,
    'adminposts'=>$posts,
    
    ]);
}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($admin)

    {
        $ID=$request->Admin;

        $admin->leftJoin('adminposts' , 'admins.id' , '=', 'adminposts.admin_id')->where('admins.id', $ID)->get();
     
 foreach ($Admins as $Admin ) { 
 
    $username = $Admin->username;
    $email = $Admin->email;
    $password = $Admin->password;
    $posts=$Admin->AdminPosts;
 
 return view('/index2',[
 
    'username'=> $username  ,
    'email'=> $email  ,
    'password'=> $password  ,
    'adminposts'=>$posts,
    
    ]);
 
    }

}

    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Admin 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,Admin $admin)
    {
      
        $ID=$request->Admin;
        $username=$request->username;
       
        $admin->where('ID',$ID)->update([    //   $admin=Admin::all();  -     $admin->  $admin= Admin::
       
            'username'=> $username,
       
       ] );
       

        return redirect()->route('Admin.index')
        ->with('success','update  sent  succefuly');
      
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Admin 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request,Admin $admin)
    
    {

        $ID=$request->Admin;
        $username=$request->username;

        Admin::where('ID',$ID)->Delete();

    return redirect()->route('Admin.index')
             ->with('success','Delete  succefuly');
    }
}
