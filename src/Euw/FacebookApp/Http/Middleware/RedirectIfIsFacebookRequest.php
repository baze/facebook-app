<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class RedirectIfIsFacebookRequest {

	private function getLatestRequestId() {
		$latestRequest = null;

		$requestIds = Request::get( "request_ids" );

		if ( ! empty( $requestIds ) ) {
			// request_ids is a comma separated string with the latest request id at the end.
			// we need to grab that last request id!
			$requests      = explode( ',', $requestIds );
			$latestRequest = end( $requests );
		}

		return $latestRequest;
	}

	private function getLatestRequest() {
		$latestRequestId = $this->getLatestRequestId();

		if ( $latestRequestId ) {
			$request = \Euw\FacebookApp\Modules\Requests\Models\Request::whereRequestId( $latestRequestId )->first();

			return $request;
		}

		return null;
	}

	private function getSubdomainForRequest( $request ) {
		$subdomain = $request->tenant->subdomain;

		return $subdomain;
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
		$fbRequest = $this->getLatestRequest();

		if ( $fbRequest ) {
			$subdomain = $this->getSubdomainForRequest( $fbRequest );
			$domain = config( 'euw-facebook-app.domain' );

			$url = Request::secure() ? 'https://' : 'http://';
			$url .= $subdomain . '.';
			$url .= $domain;
			$url .= Request::server( 'SCRIPT_NAME' );

			return redirect()->to( $url );
		}

		return $next($request);
	}

}
