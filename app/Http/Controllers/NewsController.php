<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Category;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{

    public function index()
    {
       $allNews=News::all();
       return view('News.index')->with('allNews',$allNews);
    }


    public function create()
    {
        $categories=Category::all();
        return view("News.add")->with('categories',$categories);
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title'=>'required',
                'description'=>'required',
                'image'=>'required',
                'category_id'=>'required|numeric',
                'editor_id'=>'required|numeric ',
            ],
            [
                'category_id.required'=>'category field is required.'
            ]
            );
        $news=new News;
        $news->title=$request->input("title");
        $news->description=$request->input("description");
        $image= $request->file("image");
        $imageName=$image->getClientOriginalName();
        $news->image=time().$imageName;
        $news->category_id=$request->input("category_id");
        //$news->editor_id=$request->input("editor_id");
        $news->editor_id=Session::has('id')?Session::get('id'):2;

        $image->move(public_path('/upload/'),$news->image);
        $news->save();
        return redirect('/news');


    }

    public function show($id)
    {
        $news =News::find($id);
        return view("News.show")->with('news',$news);
    }


    public function edit($id)
    {
        $categories=Category::all();
        $news =News::find($id);
        return view("News.edit")->with('news',$news)->with('categories',$categories);
    }


    public function update(Request $request, $id)
    {
        $news =News::find($id);
        $oldImage=$news->image;
        $this->validate($request,
            [
                'title'=>'required',
                'description'=>'required',
                'image'=>'required',
                'category_id'=>'required|numeric',
                'editor_id'=>'required|numeric ',
            ],
            [
                'category_id.required'=>'category field is required.'
            ]
        );
        $news->title=$request->input('title');
        $news->description=$request->input('description');
        $image=$request->file('image');
        $imageName=$image->getClientOriginalName();
        $news->image=time().$imageName;
        $news->category_id=$request->input('category_id');
        //$news->editor_id=$request->input('editor_id');
        $news->editor_id=Session::has('id')?Session::get('id'):2;
        $image->move(public_path("/upload/"), $news->image);
        $news->save();

        return redirect("/news");
    }


    public function destroy($id)
    {
        $news=News::find($id);

        $image=$news->image;
        //if(\File::exists(public_path("/upload/$image"))){
          //  \File::delete(public_path("/upload/$image"));
            $news->delete();
        //}else{
          //  dd('file doesn`t exist');
        //}
        return redirect('/news');
    }
}
