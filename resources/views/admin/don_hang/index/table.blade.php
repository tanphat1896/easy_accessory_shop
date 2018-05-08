<table class="ui table very compact striped celled selectable" id="bang-don-hang">

    <thead>
    <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Người dặt hàng</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt hàng</th>
        {{--<th>Hình thức thanh toán</th>--}}
        <th>Số SP</th>
        <th>Tổng tiền</th>
        <th>Tình trạng</th>
        <th class="collapsing">Duyệt</th>
        <th class="collapsing">Hủy</th>
    </tr>
    </thead>

    <tbody>

    @foreach($donHangs as $stt => $donHang)
        <tr>
            <input type="hidden" name="don-hang-id[]" value="{{ $donHang->id }}">
            <td>{{ $stt + 1 }}</td>
            <td class="collapsing">
                <a href="{{ route('don_hang.show', [$donHang->id]) }}">
                    {{ $donHang->ma_don_hang }}
                </a>
            </td>
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
                @if($donHang->daHuy())
                    <i class="delete open fitted icon"></i>
                    <strong> Đã hủy</strong>
                @elseif($donHang->chuaDuyet())
                    <i class="warning open fitted orange icon"></i>
                    <span style="color: orange" ><strong> Chưa duyệt</strong></span>
                @elseif($donHang->daDuyet())
                    <i class="wait teal open fitted red icon"></i>
                    <span style="color: teal"><strong>Đang vận chuyển</strong></span>
                @else
                    <i class="check green open fitted red icon"></i>
                    <span style="color: green"><strong>Đã giao hàng</strong></span>
                @endif
            </td>
            {{--<td>--}}
                {{--<a class="ui small blue label" href="{{ route('don_hang.show', [$donHang->id]) }}">--}}
                    {{--<i class="eye open fitted icon"></i>--}}
                {{--</a>--}}
            {{--</td>--}}
            <td>
                @if($donHang->chuaDuyet())
                    <a class="ui small teal label" href="{{ route('duyet_don', [$donHang->id]) }}"
                       onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                        <i class="check open fitted icon"></i>
                    </a>
                @endif
            </td>
            <td>
                @if($donHang->chuaDuyet())
                    <a class="ui small orange label" href="{{ route('huy_don', [$donHang->id]) }}"
                       onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                        <i class="remove open fitted icon"></i>
                    </a>
                @elseif($donHang->daHuy())
                    <a class="ui small red label" href="{{ route('huy_don', [$donHang->id]) }}"
                       onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này?')">
                        <i class="remove open fitted icon"></i>
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($donHangs, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $donHangs->render('vendor.pagination.smui')}}
    </div>
@endif

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush