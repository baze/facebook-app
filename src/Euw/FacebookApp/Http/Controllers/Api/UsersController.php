<?php namespace Euw\FacebookApp\Http\Controllers\Api;

use Illuminate\Http\Response as IlluminateResponse;
use Euw\FacebookApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

	public function store() {

		if ( Input::get( 'id' )) {
			$user = \App\User::createOrUpdateGraphNode( Input::all() );

			return response( [ 'data' => $user ]);
		} else {
			return response( [ 'error' => 'No ID specified' ], IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY );
		}

	}

}
