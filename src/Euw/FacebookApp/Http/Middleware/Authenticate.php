<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\App;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard $auth
	 *
	 * @return void
	 */
	public function __construct( Guard $auth ) {
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( $this->auth->guest() ) {
			if ( $request->ajax() ) {
				return response( 'Unauthorized.', 401 );
			} else {
				$fb = App::make( 'SammyK\LaravelFacebookSdk\LaravelFacebookSdk' );

				// Send an array of permissions to request
				$login_url = $fb->getLoginUrl();

				//	return '<script>window.top.location.href="' . $login_url . '"</script>';

				// Obviously you'd do this in blade :)
				return '<a href="' . $login_url . '">Login with Facebook</a>';
			}
		}

		return $next( $request );
	}

}
