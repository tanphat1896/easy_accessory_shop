<h3 class="ui blue-text dividing header">Danh sách sản phẩm</h3>
<table class="ui table celled striped">
    <thead>
    <tr class="center aligned">
        {{--<th class="collapsing">--}}
            {{--<div class="ui checkbox" id="select-all-products">--}}
                {{--<input type="checkbox">--}}
            {{--</div>--}}
        {{--</th>--}}
        <th class="collapsing">STT</th>
        <th>Tên sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($sale->products as $idx => $product)

        <tr>
            <td class="force-hidden sale-products">{{ $product->id }}</td>
            <td>{{ $idx + 1 }}</td>
            <td>{{ $product->getName() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>