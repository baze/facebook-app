{{--<div ng-hide="user.id" class="text-center">--}}
    <p>
        <fb-login label="Klick hier, um mitzuspielen"
                  class="{{ isset($classes) ? $classes : 'btn btn-primary' }}"
                  redirect="{{ isset($redirect) && $redirect ? 'true' : 'false' }}">
        </fb-login>
    </p>
{{--</div>--}}