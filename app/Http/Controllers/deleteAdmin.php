<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class deleteAdmin extends Controller
{

    public function deleteAdmins(Request $request,Admin $admin ){

        $ID=$request->ID;

    Admin::where('ID',$ID)->Delete();

   // Admin::findorFail($ID)->Delete();

   //$admin->delete();

    return redirect()->route('selectallAdmin')->with('success','Delete  sent  succefuly');


//$Delete='Delete  sent  succefuly';

//echo $Delete;


    }
}
