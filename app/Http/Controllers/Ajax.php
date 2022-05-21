<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    public function Ajax(Request $request ){

        $email=$request->email;
        $password=$request->password;
        
        Admin::where('email',$email)->update([
        
           'password'=> $password,
        
        ] );
        
      
        
         }
        
}
