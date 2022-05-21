<?php

namespace App\Http\Controllers;
use App\Models\Admin;
/* use App\Models\AdminPosts; */
use Illuminate\Http\Request;

class Adminfx extends Controller
{

    public function sendo(Request $request){

      $request->validate([  

        'username'=>'required',
        'password'=>'required',
        'email'=>'required',
      ]);
      
      $path= $request -> IMG; 
      
      $filename= $path->getClientOriginalExtension();
      
      $FILENAME=time().'.'.$filename;
      
      $dir='IMG/';
      
      $path->move($dir,$FILENAME);
      
      
      Admin::create([
      'username'=>$request->username,
      'password'=>$request->password,
      'email'=>$request->email,
      'Pic'=>$FILENAME,

      ]);
      
      $result='massage sent succefuly';
      
        echo $result;


    }



    public function getAdmins(Request $request){


        $ID=$request->ID;

    
       $Admins=Admin::leftJoin('adminposts' , 'admins.id' , '=', 'adminposts.admin_id')->where('admins.id', $ID)->get();

    
       
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


   public function getallAdmins(){

    //$Admins=Admin::orderby('ID', 'Asc')->get();
    //$member=Admin::latest()->paginate(5);
    //$Admins=Admin::get();

      $admins=Admin::all();

      $countadmins = count($admins);
      $sumadmins =Admin::sum('id');
      $avgadmins =Admin::avg('id');

// return view('index3',['admins' => $admins , 'sum_admins' => $sum_admins ]);   admins' => $admins =  compact('admins')


if( $countadmins > 0){  

   return view('/index3',compact('admins'),[
        
      'count_admins' => $countadmins ,        
      'sum_admins' => $sumadmins , 
      'avg_admins' => $avgadmins ,
   ]); 

}

echo "No Data found";

  

}

public function updateAdmins(Request $request ){

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


return redirect()->route('selectallAdmin')
->with('success','update  sent  succefuly');

// DB::update('update admins set username = Mohmed  where ID = ?', ['1']);

 //$result='update  sent  succefuly';

//echo $result;

 }


 public function deleteAdmins(Request $request ){

    $ID=$request->ID;

Admin::where('ID',$ID)->Delete();

// Admin::findorFail($ID)->Delete();

//$admin->delete();

return redirect()->route('selectallAdmin')
->with('success','Delete  sent  succefuly');


//$Delete='Delete  sent  succefuly';

//echo $Delete;


}


public function Ajax(Request $request ){

$email=$request->email;
$password=$request->password;

Admin::where('email',$email)->update([

   'password'=> $password,

] );

//$massage='update  sent  succefuly';

//echo $massage;

 }



 }











