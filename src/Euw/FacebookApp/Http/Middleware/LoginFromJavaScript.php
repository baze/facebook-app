<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginFromJavaScript {

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

		// Obtain an access token.
		try {
			$token = $fb->getJavaScriptHelper()->getAccessToken();
		} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
			// Failed to obtain access token
			dd( $e->getMessage() );
		}

		if ($token) {
			dd($token);
		}

		return $next($request);
	}

}
