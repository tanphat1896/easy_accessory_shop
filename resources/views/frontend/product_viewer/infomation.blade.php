@php
    $comments = $product->comments()->get();
@endphp

<div class="ui stackable grid">
    <div class="five wide column">
        @include('frontend.product_viewer.partial.related_product')
    </div>

    <div class="eleven wide column">
        <div class="ui top attached tabular menu">
            <div class="active item" data-tab="first">Thông tin</div>
            <div class="item" data-tab="second">Bình luận ({{ $comments->count() }})</div>
        </div>

        @include('frontend.product_viewer.partial.tab_info')
        @include('frontend.product_viewer.partial.tab_comment')
    </div>
</div>