<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   
   protected $redirectTo ;
// //     /**
// //      * Create a new controller instance.
// //      *
// //      * @return void
// //      */


  public function __construct()
   {
   
    $this->redirectTo =route('user.Dashboard');    
// // // //        $this->redirectTo =route('u.dashboard');
// // // //      //   $this->redirectTo =route('Admin.index');   // dashboard  with   crud 
      $this->middleware('guest')->except('logout');   // middleware for login 
    }

   public function showLoginForm()
     {
         return view('Admin.Auth.login');
    }


//       public function login(Request $request)
//     {
           
//         $emailhint=$request->email;   

//         $passhint= $request->password;
      
//         //$passhint= Hash::make ($request->password);
      
//        //$user=Admin::where('email', '=' , $emailhint)->first();

       
//         $Admins=Admin::where([['email', $emailhint],['password',$passhint]])->get();
//        $countadmins = count($Admins);


//        if(  $countadmins ==  1 ){ 

       
    

//             return view('/link',compact('Admins'));

        

       
       
//          }
 
//       return back()
//         ->with('fail ','username or password dont match our records'); 
        
// // // // return redirect()->route('nav')
// // //     //  ->with('success','loading   Dashboard   succefuly');      

//     }

    protected function guard()
    {
        return Auth::guard('admin');
    }


 
}
