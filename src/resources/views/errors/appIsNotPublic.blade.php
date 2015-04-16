@extends('facebook-app::app')

@section('content')
    @if(View::exists('errors.appIsNotPublic'))
        @include('errors.appIsNotPublic')
    @else
        <h3>App is currently blocked.</h3>
    @endif
@endsection