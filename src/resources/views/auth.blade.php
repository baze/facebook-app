@extends('facebook-app::app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{ $loginUrl }}"><i class="fa fa-facebook-official"></i> Login with Facebook</a>
                    {{--@include('facebook-app::_partials._login-button')--}}
                </div>
            </div>
        </div>
    </div>
@endsection