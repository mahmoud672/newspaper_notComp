<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Editor;

class CategoryController extends Controller
{
   public function index(){
        $categories=Category::all();
        return view("Category.index")->with("categories",$categories);
   }

   public function create(){
       $editors=Editor::all();
       return view('Category.add')->with('editors',$editors);
   }
   public function store(Request $request){
       $this->validate($request,
           [
           'name'=>'required|alpha',
           'manager_id'=>'required|numeric'
           ],
           ['manager_id.required'=>'manager field is required .'] //to customize error messagefor manager differenrnt from the default
       );
       $category=new Category;
       $category->name=$request->input('name');
       $category->manager_id=$request->input('manager_id');
       $category->save();
       return redirect('/category');
   }
   public function show($id){
       $category=Category::find($id);
       return view('Category.show')->with('category',$category);
   }
   public function edit($id){
       $editors=Editor::all();
       $category=Category::find($id);
       return view('Category.edit')->with('category',$category)->with('editors',$editors);
   }
   public function update(Request $request,$id){
       $category=Category::find($id);
       $this->validate($request,[
           'name'=>'required|alpha',
           'manager_id'=>'required|numeric'
            ],
           ['manager_id.required'=>'manager field is required .']
           );

       $category->name=$request->input('name');
       $category->manager_id=$request->input('manager_id');
       $category->id=$request->input('id');
       $category->save();
       return redirect('/category');
   }
   public function destroy($id){
       $category=Category::find($id);
       $category->delete();
       return redirect('/category');
   }
}
