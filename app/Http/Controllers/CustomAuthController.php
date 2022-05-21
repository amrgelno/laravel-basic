<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{


  // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ;


    public function showLoginForm()
    {
        return view('auth.log-in');
    }
      
    public function customLogin(Request $request)
    {
    
     $credentials = $request->validate([
   'email' => 'required',
        'password' => 'required',
     ]);
        
     if (Auth::attempt($credentials)) {
        
    $request->session()->regenerate(); 
        
            $this->$redirectTo=route('home')
             
             ->with(success,signedin);
          
       }
        
        //return redirect("login")->withSuccess('Login details are not valid');

 return redirect()->route('Login')
   ->with('Success','The provided credentials do not match our records');    // false return to login */


    }

    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }



    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }


    protected function guard()
    {
        return Auth::guard();
    }



}