<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ReaderNews;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReaderNewsController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request,$id)
    {
        //$reading_times=1;
        $reader_id=Session::get('id');
      $currentReaderAvtivity=ReaderNews::where('reader_id',$reader_id)->where('news_id',$id)->get();
      if($currentReaderAvtivity->count() >0){

          /*$reading_times=$currentReaderAvtivity->reading_times;
          $currentReaderAvtivity->reader_id=2;
          $currentReaderAvtivity->news_id=$id;
          $currentReaderAvtivity->reading_times=$reading_times + 1;
          $currentReaderAvtivity->save();*/
          $readerActivity=DB::select("select * from reader_news where reader_id=$reader_id AND news_id= $id ");
          $readingTimes=$readerActivity[0]->reading_times;
          $readingTimes++;

          DB::update("update reader_news set reading_times =$readingTimes WHERE reader_id=2 AND news_id= $id ");
          //return redirect('/reader/show/',$id);
          //return\ Redirect::Route("show",$id);
          return redirect()->action('ReaderNewsController@store',['id'=>$id]);
          //return redirect()->route('/reader/show/{id',$id);
          //echo"<h2>hhhhhhhhhhhhhhhhhhhhhhhhhhhh</h2>";
      }else{
          $readerNews=new ReaderNews;
          $readerNews->reader_id=$reader_id;
          $readerNews->news_id=$id;
          $readerNews->reading_times=1;
          $readerNews->save();
          return redirect()->action('ReaderNewsController@store',['id'=>$id]);
      }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
