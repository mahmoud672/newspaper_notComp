@extends("layouts.app_stuff")
@section("title")
    news-view-add
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



        <form action="/news/add" method="post"enctype="multipart/form-data">
            <div class='form-group'>
                <label for="title">news title</label>
                <input type="text" name="title" id="title" value="" class="form-control" >
            </div>
            <div class="form-group">
                <label for="description">news description</label>
                  <textarea name='description' id='description' class="form-control"></textarea>
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
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                         @endforeach
                     @else
                        <option value="">----------- no category to show ------------</option>
                    @endif
                </select>
            </div>

            <input type="hidden" name="editor_id" value="2"id="editor_id">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="addNews" value="add news" class="btn btn-danger" id="addNews">
        </form>
    </div>
@endsection