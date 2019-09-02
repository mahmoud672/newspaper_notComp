@extends('layouts.app_stuff')
@section('title')
    Editor-view-edit
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
        <form action="/editor/edit/{{$editor->id}}"method="post">
            <div class="form-group ">
                <label for="name">editor name</label>
                <input type="text" name="name" id="name" value="{{$editor->name}}" class="form-control"placeholder="Type Name" >
            </div>
            <div class="form-group">
                <label for="email">editor email</label>
                <input type="text" name="email" id="email" value="{{$editor->email}}" class="form-control"placeholder="Type Email" >
            </div>
            <div class="form-group">
                <label for="password">editor password</label>
                <input type="password" name="password" id="password" value="{{$editor->password}}" class="form-control"placeholder="Type Password" >
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
                <input type="text" name="phone" id="phone" value="{{$editor->phone}}" class="form-control"placeholder="Type Phone" >
            </div>
            <input type="hidden"name="_token"value="{{csrf_token()}}">
            <input type="hidden"name="id"value="{{$editor->id}}">
            <input type="submit" name="update" value="update" class="btn btn-danger"
                   id="update">
        </form>
    </div>
@endsection