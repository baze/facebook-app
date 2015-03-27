<div class="description">
	@if($texts->headline)
	<h3 class="headline">{{ $texts->headline }}</h3>
	@endif

	@if($texts->subline)
    <h4 class="subline">{{ $texts->subline }}</h4>
    @endif

    @if($texts->leading_copy)
    <p class="leading_copy">{{ nl2br($texts->leading_copy) }}</p>
    @endif

    @if($texts->copy)
    <p class="copy">{!! nl2br($texts->copy) !!}</p>
    @endif

    @if($texts->call_to_action)
    <p class="call_to_action">{!! nl2br($texts->call_to_action) !!}</p>
    @endif
</div>