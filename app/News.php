<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   protected $table='news';
   protected $fillable=['title','description','image','editor_id','category_id'];

   public function category(){
       return $this->hasOne('App\Category','id','category_id');
   }

   public function editor(){
       return $this->hasOne('App\Editor','id','editor_id');
   }
}
