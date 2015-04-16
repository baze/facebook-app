<div class="_global-app-footer">
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

		@if(isset($pageId))
			<p>
			<div class="fb-like"
				 data-href="https://www.facebook.com/{{ $pageId }}"
				 data-layout="button"
				 data-action="like"
				 data-show-faces="false"
				 data-share="false"></div>
			</p>
		@endif
	</div>
</div>