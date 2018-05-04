<div class="ui basic segment no-padding no-margin table-responsive">

    <table class="ui table celled striped unstackable" id="table-sale-product">
        <thead>
        <tr class="center aligned">
            <th class="collapsing">
                <div class="ui checkbox" id="select-all-current">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Tên sản phẩm</th>
        </tr>
        </thead>
        <tbody>
        @php
            $start = ($products->currentPage() - 1) * $products->perPage();
        @endphp
        @foreach ($products as $idx => $product)

            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="product-id[]" value="{{ $product->id }}">
                    </div>
                </td>
                <td>{{ $start + $idx + 1 }}</td>
                <td>{{ $product->ten_san_pham }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="ui segment basic center aligned no-padding">
    {{ $products->render('vendor.pagination.smui') }}
</div>