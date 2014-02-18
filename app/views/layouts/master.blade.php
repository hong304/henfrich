<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
        Laravel 4 - Tutorial
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS are placed here -->
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/bootstrap-responsive.css') }}

    <style>
        @section('styles')
        body {
            padding-top: 60px;
        }
        @show
    </style>
</head>

<body>
<!-- Navbar -->
<!-- Wrap all page content here -->

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                @if (Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li>{{Auth::user()->firstname}}</li>
                    <li><a href="{{ route('logout') }}">{{ trans('menu.logout') }}</a></li>
                </ul>
                @endif

            </div><!--/.nav-collapse -->
        </div>
    </div>

<!-- Container -->
<div class="container">

    <!-- Content -->
    @yield('content')

</div>

<!-- Scripts are placed here -->
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>