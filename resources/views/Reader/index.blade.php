@extends("layouts.app")
@section('title')
    reader-view
@endsection
@section('content')
    @if($message=Session::get('message'))

            <h5 class="alert alert-success text-center">{{$message}}</h5>

    @endif
    <div class="sliderNews"id="sliderNews">
        @if($lastEight->count() >0)
            @foreach($lastEight as $lastData)
                <div class="sliderNewsBlock">
                    <div class="newsHead">
                        <h5 data-id="">{{$lastData->title}}</h5>
                    </div>
                    <img src="{{asset("upload/$lastData->image")}}">
                </div>
            @endforeach
        @else
            <div class="sliderNewsBlock">

                <div class="newsHead">
                    <h5 data-id="">title</h5>
                </div>
                <img src="{{asset("images/typewriter-1227357_960_720.jpg")}}">
            </div>
            <div class="sliderNewsBlock">
                <div class="newsHead">
                    <h5 data-id="">title</h5>
                </div>
                <img src="{{asset("images/typewriter-1227357_960_720.jpg")}}">
            </div>
            <div class="sliderNewsBlock">
                <div class="newsHead">
                    <h5 data-id="">title</h5>
                </div>
                <img src="{{asset("images/typewriter-1227357_960_720.jpg")}}">
            </div>
            <div class="sliderNewsBlock">
                <div class="newsHead">
                    <h5 data-id="">title</h5>
                </div>
                <img src="{{asset("images/typewriter-1227357_960_720.jpg")}}">
            </div>
        @endif


    </div>
    <button class="leftSlide l"> < </button>
    <button class="rightSlide r"> > </button>

    <div id="mostRecentlyNews">
        <div id="mostRecentlyNews-head">
            <h4>the most recently news </h4>
        </div>
        @if($allNews->count() > 0)
            @foreach($allNews as $news)
                <div class="mostRecentlyNewsBlock">

                    <div class="mostRecentlyNewsImage">
                        <img src="{{asset("upload/$news->image")}}" alt="">
                    </div>
                    <div class="mostRecentlyNewsTitle">
                        <h4>{{$news->title}}  >  <span class="alert alert-success" > {{$news->category->name}}</span> <span class="badge badge-danger">{{$news->editor->name}}</span> </h4>
                    </div>

                    <div class="mostRecentlyNewsDescription">
                        <p>{{$news->description}}</p>
                        <form action="/reader/show/{{$news->id}}"method="post">
                            <input type="hidden"name="_token"value="{{csrf_token()}}">
                            <!---<input type="submit"name="showNews"value="show this news">---->
                            <button class="alert badge-info ml-4">show this news</button>
                        </form>
                        <!----<a href="/reader/show/{{$news->id}}"class="badge badge-info">show this news</a>---->
                    </div>
                </div>
            @endforeach
         @else
            <div class="mostRecentlyNewsBlock">

                <div class="mostRecentlyNewsImage">
                    <img src="{{asset("images/newspaper-595478_960_720.jpg")}}" alt="">
                </div>
                <div class="mostRecentlyNewsTitle">
                    <h4>title goes here</h4>
                </div>

                <div class="mostRecentlyNewsDescription">
                    <p>description goes hereeeeeeeeeeeeeeeeeeeeeeeee</p>
                </div>
            </div>
            <div class="mostRecentlyNewsBlock">
                <div class="mostRecentlyNewsImage">
                    <img src="{{asset("images/coffee-791439_960_720.jpg")}}" alt="">
                </div>
                <div class="mostRecentlyNewsTitle">
                    <h4>title goes here</h4>
                </div>

                <div class="mostRecentlyNewsDescription">
                    <p>description goes hereeeeeeeeeeeeeeeeeeeeeeeee</p>
                </div>
            </div>
        @endif

        <!----->
    </div>

@endsection