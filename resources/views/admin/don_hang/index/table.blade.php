<table class="ui table very compact striped celled selectable" id="bang-don-hang">

    <thead>
    <tr>
        <th class="collapsing">STT</th>
        <th>Người nhận hàng</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt hàng</th>
        <th>Hình thức thanh toán</th>
        <th>Số sản phẩm</th>
        <th>Tổng tiền</th>
        <th>Tình trạng</th>
        <th>Hành động</th>
    </tr>
    </thead>

    <tbody>

    @foreach($donHangs as $stt => $donHang)
        <tr>
            <input type="hidden" name="don-hang-id[]" value="{{ $donHang->id }}">
            <td>{{ $stt + 1 }}</td>
            <td>{{ $donHang->ten_nguoi_nhan }}</td>
            <td>{{ $donHang->sdt_nguoi_nhan }}</td>
            <td>{{ $donHang->ngay_dat_hang }}</td>
            <td>
                {{ $donHang->hinh_thuc_thanh_toan }}
                @if($donHang->)
            </td>
            <td>{{ App\ChiTietDonHang::where('don_hang_id', $donHang->id)->count() }}</td>
            <td>{{ number_format($donHang->tong_tien) }} đ</td>
            <td>
                @if($donHang->tinh_trang == 1)
                    <span style="color: green" ><strong>Đã duyệt</strong></span>
                @else
                    <span style="color: red"><strong>Chưa duyệt</strong></span>
                @endif
            </td>
            <td  class="collapsing">
                <a class="ui small blue label" href="{{ route('don_hang.show',[$donHang->id]) }}">
                    <i class="eye open fitted icon"></i>
                </a>
                @if($donHang->tinh_trang == 0)
                    <a class="ui small teal label">
                        <i class="check open fitted icon"></i>
                    </a>
                    <a class="ui small orange label">
                        <i class="remove open fitted icon"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach

    </tbody>

</table>

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush