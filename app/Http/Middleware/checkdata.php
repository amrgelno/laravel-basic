<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class checkdata 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next )
    {

       $Admin=auth::guard('admin');

        if (!( $Admin->check())){  
   
        //  return redirect('/profile') by route
        //return redirect('/admin/Log_in')->with('success','You are not allowed to access ');
        return redirect('/admin/Log_in')->withsuccess('You are not allowed to access');
       

    }

   //abort(404);
      //return redirect('/admin/Log_in');
     // return redirect()->route('/form');
     return $next($request);   // view dashboard with index fx in Dashboard middleware
     //     return redirect()->route('user.Dashboard');     x

    }

    public function terminate()
    {
        //return view('Admin.Auth.dashboard');
        //return redirect('/f');
    }

}
