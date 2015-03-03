<?php namespace Euw\FacebookApp\Providers;

use Illuminate\Support\ServiceProvider;

class FacebookAppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
//		$this->loadViewsFrom( __DIR__ . '/path/to/views', 'courier' );

		include __DIR__ . '/../../routes.php';
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
