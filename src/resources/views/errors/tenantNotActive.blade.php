@extends('facebook-app::app')

@section('content')
    @if(View::exists('errors.tenantNotActive'))
        @include('errors.tenantNotActive')
    @else
        <h3>Tenant is not active.</h3>
    @endif
@endsection