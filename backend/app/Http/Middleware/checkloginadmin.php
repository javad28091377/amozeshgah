<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class checkloginadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // میدلور لاگین روش لاگین دستی
        // if(!session("checklogin"))
        // {
        //     return redirect()->intended('/adminpanel');
        // }
        // return $next($request);

        
        // میدولدر به روش لاگین از طریق گارد
        if(!Auth::guard('admin')->check())
        {
            return redirect('adminpanel');
        }
        return $next($request);
    }
}
