<input type="hidden" name="_token" value="{{ csrf_token() }}">

<a href="{{ $loginUrl }}" class="{{ isset($classes) ? $classes : '' }}">
	<i class="fa fa-facebook-official"></i> Klick hier, um mitzuspielen
</a>