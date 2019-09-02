<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Editor extends Model
{
    protected $tabel='editors';
    protected $fillable=['name','email','password','job_type','phone'];

    public function news(){
        return $this->hasMany('App\News','id');
    }

    public function login($email,$password){

        if(count(Editor::where("email",$email)->first())>0){
            if(count(Editor::where("password",$password)->first()) >0){
                return Editor::where("email",$email)->where("password",$password)->first();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
