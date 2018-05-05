<h4 class="ui dividing header">Sản phẩm</h4>
<table class="ui table striped celled" id="san-pham-don-hang">
    <thead>
    <tr>
        <th class="collapsing">STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Tổng giá</th>
    </tr>
    </thead>
    <tbody>
    @foreach($chiTietDonHangs as $stt => $chiTietDonHang)
        <tr>
            <td>{{ $stt + 1 }}</td>
            <td><a href="{{ route('san_pham.show', [$chiTietDonHang->san_pham_id]) }}">
                    {{ $chiTietDonHang->tenSanPham() }}
                </a>
            </td>
            <td>{{ $chiTietDonHang->so_luong }}</td>
            <td>{{ number_format($chiTietDonHang->don_gia) }} đ</td>
            <td>{{ number_format($chiTietDonHang->tongTien()) }} đ</td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($chiTietDonHangs, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $chiTietDonHangs->render('vendor.pagination.smui')}}
    </div>
@endif