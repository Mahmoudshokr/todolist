<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    @yield('styles')

    <script src="{{asset('js/libs.js')}}"></script>
    @yield('scripts')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

</head>
<body>
<img class="img-responsive" src="/Todolist/public/milky-way.jpg" alt="" style="position: fixed; width: 100%; opacity: 0.7">

{{--nav bar--}}


<nav class="navbar navbar-expand-lg navbar-light embed-responsive-item">
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" style="color: red">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: red">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: red">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: red;">Disabled</a>
            </li>

            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a style="color: red;margin-left: 721px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       Welcome {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: 721px">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>
    </div>
</nav>


{{--end nav bar--}}

@if(\Illuminate\Support\Facades\Session::has('info'))
<div class="alert alert-success">{{Session('info')}}</div>
@endif
 <div class="rounded align-content-center responsive" style="background-color: lightgrey; width: 1095px; margin-left: 131px; position: absolute">
     @yield('content')
 </div>

</body>
</html>