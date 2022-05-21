<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class selectallAdmin extends Controller
{


    public function getAdmins(){

        //$Admins=Admin::orderby('ID', 'Asc')->get();
        //$member=Admin::latest()->paginate(5);
        //$Admins=Admin::get();

          $admins=Admin::all();


         return view('/index3',compact('admins'));  

    }


    public function SumAdmins(){

        //$Admins=Admin::orderby('ID', 'Asc')->get();
        //$member=Admin::latest()->paginate(5);
        //$Admins=Admin::get();

        $admins=Admin::all()->sum(id);

         return view('/index3',compact('admins'));  

    }




}














?>