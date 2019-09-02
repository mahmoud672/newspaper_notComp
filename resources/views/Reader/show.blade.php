@extends("layouts.app")
@section('title')
    reader-view-show
@endsection
@section('content')
    <div class="sliderNews"id="sliderNews">
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

    </div>
    <button class="leftSlide l"> < </button>
    <button class="rightSlide r"> > </button>

    <div id="readerPage-contentNews"> <!---------- readerPage-contentNews  ------>
        <!--------<div id="mostRecentlyNews-head">
            <h4>the most recently news </h4>
        </div>---->
        @if($news->count() > 0)
            <div class="newsBlock">
                <div class="newsBlockTitle">
                    <h4>{{$news->title}}
                        <span class="alert alert-success"> {{$news->category->name}}</span>
                         <span class="text text-white">written by Mr.</span>
                         <span class="badge badge-danger">{{$news->editor->name}}</span>
                    </h4>
                </div>
                <div class="newsBlockImage">
                    <img src="{{asset("upload/$news->image")}}" alt=""class="newsBlock-image">
                </div>
                <div class="newsBlockDescription">
                    <p>{{$news->description}}</p>
                </div>
            </div>
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
    @endif

    <!----->
    </div>

@endsection