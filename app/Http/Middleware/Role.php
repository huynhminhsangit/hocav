<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->can('phuong')) {
          return $next($request);
        }
        
        return redirect()->back()->with('message1', 'Bạn Không Có Quyền');  
    }
}
