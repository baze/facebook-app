@if($texts->terms_of_use)
	@include('facebook-app::_partials._modal', ['modalClass' => 'modal-auth', 'title' => 'Bitte erlaube der App Zugriff auf deine Daten.', 'body' => $texts->permission_denied ])
@endif


@if($texts->terms_of_use)
	@include('facebook-app::_partials._modal', ['modalClass' => 'modal-terms', 'title' => 'Teilnahmebedingungen', 'body' => $texts->terms_of_use ])
@endif

@if($texts->privacy_policy)
	@include('facebook-app::_partials._modal', ['modalClass' => 'modal-privacy', 'title' => 'Datenschutzbestimmungen', 'body' => $texts->privacy_policy ])
@endif