@if(View::exists('auth'))
    @include('auth')
@else
    @include('facebook-app::auth-fallback')
@endif