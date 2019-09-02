@extends('layouts.app_stuff')
@section('title')
    Editor-view-add
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
        <form action="/editor/add"method="post">
            <div class="form-group ">
                <label for="name">editor name</label>
                <input type="text" name="name" id="name" value="" class="form-control"placeholder="Type Name" >
            </div>
            <div class="form-group">
                <label for="email">editor email</label>
                <input type="text" name="email" id="email" value="" class="form-control"placeholder="Type Email" >
            </div>
            <div class="form-group">
                <label for="password">editor password</label>
                <input type="password" name="password" id="password" value="" class="form-control"placeholder="Type Password" >
            </div>
            <div class="form-group">
                <label for="job_type">editor type</label>
                <select name="job_type" id="job_type" class="form-control" >
                    <option value="editor">Editor</option>
                    <option value="manager">Manager</option>
                </select>

            </div>
            <div class="form-group">
                <label for="phone">editor phone</label>
                <input type="text" name="phone" id="phone" value="" class="form-control"placeholder="Type Phone" >
            </div>
            <input type="hidden"name="_token"value="{{csrf_token()}}">
            <input type="submit" name="add" value="add" class="btn btn-danger"
                   id="add">
        </form>
    </div>
@endsection