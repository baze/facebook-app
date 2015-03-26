<div class="description">
	@if($texts->instructions_headline)
	<h3 class="instructions_headline">{{ $texts->instructions_headline }}</h3>
	@endif

	@if($texts->instructions_subline)
    <h4 class="instructions_subline">{{ $texts->instructions_subline }}</h4>
    @endif

    @if($texts->instructions_lead)
    <p class="instructions_lead">{{ nl2br($texts->instructions_lead) }}</p>
    @endif

    @if($texts->instructions_body)
    <p class="instructions_body">{!! nl2br($texts->instructions_body) !!}</p>
    @endif

    @if($texts->call_to_action)
    <p class="call_to_action">{!! nl2br($texts->call_to_action) !!}</p>
    @endif
</div>