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
		$this->publishes( [
			realpath( __DIR__ . '/../../../migrations' ) => $this->app->databasePath() . '/migrations',
		] );

		$this->loadViewsFrom( __DIR__ . '/../../../views', 'facebook-app' );

		include __DIR__ . '/../../../routes.php';
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
