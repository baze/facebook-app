@extends('facebook-app::app')

@section('content')
    @include('facebook-app::_partials._login-button-js', ['classes' => 'btn-lg'])
@endsection