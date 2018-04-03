<style>
    /*.br-theme-fontawesome-stars-o .br-widget a.br-selected:after*/
    /*{*/
        /*color: #ffe623 !important;*/
    /*}*/
    i.star.icon{
        margin-left: -4px !important;
    }
    i.star.icon:first-child {
        margin-left: 0 !important;
    }
</style>
{{--<select class="rating-component">--}}
    {{--<option value="1">1</option>--}}
    {{--<option value="1.5">1.5</option>--}}
    {{--<option value="2">2</option>--}}
    {{--<option value="2.5">2.5</option>--}}
    {{--<option value="3">3</option>--}}
    {{--<option value="3.5">3.5</option>--}}
    {{--<option value="4">4</option>--}}
    {{--<option value="4.5">4.5</option>--}}
    {{--<option value="5">5</option>--}}
{{--</select>--}}
<div style="display: inline-block;" class="rating-component">
    @php
        $star = floatval(str_replace(',', '.', $slot));
        $floor = floor($star);
    @endphp
    @for ($i = 0; $i < $floor; $i++)
        <i class="star yellow fitted icon"></i>
    @endfor
    @if ($star - $floor > 0)
        <i class="star half yellow fitted icon"></i>
    @endif
</div>

@push('script')
    {{--<script>--}}
        {{--$('.rating-component').barrating({--}}
            {{--theme: 'fontawesome-stars-o',--}}
            {{--initialRating: '{{ $slot }}'--}}
        {{--});--}}
    {{--</script>--}}
@endpush