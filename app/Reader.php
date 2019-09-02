<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reader extends Authenticatable
{
    //use Notifiable;
    protected $guard='reader';
    protected $table='reader';
    protected $fillable=['name','email','password','job_type','phone'];

    /*protected $hidden = [
        'password', 'remember_token',
    ];*/

    public function login($email,$password){

        if(count(Reader::where("email",$email)->first())>0){
            if(count(Reader::where("password",$password)->first()) >0){
                return Reader::where("email",$email)->where("password",$password)->first();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
