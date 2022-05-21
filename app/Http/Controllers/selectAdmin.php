<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class selectAdmin extends Controller
{
    public function getAdmins(Request $request){


         $ID=$request->ID;
         $token =$request->token;
        
       

        $Admins=Admin::where('ID', $ID)->get();


foreach ($Admins as $Admin ) { 

    $username = $Admin->username;
   
    $email = $Admin->email;
    $password = $Admin->password;

return view('/index2',[

    'username'=> $username  ,
    'email'=> $email  ,
    'password'=> $password  ,
    
    ]);

   
      
}



    }
}
?>