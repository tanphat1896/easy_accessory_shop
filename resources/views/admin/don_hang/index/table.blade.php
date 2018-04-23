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
            <td>{{ $donHang->hinh_thuc_thanh_toan }}</td>
            <td>{{ App\ChiTietDonHang::where('don_hang_id', $donHang->id)->count() }}</td>
            <td>{{ number_format($donHang->tong_tien) }} đ</td>
            <td  class="collapsing">
                <a class="ui small blue label" href="{{ route('don_hang.show',[$donHang->id]) }}">
                    <i class="eye open fitted icon"></i>
                </a>
                <a class="ui small teal label">Duyệt</a>
                <a class="ui small orange label">Xóa</a>
                {{--<a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}"--}}
                   {{--class="ui small blue label">--}}
                    {{--<i class="eye open fitted icon"></i>--}}
                {{--</a>--}}
                {{--<a href="#" onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')"--}}
                   {{--class="ui small green label">--}}
                    {{--<i class="edit fitted icon"></i>--}}
                {{--</a>--}}
                {{--<a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}" class="ui small blue label">Xem</a>--}}
                {{--<a href="#" class="ui small teal label"--}}
                {{--onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')">Sửa</a>--}}
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