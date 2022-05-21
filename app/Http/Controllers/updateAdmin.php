<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
//use DB;

class updateAdmin extends Controller
{
    public function updateAdmins(Request $request,Admin $admin ){

       /* Admin::findorFail('1')->update([

            'username'=>'AmrHassan',
            'password'=>'123456',
          'email'=>'amrhassanjob7@gmail.com',

    ] );*/

    //$Admin=Admin::update($request->all());

    $ID=$request->ID;
    $username=$request->username;

    Admin::where('ID',$ID)->update([

        'username'=> $username,

] );


return redirect()->route('selectallAdmin')->with('success','update  sent  succefuly');

   // DB::update('update admins set username = Mohmed  where ID = ?', ['1']);

    //$result='update  sent  succefuly';

//echo $result;

    }
}
