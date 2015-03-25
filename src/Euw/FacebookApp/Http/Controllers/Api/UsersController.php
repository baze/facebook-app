<?php namespace Euw\FacebookApp\Http\Controllers\Api;

use Illuminate\Http\Response as IlluminateResponse;
use Euw\FacebookApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

	public function store() {

		$uid = Input::get( 'id' );

		$userRepository = app()->make('Euw\FacebookApp\Modules\Users\Repositories\UserRepository');

		$user = $userRepository->getFirstBy( 'fb_id', $uid );

		$statusCode = IlluminateResponse::HTTP_OK;

		if ( ! $user ) {
			$user = $userRepository->create( array_merge( Input::all(), [
				'fb_id' => $uid
			] ) );

			$statusCode = IlluminateResponse::HTTP_CREATED;
		}

		return response( [ 'data' => $user ], $statusCode );

	}

}
