<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"name="viewport"content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div class="h">
            <div class="logo">
                <div class="inner">
                    <span>hellow</span>
                </div>
            </div>
            <div class="section-user">
                <h5 class="section-user-span">
                    @if(Session::has('email'))
                        {{Session::get('email')}}
                        @else
                        {{"example@example.com"}}
                    @endif
                    </h5>
                <nav>
                    <ul>
                        @if(Session::has('job_type'))
                            <li class="list-inline-item"><a href="/logout"class="text-decoration-none text-white badge badge-danger">log out</a></li>
                        @else
                            <li class="list-inline-item"><a href="/reader/register"class="text-decoration-none text-success">Register</a></li>
                            <li class="list-inline-item"><a href="/login"class="text-decoration-none text-dark badge badge-light">Log in</a></li>
                        @endif


                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <div id="navbar">
        <div class="h n">
            <nav>
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item"><a href="/reader"class="btn btn-light">home</a></li>
                </ul>
            </nav>

        </div>
    </div>

    <!---<div id="slideshow">
        <div class="h">
        </div>
    </div>---->
    <div id="content">
        <div class="h">
            @yield('content')

        </div>
    </div>

    <div id="footer">
        <div class="h n">
            <div class="sections">
                <h5>our objectives</h5>
                <ul>
                    <li>honesty</li>
                    <li>reality</li>
                    <li>Credibility</li>
                </ul>
            </div>
            <div class="sections">
                <h5>copy right</h5>
                <ul>
                    <li>mr fifty cent</li>
                    <li>MG</li>
                    <li>mahmoud gad</li>
                </ul>
            </div>
            <div class="sections border-right-0">
                <ul class="footer_icons border-right-0">
                    <li><img src="{{asset("images/facebook.png")}}"></li>
                    <li><img src="{{asset("images/1%20V7GYJQ_4lykfDzOf9q17eA.jpeg")}}"></li>
                    <li><img src="{{asset("images/social_youtube_2756.png")}}"></li>
                    <li><img src="{{asset("images/twitter.png")}}"></li>
                    <li><img src="{{asset("images/1491580629-yumminkysocialmedia03_83105.png")}}"></li>
                    <li><img src="{{asset("images/images.png")}}"></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="{{asset("js/jquery-3.4.1.js")}}"></script>
<script src="{{asset("js/bootstrap.js")}}"></script>
<script src="{{asset("js/script.js")}}"></script>
</body>
</html>