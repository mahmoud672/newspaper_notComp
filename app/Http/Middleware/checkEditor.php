<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class checkEditor
{

    public function handle($request, Closure $next)
    {
        if(Session::has('job_type')){
            $job_type=Session::get('job_type');
            if($job_type=='editor'){
                return $next($request);
            }else{
                die('you dont have premession.');
                //return redirect()->back();
            }
        }elseif(Session::get('job_type')==null){
            return rdirect('/login');
        }
        //return $next($request);
    }
}
