<?php

namespace  App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('checkdata');   // middleware for  /admin/Dashboard Route  when user logout
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        //method 1


        // return view('Admin.auth.dashboard');

        //method 2
        
        @$Admin=auth::guard('admin');       
         return view('Admin.auth.dashboard2')->with('Admin',$Admin);


//method 3
//   @$Admin=auth::guard('admin');
//         @ $Admin_id=$Admin->user()->id  ;      
//         $sel_Admins=Admin::leftJoin('adminposts' , 'admins.id' , '=', 'adminposts.admin_id')->where('admins.id',  $Admin_id)->get();
//          $countadmins = count( $sel_Admins);
//         if( $countadmins == 1){                         //  = while(mysqli_fetch_array)

//             return view('/Admin.auth.dashboard3',compact('sel_Admins')); 
         
//          }

//           else{

//             return redirect() -> route('Admin.Login');

//              //   return view('/Admin.auth.dashboard3'); 

//          }

    }
}
