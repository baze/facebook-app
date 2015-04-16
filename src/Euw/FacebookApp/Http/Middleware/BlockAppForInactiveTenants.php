<?php namespace Euw\FacebookApp\Http\Middleware;

use Closure;
use Euw\FacebookApp\Exceptions\AppIsNotPublicException;
use Euw\MultiTenancy\Exceptions\TenantIsNotActiveException;
use Euw\MultiTenancy\Exceptions\TenantNotFoundException;
use Euw\MultiTenancy\Modules\Tenants\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class BlockAppForInactiveTenants {

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

		$pageId = $fb->getPageTabHelper()->getPageId();

		if ($pageId) {

			$isAdmin = $fb->getPageTabHelper()->isAdmin();

			$tenant = Tenant::where( 'fb_page_id', '=', $pageId )->first();

			if ( ! $tenant ) {
				throw new TenantNotFoundException;
			}

			if ( ! $tenant->active ) {

				if ( $isAdmin ) {
//					dd("you are an admin, you may go on");
				} else {
//					dd( "tenant not active. block app." );
					throw new AppIsNotPublicException;
				}

			}

		}

		return $next($request);
	}

}
