@extends('layouts.app_stuff');
@section('title')
    Editor-view-show
@endsection
@section('content')
    <div class='myTable'>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>job type</th>
                <th>address</th>
                <th>hire date</th>
                <th>phone</th>
            </tr>
            </thead>
            <tbody id="myTbody">
            @if(isset($editor))
                    <tr>
                        <td>{{$editor->id}}</td>
                        <td>{{$editor->name}}</td>
                        <td>{{$editor->email}}</td>
                        <td>{{$editor->job_type}}</td>
                        <td>{{$editor->address}}</td>
                        <td>{{$editor->created_at}}</td>
                        <td>{{$editor->phone}}</td>

                    </tr>
            @else
                <tr><td colspan="8">no data to show</td></tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection