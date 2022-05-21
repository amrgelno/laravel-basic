<?php

namespace App\Http\Controllers;
use App\Models\Admin ;
use Illuminate\Http\Request;

class sum extends Controller
{
    public function Sum( ){

        $SumAdmin=Admin::count('id');
      
        return view('/index3',[
      
         'SumAdmin'=> $SumAdmin  ,
         
         
         ]);

        }
}
