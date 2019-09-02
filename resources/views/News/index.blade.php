@extends("layouts.app_stuff")
@section("title")
    news-view
@endsection
@section('content')
    <div class='myTable padd '>
        <table class='table table-bordered'>
            <thead class="thead-dark">
            <tr>
                <th>title</th>
                <th>description</th>
                <th>image</th>
                <th>category</th>
                <th>editor</th>
                <th>delete</th>
                <th>edit</th>
                <th>show</th>
            </tr>
            </thead>
            <tbody id="myNewsTbody">
                @if($allNews->count() >0)
                    @foreach($allNews as $news)
                        <tr>
                            <td>{{$news->title}}</td>
                            <td>{{$news->description}}</td>
                            <td><img src="{{asset("upload/$news->image")}}" alt=""class="imageTable"></td>
                            <td>{{$news->category->name}}</td>
                            <td>{{$news->editor->name}}</td>
                            <td><a href="/news/delete/{{$news->id}}"class="btn btn-danger">Delete</a></td>
                            <td><a href="/news/edit/{{$news->id}}"class="btn btn-dark">Edit</a></td>
                            <td><a href="/news/show/{{$news->id}}"class="btn btn-primary">Show</a></td>
                        </tr>
                    @endforeach    
                @else
                    <tr><td colspan="7">no news to show</td></tr>       
                @endif    
            </tbody>
        </table>
    </div>
@endsection