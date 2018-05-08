
<div class="ui bottom attached tab segment" data-tab="third">
    <h5 class="ui header right aligned">
        <span class="pointer"
              onclick="showExportMultiple(
                  'Thong ke san pham het hang/ngung kinh doanh',
                  'San pham het hang',
                  outProductCols, outProductRows,
                  'San pham ngung kinh doanh',
                  outProductCols, stopProductRows
              )">
            <i class="file pdf outline red icon fitted"></i>
            PDF
        </span>
    </h5>
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

        let outProductCols = ['STT', 'Ten san pham'];
        let stopProductRows = [], outProductRows = [];

        let outProducts = JSON.parse('{!! $outProducts !!}');
        let stopProducts = JSON.parse('{!! $stopProducts !!}');
        outProducts.forEach((p, i) => {
            outProductRows.push([i+1, toAscii(p.ten_san_pham)]);
        });
        stopProducts.forEach((p, i) => {
            stopProductRows.push([i+1, toAscii(p.ten_san_pham)]);
        });
    </script>
@endpush