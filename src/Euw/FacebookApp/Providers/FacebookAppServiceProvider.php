<?php namespace Euw\FacebookApp\Providers;

use Illuminate\Support\ServiceProvider;
use Euw\FacebookApp\Modules\Invitations\Models\Invitation;
use Euw\FacebookApp\Modules\Invitations\Repositories\EloquentInvitationRepository;
use Euw\FacebookApp\Modules\Texts\Models\Text;
use Euw\FacebookApp\Modules\Texts\Repositories\EloquentTextRepository;
use Euw\FacebookApp\Modules\Users\Models\User;
use Euw\FacebookApp\Modules\Users\Repositories\EloquentUserRepository;
use Euw\FacebookApp\Modules\Requests\Models\Request;
use Euw\FacebookApp\Modules\Requests\Repositories\EloquentRequestRepository;

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

		$this->loadViewsFrom( __DIR__ . '/../../../resources/views', 'facebook-app' );

		include __DIR__ . '/../../../routes.php';
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerTextRepository();
		$this->registerUserRepository();
		$this->registerRequestRepository();
		$this->registerInvitationRepository();
	}

	public function registerTextRepository() {
		$this->app->bind( 'Euw\FacebookApp\Modules\Texts\Repositories\TextRepository', function ( $app ) {
			return new EloquentTextRepository( new Text, $app['context'] );
		} );
	}

	public function registerUserRepository() {
		$this->app->bind( 'Euw\FacebookApp\Modules\Users\Repositories\UserRepository', function ( $app ) {
			return new EloquentUserRepository( new User, $app['context'] );
		} );
	}

	public function registerRequestRepository() {
		$this->app->bind( 'Euw\FacebookApp\Modules\Requests\Repositories\RequestRepository', function ( $app ) {
			return new EloquentRequestRepository( new Request, $app['context'] );
		} );
	}

	public function registerInvitationRepository() {
		$this->app->bind( 'Euw\FacebookApp\Modules\Invitations\Repositories\InvitationRepository', function ( $app ) {
			return new EloquentInvitationRepository( new Invitation, $app['context'] );
		} );
	}

}
