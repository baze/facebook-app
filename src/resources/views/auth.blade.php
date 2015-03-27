@if(View::exists('auth'))
    @include('auth')
@else
    @include('auth-fallback')
@endif