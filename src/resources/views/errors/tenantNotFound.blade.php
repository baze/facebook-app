@extends('facebook-app::app')

@section('content')
    @if(View::exists('errors.tenantNotFound'))
        @include('errors.tenantNotFound')
    @else
        <h3>Tenant not found.</h3>
    @endif
@endsection