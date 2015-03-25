<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;

class RedirectIfIsAppCanvas {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$fb = app()->make( 'SammyK\LaravelFacebookSdk\LaravelFacebookSdk' );

		try {
			$token = $fb->getCanvasHelper()->getAccessToken();
		} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
			// Failed to obtain access token
			dd( $e->getMessage() );
		}

		// $token will be null if the user hasn't authenticated your app yet
		if ( ! $token ) {
			// . . .
		}

		return $next($request);
	}

}
