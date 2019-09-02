@extends("layouts.app_stuff")
@section("title")
    news-view-show
@endsection
@section('content')
    <div class='myTable padd '>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>description</th>
                <th>image</th>
                <th>category</th>
                <th>editor</th>
            </tr>
            </thead>
            <tbody id="myNewsTbody">
            @if($news->count() >0)
                    <tr>
                        <td>{{$news->id}}</td>
                        <td>{{$news->title}}</td>
                        <td>{{$news->description}}</td>
                        <td><img src="{{asset("upload/$news->image")}}" alt=""class="imageTable"></td>
                        <td>{{$news->category->name}}</td>
                        <td>{{$news->editor->name}}</td>
                    </tr>
            @else
                <tr><td colspan="6">no data to show</td></tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection