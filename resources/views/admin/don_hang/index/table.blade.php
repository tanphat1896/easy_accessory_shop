<table class="ui table very compact striped celled selectable" id="bang-don-hang">

    <thead>
    <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Người dặt hàng</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt hàng</th>
        {{--<th>Hình thức thanh toán</th>--}}
        <th>Số sản phẩm</th>
        <th>Tổng tiền</th>
        <th>Tình trạng</th>
        <th class="collapsing">Hành động</th>
    </tr>
    </thead>

    <tbody>

    @foreach($donHangs as $stt => $donHang)
        <tr>
            <input type="hidden" name="don-hang-id[]" value="{{ $donHang->id }}">
            <td>{{ $stt + 1 }}</td>
            <td class="collapsing">{{ $donHang->ma_don_hang }}</td>
            <td>{{ $donHang->ten_nguoi_nhan }}</td>
            <td>{{ $donHang->sdt_nguoi_nhan }}</td>
            <td>{{ $donHang->ngay_dat_hang }}</td>
            {{--<td>--}}
                {{--@switch($donHang->hinh_thuc_thanh_toan)--}}
                    {{--@case('cash')--}}
                        {{--Trực tiếp khi nhận hàng--}}
                        {{--@break--}}
                    {{--@case('nganluong')--}}
                        {{--Qua ngân lượng--}}
                        {{--@break--}}
                    {{--@case('baokim')--}}
                        {{--Qua bảo kim--}}
                        {{--@break--}}
                {{--@endswitch--}}
                {{--@if(($donHang->tinh_trang_thanh_toan == 1)&&($donHang->hinh_thuc_thanh_toan != 'cash'))--}}
                    {{--(<span style="color: green">đã thanh toán</span>)--}}
                {{--@elseif(($donHang->tinh_trang_thanh_toan == 0)&&($donHang->hinh_thuc_thanh_toan != 'cash'))--}}
                    {{--(<span style="color: red">chưa thanh toán</span>)--}}
                {{--@endif--}}
            {{--</td>--}}
            <td>{{ $donHang->chiTietDonHangs()->count() }}</td>
            <td>{{ number_format($donHang->tong_tien) }} đ</td>
            <td>
                @if($donHang->tinh_trang == 0)
                    <i class="warning open fitted red icon"></i>
                    <span style="color: red" ><strong> Chưa duyệt</strong></span>
                @elseif($donHang->tinh_trang == 1)
                    <i class="wait teal open fitted red icon"></i>
                    <span style="color: teal"><strong>Đang vận chuyển</strong></span>
                @else
                    <i class="check green open fitted red icon"></i>
                    <span style="color: green"><strong>Đã giao hàng</strong></span>
                @endif
            </td>
            <td class="collapsing">
                <a class="ui small blue label" href="{{ route('don_hang.show',[$donHang->id]) }}">
                    <i class="eye open fitted icon"></i>
                </a>
                @if($donHang->tinh_trang == 0)
                    <a class="ui small teal label" href="{{ route('duyet_don', [$donHang->id]) }}"
                       onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                        <i class="check open fitted icon"></i>
                    </a>
                    <a class="ui small orange label" href="{{ route('huy_don', [$donHang->id]) }}"
                        onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                        <i class="remove open fitted icon"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach

    </tbody>

    @if (method_exists($donHangs, 'render'))
        <tfoot>
        <tr class="center aligned"><th colspan="9">
                {{ $donHangs->render('vendor.pagination.smui')}}
            </th></tr>
        </tfoot>
    @endif

</table>

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush