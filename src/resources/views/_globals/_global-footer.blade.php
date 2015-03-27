<div class="_global-footer">
    <div class="text-center">
	    <div class="btn-group">
	        @if(Auth::check())
	            @include('facebook-app::_partials._invite-button')
	        @endif

			@if($texts->terms_of_use)
	        	<button class="btn-link" data-toggle="modal" data-target=".modal-terms">Teilnahmebedingungen</button>
	        @endif

			@if($texts->privacy_policy)
				<button class="btn-link" data-toggle="modal" data-target=".modal-privacy">Datenschutzbestimmungen</button>
			@endif

	    </div>
	</div>
</div>