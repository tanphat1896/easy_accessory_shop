@php
    $totalAmount = 0; $totalCost = 0;
@endphp
<table class="ui compact table square-border">
    <thead>
    <tr class="center aligned">
        <th>Mặt hàng</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        @php
            $totalCost += $product->don_gia * $product->so_luong;
            $totalAmount += $product->so_luong;
        @endphp
        <tr>
            <td>
                <img src="/{{ $product->anh_dai_dien }}" class="ui mini image spaced">
                {{ $product->ten_san_pham }}
            </td>
            <td>{{ \App\Helper\StringHelper::toCurrencyString($product->don_gia) }}</td>
            <td class="center aligned">{{ $product->so_luong }}</td>
            <td class="center aligned">
                {{ \App\Helper\StringHelper::toCurrencyString($product->don_gia * $product->so_luong) }}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th class="right aligned" colspan="2"><strong>Tổng cộng</strong></th>
        <th class="center aligned">{{ $totalAmount }}</th>
        <th class="center aligned"><span class="ui red label">{{ \App\Helper\StringHelper::toCurrencyString($totalCost) }}</span></th>
    </tr>
    </tfoot>
</table>