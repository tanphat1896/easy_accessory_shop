@php
    $totalAmount = 0; $totalCost = 0;
@endphp
<table class="ui compact table square-border center aligned">
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
            <td class="left aligned">
                <img src="/{{ $product->anh_dai_dien }}" class="ui mini image spaced">
                {{ $product->ten_san_pham }}
            </td>
            <td>{{ \App\Helper\StringHelper::toCurrencyString($product->don_gia) }}</td>
            <td>{{ $product->so_luong }}</td>
            <td>
                {{ \App\Helper\StringHelper::toCurrencyString($product->don_gia * $product->so_luong) }}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th><strong>Tổng cộng</strong></th>
        <th>{{ $totalAmount }}</th>
        <th><span class="ui red label">{{ \App\Helper\StringHelper::toCurrencyString($totalCost) }}</span></th>
    </tr>
    </tfoot>
</table>