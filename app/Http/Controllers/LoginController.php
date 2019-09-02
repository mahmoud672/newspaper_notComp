<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Editor;
use App\Reader;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Object_;

class LoginController extends Controller
{
    public function create(){
        return view("login");
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        $email=$request->input('email');
        $password=$request->input('password');

        $reader= new Reader;
        $editor= new Editor;
        $readerData=$reader->login($email,$password);
        $editorData=$editor->login($email,$password);
        if($readerData){
            session(['job_type'=>$readerData->job_type,'email'=>$readerData->email,'id'=>$readerData->id]);
            return redirect('/reader/')->with('message','you are logged in successfully');
        }else{
            if($editorData){
                session(['job_type'=>$editorData->job_type,'email'=>$editorData->email,'id'=>$editorData->id]);
                return redirect('/editor/')->with('message','you are logged in successfully');
            }else{
                return redirect('/login')->with('message','sorry no such data.');
            }
        }
    }

    public function logout(){
        Session::flush();
        return redirect("/login")->with("message",'you have logged out successfully.');
    }
}
