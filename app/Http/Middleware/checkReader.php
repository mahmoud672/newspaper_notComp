<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class checkReader
{
    public function handle($request, Closure $next)
    {
        if(Session::has('job_type')){
            $job_type=Session::get('job_type');
            if($job_type=='reader'){
                return $next($request);
            }else{
                die('you dont have premession.');
            }

        }else if(Session::get('job_type') == NULL){
            return redirect('/login');
        }
        //return $next($request);
    }
}
