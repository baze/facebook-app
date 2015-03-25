<?php namespace Euw\FacebookApp\Http\Controllers;

use Config;
use Euw\FacebookApp\Modules\Texts\Models\Text;
use Illuminate\Support\Facades\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

    use DispatchesCommands, ValidatesRequests;

    protected $tenant;

    public function __construct()
    {
        $this->middleware( 'facebook-app.auth' );

        $context = app()->make('Euw\MultiTenancy\Contexts\Context');
        $this->tenant = $context->getOrThrowException();

        $textRepository = app()->make( 'Euw\FacebookApp\Modules\Texts\Repositories\TextRepository' );
        $texts = $textRepository->first();

        if ( ! $texts ) {
            $texts = new Text;
        }

        view()->share( 'texts', $texts );

        $appId = Config::get( 'laravel-facebook-sdk.facebook_config.app_id' );
        $channelUrl = Config::get( 'euw-facebook-app.channelUrl' );
        $permissions = Config::get( 'laravel-facebook-sdk.default_scope' );

        JavaScriptFacade::put([
            'appId'       => $appId,
            'channelUrl'  => $channelUrl,
            'pageId'      => $this->tenant->fb_page_id,
            'permissions' => implode( $permissions, ',' ),
            'url'         => Request::url()
        ]);

        view()->share('pageId', $this->tenant->fb_page_id);
    }

}
