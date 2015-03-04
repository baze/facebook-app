<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" id="ng-app" ng-app="myApp">
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
    {{ HTML::style('css/'.$pageId.'/main.css') }}
    @else
    {{ HTML::style('css/main.css') }}
    @endif

    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js') }}

    <!--[if lt IE 9]>
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js') }}
    <![endif]-->
</head>
<body ng-controller="AppController">
<div id="fb-root"></div>

<div class="container-fluid">

    <header class="_global-header" role="banner">
    	@yield('header')
    	<nav role="navigation" class="_global-header-navigation">
    		@yield('navigation')
    	</nav>
    </header>

    <div class="hero">
        @yield('hero')
    </div>

    <div class="_global-main">
        @yield('content')

        <footer class="_global-footer" role="contentinfo">
            <nav role="navigation" class="_global-footer-navigation">
                @yield('footer')
            </nav>
        </footer>
    </div>

</div>

@include('facebook-app::scripts')
{{ HTML::script('js/bundle.js') }}

</body>
</html>