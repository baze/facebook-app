<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml"
      id="ng-app"
      data-ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ isset($texts->brand_title) ? $texts->brand_title : 'Laravel' }}</title>

    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">

    @if (isset($pageId))
        {!! HTML::style('css/main.css') !!}
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

    @include('facebook-app::_globals/_global-navbar')

    <div class="container-fluid">
        
        <header class="_global-header" role="banner">
            @yield('header')
        </header>

        <div class="_global-hero">
            @yield('hero')
        </div>

        <main class="_global-main">
            @include('flash::message')
        
            @yield('content')
        </main>

        <footer class="_global-footer">
            @yield('footer')

            @include('facebook-app::_globals._global-footer')
        </footer>
    </div>

    @include('facebook-app::_partials._modal-texts')

    @include('facebook-app::_partials._scripts')

    {!! HTML::script('js/bundle.js') !!}

</body>
</html>