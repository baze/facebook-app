@section('header')

@include('_globals._global-header-navigation')

<div class="row">
    <div class="col-sm-6">
        @if (File::exists(URL::asset($pageId.'/img/global-header-logo.png')))
        {{ HTML::image($pageId.'/img/global-header-logo.png', null, ['class' => 'img-responsive']) }}
        @else
            {{ HTML::image('http://placehold.it/800x200', null, ['class' => 'img-responsive']) }}
        @endif
    </div>
    <div class="brand-title col-sm-6">
        <h1 class="brand-title-headline">{{ $texts->brand_title }}</h1>
    </div>
</div>



@stop