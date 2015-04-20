@extends('facebook-app::app')

@section('content')
    @if(View::exists('errors.authDenied'))
        @include('errors.authDenied')
    @else
        <h3>Auth denied.</h3>
    @endif
@endsection