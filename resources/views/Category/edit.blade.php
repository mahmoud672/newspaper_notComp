@extends('layouts.app_stuff')
@section('title')
    Category-view-edit
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
            <form action="/category/edit/{{$category->id}}"method="post">
                <div class="form-group ">
                    <label for="name">category name</label>
                    <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control"placeholder="Type Name" >
                </div>
                <div class="form-group">
                    <label for="manager_id">category manager</label>
                    <select name="manager_id" id="manager_id">
                        <option value="">------------ select manager ------------</option>
                        @if($editors)
                            @foreach($editors as $editor)
                                @if($editor->id=$category->manager_id)
                                    <option value="{{$editor->id}}"selected >{{$editor->name}}</option>
                                @else
                                    <option value="{{$editor->id}}">{{$editor->name}}</option>
                                @endif

                            @endforeach
                        @else
                            <option value="">------------ no data to display ------------</option>
                        @endif
                    </select>
                </div>
                <input type="hidden"name="id"value="{{$category->id}}">
                <input type="hidden"name="_token"value="{{csrf_token()}}">
                <input type="submit" name="update" value="update" class="btn btn-danger"
                       id="update">
            </form>
    </div>
@endsection