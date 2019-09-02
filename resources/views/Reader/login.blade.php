@extends('layouts.app')
@section('title')
    Reader-view-register
@endsection
@section('content')
    <div class="myForm half padd">
        @if($registrationMessage=Session::get('registrationMessage'))
            <p class="alert alert-success text-center">
                {{$registrationMessage}}
            </p>
        @else
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($messge=Session::get('message'))
            <p class="alert alert-danger text-center">
                {{$messge}}
            </p>
        @else
        @endif
        <form action="/reader/login"method="post">
            <div class="form-group">
                <label for="email"> email</label>
                <input type="text" name="email" id="email" value="" class="form-control"placeholder="Type Email" >
            </div>
            <div class="form-group">
                <label for="password"> password</label>
                <input type="password" name="password" id="password" value="" class="form-control"placeholder="Type Password" >
            </div>
            <input type="hidden"name="_token"value="{{csrf_token()}}">
            <input type="submit" name="login" value="Log in" class="btn btn-danger"
                   id="login">
        </form>
    </div>
@endsection