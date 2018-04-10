@php
    $comments = $product->comments()->get();
@endphp

<div class="ui grid">
    <div class="five wide column"></div>
    <div class="eleven wide column">
        <div class="ui top attached tabular menu">
            <div class="active item">Bình luận ({{ $comments->count() }})</div>
        </div>

        @include('frontend.product_viewer.partial.tab_comment')
    </div>
</div>