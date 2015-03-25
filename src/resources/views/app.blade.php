<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml"
      id="ng-app"
      data-ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>

    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">

    @if ($pageId)
    {!! HTML::style('css/'.$pageId.'/main.css') !!}
    @else
    {!! HTML::style('css/main.css') !!}
    @endif

    {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js') !!}

    <!--[if lt IE 9]>
    {!! HTML::script('//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js') !!}
    <![endif]-->
</head>
<body data-ng-controller="AppController">
<div id="fb-root"></div>

<header class="_global-header" role="banner">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">{{{ isset($appName) ? $appName : 'Laravel' }}}</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    {{--<li><a href="{{ url('/') }}">Home</a></li>--}}
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        {{--<li><a href="{{ url('/auth/login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ url('/auth/register') }}">Register</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="hero">
    <div class="container-fluid">
        @yield('hero')
    </div>
</div>

<div class="_global-main">
    <div class="container-fluid">
        @include('flash::message')
    
        @yield('content')
    </div>
</div>

@include('facebook-app::_globals._global-footer')

@include('facebook-app::scripts')

{!! HTML::script('js/bundle.js') !!}

</body>
</html>