<?php namespace Euw\FacebookApp\Http\Controllers\Api;

use Euw\FacebookApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response as IlluminateResponse;

class InvitationsController extends Controller {

	public function store() {

		$requestRepository = app()->make('Euw\FacebookApp\Modules\Requests\Repositories\RequestRepository');
		$userRepository = app()->make( 'Euw\FacebookApp\Modules\Users\Repositories\UserRepository' );
		$invitationRepository = app()->make( 'Euw\FacebookApp\Modules\Invitations\Repositories\InvitationRepository' );

		$request = $requestRepository->create( Input::all() );

		$me = Auth::user();

		$uid = $me->fb_id;

		$sender = $userRepository->getFirstBy( 'fb_id', $uid );

		if ( ! $sender ) {
			$userInfo = $me;

			$sender = $userRepository->create( array_merge( $userInfo, [
				'fb_id' => $uid
			] ) );
		}

		foreach ( Input::get( 'to' ) as $to ) {

			$recipient = $userRepository->getFirstBy( 'fb_id', $to );

			if ( ! $recipient ) {
				$recipient = $userRepository->create( [
					'fb_id' => $to
				] );
			}

			$invitationRepository->create( array_merge( Input::all(), [
				'sender_id'    => $sender->id,
				'recipient_id' => $recipient->id,
				'request_id'   => $request->id
			] ) );
		}

		return response( [ 'data' => $request ], IlluminateResponse::HTTP_CREATED );
	}

}
