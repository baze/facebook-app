@extends('facebook-app::app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">

                    @include('facebook-app::_partials._description')

{{--                    @include('facebook-app::_partials._login-button-php', ['classes' => 'btn btn-primary btn-lg'])--}}
                    @include('facebook-app::_partials._login-button-js', ['classes' => 'btn-lg', 'redirect' => true])
                </div>
            </div>
        </div>
    </div>
@endsection