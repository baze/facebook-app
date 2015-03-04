<?php namespace Euw\FacebookApp\Http\Controllers;

use App;
use Config;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use View;

class BaseController extends App\Http\Controllers\Controller
{
    protected $tenant;

    public function __construct()
    {
        $context = App::make('Euw\MultiTenancy\Contexts\Context');
        $this->tenant = $context->getOrThrowException();

        $appId = Config::get( 'laravel-facebook-sdk.facebook_config.app_id' );
        $channelUrl = Config::get( 'euw-facebook-app.channelUrl' );
        $permissions = Config::get( 'laravel-facebook-sdk.default_scope' );

        JavaScriptFacade::put([
            'appId'       => $appId,
            'channelUrl'  => $channelUrl,
            'pageId'      => $this->tenant->fb_page_id,
            'permissions' => implode( $permissions, ',' )
        ]);

        View::share('pageId', $this->tenant->fb_page_id);
    }

}
