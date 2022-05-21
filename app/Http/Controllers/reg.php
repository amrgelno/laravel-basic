<?php

namespace App\Http\Controllers;
 use App\Models\Admin;
//use DB;

use Illuminate\Http\Request;


class reg extends Controller{
   
    public function sendo(Request $request){


/* names of inputs represent column name in database table 
عشان كدة لما قلت ($request->all()) اخدت ال data من اللي اتبعتت و روحت عملت insert في database
*/ 

//  methode 1
      
    /*  $insert = Admin::create($request->all());
      $result='massage sent succefuly';

if($insert){
  return $result;
}else{
  return false;
}*/

// methode 2
/*
in this methode we create an instance of object(Admin)
properties inside this objects are columns in database table
we access these properties in this way: $objectNmae->propertyName
then we set the new property value that come from request/inputs =>we access these values in this way ($request->inputName)

after define all new values we use (save()) to insert/save our new values in database
*/

//  methode 2

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


return Admin::create([
'username'=>$request->username,
'password'=>$request->password,
'email'=>$request->email,
'Pic'=>$FILENAME,

  

]);

$result='massage sent succefuly';

  echo $result;

/*method 3

$admin = new Admin;
// dd($admin);
$admin->username = $request->username;
$admin->password = $request->password;
$admin->email = $request->email;

$saved= $admin->save();

//this condition for check only if inserted
if($saved)
{
  // you can put any msg or even redirect to other route 
  return true;
}else{
  return false;
}

/* method 4


$username = $request->username;
$password = $request->password;
$email = $request->email;

DB::insert('insert into admins (username,password,email) values (?,?,?) ',[$username,$password,$email]);

$result='massage sent succefuly';

echo $result;*/
   
            }
          
            
            
}
?>