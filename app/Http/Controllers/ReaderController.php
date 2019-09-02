<?php

namespace App\Http\Controllers;

use App\ReaderNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Reader;
use App\News;
use Illuminate\Support\Facades\Session;


class ReaderController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth:reader');
       //$this->middleware('auth');
    }

    public function index()
    {
        $allNews=News::all();
        $lastEight=News::orderBy('id','DESC')->skip(0)->take(8)->get();

        return view("Reader.index")->with('allNews',$allNews)->with('lastEight',$lastEight);
    }


    public function create()
    {
        return view("Reader.register");
    }


    public function store(Request $request)
    {
        $reader=new Reader;
        $this->validate($request,[
            'name'=>'required|alpha',
            'email'=>'required|email',
            'password'=>'required|min:8',
            'job_type'=>'required|alpha',
            'phone'=>'required|numeric|digits:11'
        ]);
        $reader->name=$request->input('name');
        $reader->email=$request->input('email');
        $reader->password=$request->input('password');
        $reader->job_type=$request->input('job_type');
        $reader->phone=$request->input('phone');
        $reader->save();
        return redirect('/login')->with('registrationMessage','you have registered successfully.');
    }


    public function show($id)
    {
        $news=News::find($id);
        return view("Reader.show")->with('news',$news);
    }
    public function getLogin(){
        return view("/reader/login");
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        $email=$request->input('email');
        $password=$request->input('password');
        $reader=Reader::where('email',$email)->first();
        if($reader->count() >0){
            $reader=Reader::where('password',$password)->first();
            if($reader->count() >0){
                //if(Auth::guard('reader')->attempt(['email'=>$email,"password"=>$password])){
                  //  return redirect('/reader/login')->with('message','error in log in');
                //}else{
                $readerData=session(['job_type'=>$reader->job_type,'email'=>$reader->email,'id'=>$reader->id]);
                //Session::put('job_type',$reader->job_type);
                //Session::put('email',$reader->email);
                //Session::put('id',$reader->id);
                //$email=session(['email'=>$reader->email]);
                //$id=session(['id'=>$reader->id]);
                    return redirect('/reader/')->with('message','you are logged in successfully');
                //}
                //return redirect('/reader/login')->with('message','ok');
            }else{
                return redirect('/reader/login')->with('message','password is incorrect try again.');
            }
        }else{
            return redirect('/reader/login')->with('message','email is not exist you should register first.');
        }

        /*if(Auth::guard('reader')->attempt(['email'=>$email,"password"=>$password])){

            return redirect('/reader/login')->with('message','error in log in');
        }else{
            return redirect('/reader/')->with('message','you are logged in successfully');
        }*/
    }
    public function logout()
    {
        Auth::guard('reader')->logout();
        Session::flush();
        //Session::forget('job_type');
        //Session::forget('email');
        //Session::forget('id');
        return redirect('/reader/login');
    }

//reader
    public function edit($id)
    {

    }

//reader
    public function update(Request $request, $id)
    {

    }
//adimn
    public function destroy($id)
    {

    }
}
