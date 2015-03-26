@include('facebook-app::_globals._global-footer-navigation')

@include('facebook-app::_partials._modal', ['modalClass' => 'modal-auth', 'title' => 'Bitte erlaube der App Zugriff auf deine Daten.', 'body' => $texts->permission_denied ])