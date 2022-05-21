<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userscontroller;   //use class
use App\Http\Controllers\Adminscontroller;   //use class
use App\Http\Controllers\Adminfx;   //use class
use App\Http\Controllers\Sum;    //use class
//use App\Http\Controllers\selectAdmin;   //use class
//use App\Http\Controllers\selectallAdmin;   //use class
//use App\Http\Controllers\updateAdmin;     //use class
//use App\Http\Controllers\DeleteAdmin;     //use class
use App\Http\Controllers\reg;   //use class
use App\Http\Controllers\Ajax;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Auth\Dashboard;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// request system

 //Route::view('/URL', 'INDEX');

 Route::get('/', function () {
    return view('welcome');
 });
 
 // Route::resource('admins',Adminscontroller::class)->only(['index','destory']);

 // Route::resource('admins',Adminscontroller::class)->except(['index']);

   // Route::resource('admins',Adminscontroller::class);
 
//  Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');

//Auth::routes(['register'=>false]);

Auth::routes();

//multi-auth for  Models  register  &  login  &  Dashboard

//Dashboard


Route::group(['middleware'=>'checkdata' ], function () {

Route::get('/admin/Dashboard', [App\Http\Controllers\Admin\Auth\Dashboard::class, 'index'])->name('user.Dashboard');  // auth library  //middleware

Route::resource('Admin',Adminscontroller::class); 

Route::view('/form', 'Form')->name('Form'); // support (get) fx only 

Route::view('/aboutus', 'index' ,[    //output  in   category in resources / aboutus
  'title' => 'aboutus',
   'description' => 'this about us page'
   ])->name('aboutus');

});

Route::post('/AjaxAdmin',[Ajax::class,'Ajax'])->name('AjaxAdmin');   

//Route::get('/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('Dashboard');  // auth library 

//RegisterController
Route::post('/adminreg',[App\Http\Controllers\Admin\Auth\RegisterController::class,'reg'])->name('Admin.register.post');   // request

Route::get('/adminreg',[App\Http\Controllers\Admin\Auth\RegisterController::class,'showRegistrationForm'])->name('Admin.register');  // Form

//LoginController
Route::Get('/admin/Log',[App\Http\Controllers\Admin\Auth\LoginController::class,'login'])->name('Admin.Login.post');   // request  // middleware

Route::get('/admin/Log_in',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('Admin.Login');  // Form

Route::get('/admin/LogOut',[App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('Admin.LogOut');


Route::view('/nav', 'link' ,[    //output  in   category in resources / aboutus
  'title' => 'website_name',
   'description' => 'description_info'
   ])->name('u.dashboard');


