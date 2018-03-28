<div>
    @php
        $star = floatval(str_replace(',', '.', $slot));
        $floor = floor($star);
    @endphp
    @for ($i = 0; $i < $floor; $i++)
        <i class="star yellow fitted icon" style="margin: 0 0 0 -4px !important"></i>
    @endfor
    @if ($star - $floor > 0)
        <i class="star half yellow fitted icon" style="margin: 0 0 0 -4px !important"></i>
    @endif
</div>