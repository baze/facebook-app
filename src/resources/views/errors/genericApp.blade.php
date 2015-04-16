@extends('facebook-app::app')

@section('content')
    @if(View::exists('errors.genericApp'))
        @include('errors.genericApp')
    @else
        <h3>Generic App. Please select Tenant.</h3>
    @endif
@endsection