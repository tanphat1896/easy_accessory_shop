<div class="ui bottom attached tab segment {{ Request::has('lim') ? 'active' : '' }}" data-tab="second">
    <h5 class="ui dividing header">
        Top {{ Request::get('lim') ?: 10 }} sản phẩm mua nhiều trong vòng {{ Request::get('m') ?: 3 }} tháng

        <span class="pointer force-right"
              onclick="showExport(
                  toAscii('Top {{ Request::get('lim') ?: 10 }} sản phẩm mua nhiều trong vòng {{ Request::get('m') ?: 3 }} tháng'),
                  hotProductCols,
                  hotProductRows)">
            <i class="file pdf outline icon red small-lr-margin"></i>PDF
        </span>
    </h5>
    <form action="" method="get" class="ui tiny form">
        <div class="inline fields">
            <div class="field">
                <label>Số lượng:</label>
                <select name="lim">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>
            <div class="field">
                <label>Khoảng thời gian:</label>
                <select name="m">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
            </div>
            <div class="field">
                <button class="ui blue label pointer">Xem</button>
            </div>
        </div>
    </form>
    <table class="ui table celled striped compact" id="product-hot-table">
        <thead>
        <tr>
            <th class="collapsing">STT</th>
            <th>Tên sản phẩm</th>
            <th class="collapsing">Lượt mua</th>
        </tr>
        </thead>
        <tbody>

        @foreach($hotProducts as $idx => $product)
            <tr>
                <td class="center aligned">{{ $idx + 1 }}</td>
                <td>
                    <img src="/{{ $product->anh_dai_dien }}" class="ui mini image spaced">
                    <a href="{{ route('san_pham.show', [$product->id]) }}">
                        {{ $product->ten_san_pham }}
                    </a>
                </td>
                <td class="center aligned"> {{ $product->total }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('script')
    <script>
        bindDataTable('product-hot-table', true);

        let hotProductCols = ['STT', 'Ten san pham', 'Luot mua'];
        let hotProductRows = [];
        let products = JSON.parse('{!!  $hotProducts  !!}');
        products.forEach((product, idx) => {
            hotProductRows.push([
                idx + 1,
                toAscii(product.ten_san_pham),
                product.total
            ]);
        });
    </script>
@endpush