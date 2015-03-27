@if(View::exists('auth'))
    @include('auth')
@else
    @extends('facebook-app::app')
@endif

@section('content')
    @include('facebook-app::_partials._login-button-js', ['classes' => 'btn-lg'])
@endsection