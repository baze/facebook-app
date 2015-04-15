<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Euw\MultiTenancy\Exceptions\TenantNotFoundException;
use Euw\MultiTenancy\Modules\Tenants\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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
		$fb = app()->make( 'SammyK\LaravelFacebookSdk\LaravelFacebookSdk' );

//		if( $fb->getPageTabHelper()->isAdmin()) {
//			Session::put( 'is_page_admin', true);
//		}

		$pageId = $fb->getPageTabHelper()->getPageId();

		if ($pageId) {
			$tenant = Tenant::where( 'fb_page_id', '=', $pageId )->first();

			if ( ! $tenant ) {
				throw new TenantNotFoundException;
			}

			if ( $tenant ) {
				$subdomain = $tenant->subdomain;
				$domain = config( 'euw-facebook-app.domain' );

				$url = Request::secure() ? 'https://' : 'http://';
				$url .= $subdomain . '.';
				$url .= $domain;
				$url .= Request::server( 'SCRIPT_NAME' );

				return redirect()->to( $url );
			}
		}

		return $next($request);
	}

}
