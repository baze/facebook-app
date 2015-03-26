<?php

$mainAppRoutes = function () {
    Route::any( '/', function () {
            throw new \Euw\FacebookApp\Exceptions\GenericAppException("generic route for main app.");
//        return "main app.";
    } );
};

$domain = Config::get( 'euw-facebook-app.domain' );

Route::group( [ 'domain' => 'www.' . $domain ], $mainAppRoutes );
Route::group( [ 'domain' => 'apps.' . $domain ], $mainAppRoutes );
Route::group( [ 'domain' => $domain ], $mainAppRoutes );

// Endpoint that is redirected to after an authentication attempt
Route::get( '/facebook/callback', [
    'middleware' => 'facebook-app.login',
    'uses'       => function () { }
] );

Route::get( '/facebook/javascript', [
    'middleware' => 'facebook-app.javascript',
    'uses'       => function () { }
] );

Route::any( '/', [ 'as' => 'home', 'uses' => 'App\Http\Controllers\HomeController@index' ] );

Route::resource( 'users', 'Euw\FacebookApp\Http\Controllers\Api\UsersController', [ 'only' => [ 'store' ] ] );
Route::resource( 'invitations', 'Euw\FacebookApp\Http\Controllers\Api\InvitationsController', [ 'only' => [ 'store' ] ] );

Route::get( 'auth/logout', [ 'uses' => 'App\Http\Controllers\Auth\AuthController@getLogout' ] );