@extends("layouts.app_stuff")
@section("title")
    news-view-edit
@endsection
@section('content')
    <div class="myForm half">
        @if($errors->count() >0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <ul>
                        <li>{{$error}}</li>
                    </ul>
                @endforeach
            </div>
        @endif
        <form action="/news/edit/{{$news->id}}" method="post"enctype="multipart/form-data">
            <div class='form-group'>
                <label for="title">news title</label>
                <input type="text" name="title" id="title" value="{{$news->title}}" class="form-control" >
            </div>
            <div class="form-group">
                <label for="description">news description</label>
                <textarea name='description' id='description' class="form-control">{{$news->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="iamge">choose an image :</label>
                <input type="file"name="image"id="image"class="form-control-file">
            </div>
            <div class="form-group">
                <label for="category_id">category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">----------- select category ------------</option>
                    @if($categories->count() >0)
                        @foreach($categories as $category)
                            @if($category->id=$news->category_id)
                                <option value="{{ $category->id }}"selected>{{$category->name}}</option>
                            @else
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endif

                        @endforeach
                    @else
                        <option value="">----------- no category to show ------------</option>
                    @endif
                </select>
            </div>

            <input type="hidden" name="editor_id" value="2"id="editor_id">
            <input type="hidden" name="id" value="{{$news->id}}"id="editor_id">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="updateNews" value="update news" class="btn btn-danger" id="updateNews">
        </form>
    </div>
@endsection