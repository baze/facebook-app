<?php namespace Euw\FacebookApp\Http\Controllers;

use Euw\FacebookApp\Modules\Texts\Models\Text;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

    use DispatchesCommands, ValidatesRequests;

    protected $tenant;

    public function __construct()
    {
        $context = app()->make('Euw\MultiTenancy\Contexts\Context');
        $this->tenant = $context->getOrThrowException();

        $textRepository = app()->make( 'Euw\FacebookApp\Modules\Texts\Repositories\TextRepository' );
        $texts = $textRepository->first();

        if ( ! $texts ) {
            $texts = new Text;
        }

        $priceRepository = app()->make( 'Euw\FacebookApp\Modules\Prices\Repositories\PriceRepository' );
        $prices = $priceRepository->all();

        $appId = config( 'laravel-facebook-sdk.facebook_config.app_id' );
        $channelUrl = config( 'euw-facebook-app.channelUrl' );
        $permissions = config( 'laravel-facebook-sdk.default_scope' );
        $url = URL::to( '/' );

        $fbId = Auth::check() ? Auth::user()->fb_id : null;

        JavaScriptFacade::put([
            'appId'       => $appId,
            'channelUrl'  => $channelUrl,
            'pageId'      => $this->tenant->fb_page_id,
            'permissions' => implode( $permissions, ',' ),
            'url'         => $url,
            'fbId'        => $fbId,
            'redirectToPageTab' => config( 'euw-facebook-app.redirectToPageTab' ),
        ]);

        view()->share( 'tenant', $this->tenant );
        view()->share( 'pageId', $this->tenant->fb_page_id );
        view()->share( 'gaTrackingId', $this->tenant->ga_tracking_id );
        view()->share( 'appName', config( 'euw-facebook-app.appName' ) );
        view()->share( 'texts', $texts );
        view()->share( 'prices', $prices );
    }

}
