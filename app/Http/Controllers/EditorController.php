<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Editor;

class EditorController extends Controller
{

    public function index()
    {
        $editors=Editor::all();
        return view('Editor.index')->with('editors',$editors);
    }


    public function create()
    {
        return view('Editor.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|alpha',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'job_type'=>'required',
                'phone'=>'required|numeric|digits:11'
            ]
        );
        $editor=new Editor;
        $editor->name=$request->input('name');
        $editor->email=$request->input('email');
        $editor->password=$request->input('password');
        $editor->job_type=$request->input('job_type');
        $editor->phone=$request->input('phone');
        $editor->save();
        return redirect('/editor')->with('messege','data added successfully');
    }


    public function show($id)
    {
        $editor=Editor::find($id);
        return view("Editor/show")->with('editor',$editor);
    }

    public function edit($id)
    {
        $editor=Editor::find($id);
        return view('Editor.edit')->with('editor',$editor);
    }

    public function update(Request $request, $id)
    {
        $editor=Editor::find($id);
        $this->validate($request,
            [
                'name'=>'required|alpha',
                'email'=>'required|email',
                'password'=>'required|min:8',
                'job_type'=>'required',
                'phone'=>'required|numeric|digits:11',
                'id'=>'required|numeric',
            ]
        );
        $editor->name=$request->input('name');
        $editor->email=$request->input('email');
        $editor->password=$request->input('password');
        $editor->job_type=$request->input('job_type');
        $editor->phone=$request->input('phone');
        $editor->id=$request->input('id');
        $editor->save();
        return redirect('/editor')->with('messege','data added successfully');
    }


    public function destroy($id)
    {
        $editor=Editor::find($id);
        $editor->delete();
        return redirect("/editor");
    }
}
