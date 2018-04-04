<h4 class="ui dividing header">Thêm sản phẩm</h4>
<form class="ui form segment" onsubmit="return false;">
    <div class="fields">
        <div class="field">
            <label>Loại sản phẩm</label>
            <select id="search-product-type" class="ui dropdown">
                @foreach($productTypes as $productType)
                    <option value="{{ $productType->id }}">{{ $productType->getName() }}</option>
                @endforeach
            </select>
        </div>
        <div class="field">
            <label>Tên sản phẩm</label>
            <input type="text" id="search-name" placeholder="Từ khóa">
        </div>
        <div class="field">
            <label for="">&nbsp;</label>
            <button type="button" id="btn-search"
                    class="ui blue button"
                    onclick="search()">
                <i class="search icon"></i>Tìm kiếm
            </button>
        </div>
    </div>
</form>
<form action="{{ route('chi_tiet_km.store') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="sale-id" value="{{ $sale->id }}">
    <button class="ui blue button">
        <i class="plus icon"></i>Thêm các sản phẩm đã chọn</button>
    <table class="ui table celled striped">
        <thead>
        <tr class="center aligned">
            <th class="collapsing">
                <div class="ui checkbox" id="select-all-products">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th class="collapsing">Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
        </tr>
        </thead>
        <tbody id="result-products"></tbody>
    </table>
</form>

@push('script')
    <script>
        let saleProductIds = [...$('.sale-products')].map(span => parseInt(span.innerText));
        function search() {
            console.log('search');
            let queryString = buildQueryString();
            let url = '/admin/ajax-request/products/search/' + queryString;

            axios.get(url).then(res => updateResultTable(res.data)).catch(err => console.log(err));
        }

        function buildQueryString() {
            let productType = $('#search-product-type').val();
            let name = $('#search-name').val();

            return `product-type=${productType};name=${name}`;
        }

        function updateResultTable(products) {
            let html = '';
            let count = 1;
            for (let i = 0; i < products.length; i++) {
                if (hasSale(products[i]))
                    continue;
                html += buildTableRowHtml(count++, products[i]);
            }
            if (products.length === 0 || html === '')
                html = '<tr class="center aligned"><td colspan="4">Không có sản phẩm nào</td></tr>';

            $('#result-products').html(html);
            $('.ui.checkbox').checkbox();
            bindSelectAll('select-all-products');
        }

        function hasSale(product) {
            return saleProductIds.indexOf(product.id) > -1;
        }

        function buildTableRowHtml(index, product) {
            let tr = '<tr>';
            tr += buildCheckboxFor(product);
            tr += `<td>${index}</td>`;
            tr += `<td>${product.ma_san_pham}</td>`;
            tr += `<td>${product.ten_san_pham}</td>`;
            return tr + '</tr>';
        }

        function buildCheckboxFor(product) {
            let td =
                `<td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="product-id[]" value="${product.id}">
                    </div>
                </td>`;
            return td;
        }
    </script>
@endpush