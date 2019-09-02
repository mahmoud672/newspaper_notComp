<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable=['name','manager_id'];

    public function managers(){
        return $this->hasOne('App\Editor','id','manager_id');
    }

    public function news(){
        return $this->hasMany('App\News','id');
    }
}
