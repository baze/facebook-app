<?php

$mainAppRoutes = function () {
    Route::any( '/', function () {
//            throw new \Euw\FacebookApp\Exceptions\GenericAppException("generic route for main app.");
        return "main app.";
    } );
};

$domain = Config::get( 'app.domain' );

Route::group( array( 'domain' => 'www.' . $domain ), $mainAppRoutes );
Route::group( array( 'domain' => 'apps.' . $domain ), $mainAppRoutes );
Route::group( array( 'domain' => $domain ), $mainAppRoutes );

Route::get( 'auth_denied', [ 'as' => 'auth_denied' ], function () {
//       throw new \Euw\FacebookApp\Exceptions\UserHasDeniedAuthenticationException();
} );