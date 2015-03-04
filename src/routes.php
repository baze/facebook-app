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
    'uses'       => function () {
//       throw new \Euw\FacebookApp\Exceptions\UserHasDeniedAuthenticationException();
    }
] );