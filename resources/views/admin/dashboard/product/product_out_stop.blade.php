
<div class="ui bottom attached tab segment" data-tab="third">
    <div class="ui two column grid">
        <div class="column">
            <h5 class="ui dividing header no-margin-bottom">Sản phẩm hết hàng</h5>
            <table class="ui table celled striped compact" id="product-out-table">
                <thead>
                <tr><th class="collapsing">STT</th><th>Tên sản phẩm</th></tr>
                </thead>
                <tbody>
                @foreach($outProducts as $idx => $product)
                    <tr>
                        <td class="center aligned">{{ $idx + 1 }}</td>
                        <td>
                            <img src="/{{ $product->anh_dai_dien }}" class="ui mini image spaced">
                            <a href="{{ route('san_pham.show', [$product->id]) }}">
                                {{ $product->ten_san_pham }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="column">
            <h5 class="ui dividing header no-margin-bottom">Sản phẩm ngừng kinh doanh</h5>
            <table class="ui table celled striped compact" id="product-stop-table">
                <thead>
                <tr><th class="collapsing">STT</th><th>Tên sản phẩm</th></tr>
                </thead>
                <tbody>
                @foreach($stopProducts as $idx => $product)
                    <tr>
                        <td class="center aligned">{{ $idx + 1 }}</td>
                        <td>
                            <img src="/{{ $product->anh_dai_dien }}" class="ui mini image spaced">
                            <a href="{{ route('san_pham.show', [$product->id]) }}">
                                {{ $product->ten_san_pham }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        bindDataTable('product-out-table', true);
        bindDataTable('product-stop-table', true);
    </script>
@endpush