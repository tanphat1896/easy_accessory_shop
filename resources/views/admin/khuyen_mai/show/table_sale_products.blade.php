<h4 class="ui dividing header">Danh sách sản phẩm</h4>
<table class="ui table celled striped">
    <thead>
    <tr class="center aligned">
        {{--<th class="collapsing">--}}
            {{--<div class="ui checkbox" id="select-all-products">--}}
                {{--<input type="checkbox">--}}
            {{--</div>--}}
        {{--</th>--}}
        <th class="collapsing">STT</th>
        <th class="collapsing">Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($sale->products as $idx => $product)

        <tr>
            <td class="force-hidden sale-products">{{ $product->id }}</td>
            <td>{{ $idx + 1 }}</td>
            <td>{{ $product->ma_san_pham }}</td>
            <td>{{ $product->getName() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>