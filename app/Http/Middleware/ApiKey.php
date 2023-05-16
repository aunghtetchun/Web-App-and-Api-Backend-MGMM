<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

class ApiKey
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
        if(!isset($_SERVER['HTTP_X_HARDIK'])){
            return Response::json(array('error'=>"Please don't try to access this page"));
        }

        if($_SERVER['HTTP_X_HARDIK'] != 'A109944105439hc'){
            return Response::json(array('error'=>'wrong admin'));
        }

        return $next($request);
    }

}
