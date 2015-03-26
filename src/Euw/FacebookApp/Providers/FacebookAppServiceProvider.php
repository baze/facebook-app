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
			__DIR__ . '/../../../migrations/' => base_path( '/database/migrations' )
		], 'migrations' );

		$this->publishes( [
			__DIR__ . '/../../../config/euw-facebook-app.php' => config_path( 'euw-facebook-app.php' ),
		], 'config' );

		$this->publishes( [
			__DIR__ . '/../../../resources/assets/js/' => base_path( '/resources/assets/js' )
		]);

		$this->publishes( [
			__DIR__ . '/../../../resources/lang/de/validation.php' => base_path( '/resources/lang/de/validation.php' )
		] );

		$this->loadViewsFrom( __DIR__ . '/../../../resources/views', 'facebook-app' );

		$this->loadTranslationsFrom( __DIR__ . '/../../../resources/lang', 'facebook-app' );

		include __DIR__ . '/../../../routes.php';
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register( 'Euw\FacebookApp\Modules\Providers\ModuleProvider' );
	}

}
