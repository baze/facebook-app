<div class="text-center">
    <div class="btn-group">
        @if(Auth::check())
            @include('facebook-app::_partials._invite-button')
        @endif
        <button class="btn-link" data-toggle="modal" data-target=".modal-terms">Teilnahmebedingungen</button>
        {{--<button class="btn-link" data-toggle="modal" data-target=".modal-privacy">Datenschutzbestimmungen</button>--}}
    </div>
</div>

@include('facebook-app::_partials._modal', ['modalClass' => 'modal-terms', 'title' => 'Teilnahmebedingungen', 'body' => $texts->terms_of_use ])
{{--@include('facebook-app::_partials._modal', ['modalClass' => 'modal-privacy', 'title' => 'Datenschutzbestimmungen', 'body' => $texts->privacy_policy ])--}}