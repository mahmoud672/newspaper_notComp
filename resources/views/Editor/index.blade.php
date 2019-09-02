@extends('layouts.app_stuff');
@section('title')
    Editor-view
@endsection
@section('content')
    <div class='myTable'>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>job type</th>
                <th>address</th>
                <th>hire date</th>
                <th>phone</th>
                <th>delete</th>
                <th>edit</th>
                <th>show</th>
            </tr>
            </thead>
            <tbody id="myTbody">
                @if(isset($editors))
                    @foreach($editors as $editor)
                        <tr>
                            <td>{{$editor->name}}</td>
                            <td>{{$editor->email}}</td>
                            <td>{{$editor->job_type}}</td>
                            <td>{{$editor->address}}</td>
                            <td>{{$editor->created_at}}</td>
                            <td>{{$editor->phone}}</td>
                            <td><a href="/editor/delete/{{$editor->id}}"class="btn btn-danger">Delete</a></td>
                            <td><a href="/editor/edit/{{$editor->id}}"class="btn btn-dark">Edit</a></td>
                            <td><a href="/editor/show/{{$editor->id}}"class="btn btn-primary">Show</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="8">no data to show</td></tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection