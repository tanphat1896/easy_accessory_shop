
<table class="ui table celled striped" id="table-sale-product">
    <thead>
    <tr class="center aligned">
        <th class="collapsing">
            <div class="ui checkbox" id="select-all-current">
                <input type="checkbox">
            </div>
        </th>
        <th class="force-hidden"></th>
        <th class="collapsing">STT</th>
        <th>Tên sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($sale->products as $idx => $product)

        <tr>
            <td>
                <div class="ui child checkbox">
                    <input type="checkbox" name="product-id[]" value="{{ $sale->id }}">
                </div>
            </td>
            <td class="force-hidden sale-products">{{ $product->id }}</td>
            <td>{{ $idx + 1 }}</td>
            <td>{{ $product->ten_san_pham }}</td>
        </tr>
    @endforeach
    </tbody>
</table>