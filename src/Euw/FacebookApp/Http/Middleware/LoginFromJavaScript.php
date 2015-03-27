<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Euw\MultiTenancy\Modules\Tenants\Models\Tenant;
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

		if ( isset( $token ) ) {
			if ( ! $token->isLongLived() ) {
				// OAuth 2.0 client handler
				$oauth_client = $fb->getOAuth2Client();

				// Extend the access token.
				try {
					$token = $oauth_client->getLongLivedAccessToken( $token );
				} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
					dd( $e->getMessage() );
				}
			}

			$fb->setDefaultAccessToken( $token );

			// Save for later
			Session::put( 'fb_user_access_token', (string) $token );

			// Get basic info on the user from Facebook.
			try {
				$response = $fb->get( '/me?fields=id,name,first_name,last_name,email' );
			} catch ( \Facebook\Exceptions\FacebookSDKException $e ) {
				dd( $e->getMessage() );
			}

			// Convert the response to a `Facebook/GraphNodes/GraphUser` collection
			$facebook_user = $response->getGraphUser();

			// Create the user if it does not exist or update the existing entry.
			// This will only work if you've added the SyncableGraphNodeTrait to your User model.

			$user = \App\User::createOrUpdateGraphNode( $facebook_user );

			// Log the user into Laravel
			Auth::login( $user );

			flash()->success( 'Successfully logged in with Facebook' );

			return redirect( '/' );
		}

		return $next($request);
	}

}
