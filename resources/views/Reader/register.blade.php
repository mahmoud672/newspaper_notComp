@extends('layouts.app')
@section('title')
    Reader-view-register
@endsection
@section('content')
    <div class="myForm half padd">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/reader/register"method="post">
            <div class="form-group ">
                <label for="name"> name</label>
                <input type="text" name="name" id="name" value="" class="form-control"placeholder="Type Name" >
            </div>
            <div class="form-group">
                <label for="email"> email</label>
                <input type="text" name="email" id="email" value="" class="form-control"placeholder="Type Email" >
            </div>
            <div class="form-group">
                <label for="password"> password</label>
                <input type="password" name="password" id="password" value="" class="form-control"placeholder="Type Password" >
            </div>
            <input type="hidden"name="job_type"value="reader">
            <div class="form-group">
                <label for="phone"> phone</label>
                <input type="text" name="phone" id="phone" value="" class="form-control"placeholder="Type Phone" >
            </div>
            <input type="hidden"name="_token"value="{{csrf_token()}}">
            <input type="submit" name="register" value="register" class="btn btn-danger"
                   id="register">
        </form>
    </div>
@endsection