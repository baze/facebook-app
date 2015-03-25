@if ($pageId)
    <layer-ad title="{{ $texts->fan_gate_title }}"
              body="{{ $texts->fan_gate_body }}"
              page="{{ $pageId }}"></layer-ad>
@endif