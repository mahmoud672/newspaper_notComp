<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReaderNews extends Model
{
    protected $table='reader_news';
    protected $fillable=['reader_id','news_id','reading_times'];

}
