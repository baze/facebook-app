<?php namespace Euw\FacebookApp\Modules\Providers;

use Euw\FacebookApp\Modules\Invitations\Models\Invitation;
use Euw\FacebookApp\Modules\Invitations\Repositories\EloquentInvitationRepository;
use Euw\FacebookApp\Modules\Prices\Models\Price;
use Illuminate\Support\ServiceProvider;
use Euw\FacebookApp\Modules\Texts\Models\Text;
use Euw\FacebookApp\Modules\Texts\Repositories\EloquentTextRepository;
use Euw\FacebookApp\Modules\Users\Models\User;
use Euw\FacebookApp\Modules\Users\Repositories\EloquentUserRepository;
use Euw\FacebookApp\Modules\Requests\Models\Request;
use Euw\FacebookApp\Modules\Requests\Repositories\EloquentRequestRepository;

class ModuleProvider extends ServiceProvider
{

    /**
     * Register
     */
    public function register()
    {
        $this->registerTextRepository();
        $this->registerUserRepository();
        $this->registerRequestRepository();
        $this->registerInvitationRepository();
        $this->registerPriceRepository();
    }

    /**
     * Register Text Repository
     */
    public function registerTextRepository()
    {
        $this->app->bind('Euw\FacebookApp\Modules\Texts\Repositories\TextRepository', function ($app) {
            return new EloquentTextRepository(new Text, $app['context']);
        });
    }

    public function registerUserRepository()
    {
        $this->app->bind('Euw\FacebookApp\Modules\Users\Repositories\UserRepository', function ($app) {
            return new EloquentUserRepository(new User, $app['context']);
        });
    }

    public function registerRequestRepository()
    {
        $this->app->bind('Euw\FacebookApp\Modules\Requests\Repositories\RequestRepository', function ($app) {
            return new EloquentRequestRepository(new Request, $app['context']);
        });
    }

    public function registerInvitationRepository()
    {
        $this->app->bind('Euw\FacebookApp\Modules\Invitations\Repositories\InvitationRepository', function ($app) {
            return new EloquentInvitationRepository(new Invitation, $app['context']);
        });
    }

    public function registerPriceRepository() {
        $this->app->bind( 'Euw\FacebookApp\Modules\Prices\Repositories\PriceRepository', function ( $app ) {
            return new EloquentPriceRepository( new Price, $app['context'] );
        } );
    }


}