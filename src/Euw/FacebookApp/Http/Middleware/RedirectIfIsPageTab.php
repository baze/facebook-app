<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class RedirectIfIsPageTab {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$fb = App::make( 'SammyK\LaravelFacebookSdk\LaravelFacebookSdk' );

		try {
			$token = $fb->getPageTabHelper()->getAccessToken();
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
