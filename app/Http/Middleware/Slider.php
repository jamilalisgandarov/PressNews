<?php

namespace App\Http\Middleware;

use Closure;

class Slider
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
         if(count(\App\News::where('slider',1)->get())>=7){         
              return back();
            } 
        return $next($request);
    }
}
