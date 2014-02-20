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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
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
                    <li class="active"><a href="#">NEW</a></li>
                    <li><a href="{{URL::to('product_list/shirt')}}">{{trans('menu.shirt')}}</a></li>
                    <li><a href="{{URL::to('product_list/tie')}}">{{trans('menu.tie')}}</a></li>
                    <li><a href="{{URL::to('product_list/bag')}}">{{trans('menu.bag')}}</a></li>
                    <li><a href="{{URL::to('product_list/accessory')}}">{{trans('menu.accessory')}}</a></li>
                    <li><a href="{{URL::to('guide')}}">{{trans('menu.guide')}}</a></li>
                    <li><a href="{{URL::to('gifting')}}">{{trans('menu.GIFTING')}}</a></li>
                    <li><a href="{{URL::to('club')}}">{{trans('menu.CLUB')}}</a></li>
                    <li><a href="{{URL::to('why_henfrich')}}">{{trans('menu.Why Henfrich')}}</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">NEW</a></li>
                            <li><a href="#">SHIRTS</a></li>


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
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>



{{ HTML::script('js/bootstrap.min.js') }}

@yield('footer')
</body>
</html>