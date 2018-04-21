<div class="ui segment">
    <h4 class="ui dividing header">Sản phẩm tương tự</h4>
    <div class="ui feed">
        @foreach($relatedProducts as $product)
            <div class="event">
                <div class="label">
                    <img src="/{{ $product->anh_dai_dien }}"  style="border-radius: 0 !important;">
                </div>
                <div class="content">
                    <div class="summary">
                        <a href="{{ route('product.viewer', [$product->slug]) }}">
                            {{ $product->ten_san_pham }}
                        </a>
                    </div>
                    <div class="date red-text" style="margin-top: 1px;">
                        {{ \App\Helper\StringHelper::toCurrencyString($product->priceSale()) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>