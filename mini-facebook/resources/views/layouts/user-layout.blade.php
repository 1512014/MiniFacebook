<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiniFacebook</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    {{--<link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css">--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/custom-style.css">
    <link rel="stylesheet" type="text/css" href="/css/custom-user-layout.css">


    @stack('styles')


    <!-- Script -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/custom-script.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @stack('scripts')


</head>
<body>
<div class="flex-center position-ref full-height">
    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--@auth--}}
            {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--@else--}}
                {{--<a href="{{ route('login') }}">Login</a>--}}
                {{--<a href="{{ route('register') }}">Register</a>--}}
                {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}

    <nav class="navbar navbar-dark bg-primary topnav">
        <!-- Navbar content -->
        <div class="container">
            <ul>
                <li class="icon">
                    <a href="/">
                        {{--<img class="icon-image" src="/img/navbar-icon.png">--}}
                        <i class="fab fa-facebook-square"></i>
                    </a></li>
                <li>
                    <div class="search-container">
                        <form action="/action_page.php">
                            <input type="text" placeholder="Search" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </li>
                <li class="right"></li>
            </ul>
            <ul style="float: right;">
                <li class="user">
                    <a href="#">
                        <img class="user-image" src="/img/user1.png">
                        <span class="nav-text">Vy</span>
                    </a>
                </li>
                <li class="horizontal-hr"></li>
                <li class="user">
                    <a href="/">
                        <span class="nav-text">Home</span>
                    </a>
                </li>
                <li class="horizontal-hr" style="margin-left: 10px;margin-right: 10px;"></li>
                <li class="icon user">
                    <a href="/">
                        <i class="fas fa-user-friends"></i>
                    </a>
                    <span class="tooltiptext">Friends</span>
                </li>
                <li class="icon user">
                    <a href="/">
                        <i class="fab fa-facebook-messenger"></i>
                    </a>
                    <span class="tooltiptext">Messages</span>
                </li>
                <li class="icon user">
                    <a href="/">
                        <i class="fas fa-globe"></i>
                    </a>
                    <span class="tooltiptext">Notification</span>
                </li>
                <li class="horizontal-hr" style="margin-left: 10px;margin-right: 10px;"></li>
                <li class="icon user">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <span class="tooltiptext">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>

            </ul>


        </div>
    </nav>

    <div class="friend-panel">
        <p class="list-title">CONTACTS</p>
        <ul class="panel-list">
            @yield('contacts')
        </ul>
        <p class="list-title">GROUP CONVERSATIONS</p>
        <ul class="panel-list">
            @yield('groups')
        </ul>
    </div>
    @section('sidebar')
        {{--This is the master sidebar.--}}
    @show

    <div class="newfeed">
        @yield('content')
    </div>


</div>
</body>
</html>
