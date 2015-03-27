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
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ isset($texts->brand_title) ? $texts->brand_title : 'Laravel' }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if(View::exists('_globals._global-navbar-navigation'))
                @include('_globals._global-navbar-navigation')
            @else
                @include('facebook-app::_globals._global-navbar-navigation')
            @endif
        </div>
    </div>
</nav>