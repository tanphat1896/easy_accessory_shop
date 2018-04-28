<h4 class="ui dividing header">Thông tin</h4>
<form action="" class="ui form static">
    <div class="ui two column padded divided grid">
        <div class="column">
            <div class="inline field">
                <label class="label-fixed">Mã đơn hàng:</label>
                <div class="static-input">{{ $donHang->ma_don_hang }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Họ và tên:</label>
                <div class="static-input">{{ $donHang->ten_nguoi_nhan }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Số điện thoại:</label>
                <div class="static-input">{{ $donHang->sdt_nguoi_nhan }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Email:</label>
                <div class="static-input">{{ $donHang->email_nguoi_nhan }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Địa chỉ nhận hàng:</label>
                <div class="static-input">{{ $donHang->dia_chi }}</div>
            </div>
        </div>

        <div class=" column">
            <div class="inline field">
                <label class="label-fixed">Ngày đặt hàng:</label>
                <div class="static-input">{{ $donHang->formatDate('ngay_dat_hang') }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Hình thức thanh toán:</label>
                <div class="static-input">
                    @switch($donHang->hinh_thuc_thanh_toan)
                        @case('cash')
                            Trực tiếp
                            @break
                        @case('nganluong')
                            Ngân lượng
                            @break
                        @case('baokim')
                            Bảo kim
                            @break
                        @if($donHang->hinh_thuc_thanh_toan != 'cash')
                            @if($donHang->payment_type == 1)
                                (thanh toán trực tiếp)
                            @elseif($donHang->payment_type == 2)
                                (thanh toán tạm giữ)
                            @endif
                        @endif
                    @endswitch

                </div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Ghi chú:</label>
                <div class="static-input">{{ $donHang->ghi_chu }}</div>
            </div>

            @if($donHang->tinh_trang > 0)
                <div class="inline field">
                    <label class="label-fixed">Tình trạng giao hàng:</label>
                    <div class="static-input">
                        @if($donHang->tinh_trang == 1)
                            <i class="wait teal open fitted icon"></i>
                            <span style="color: teal">
                                <b>Đang vận chuyển</b>
                            </span>
                        @else
                            <i class="check green open fitted icon"></i>
                            <span style="color: green">
                                <b>Đã giao hàng</b>
                            </span>
                        @endif
                        <a class="ui small blue label need-popup" href="{{ route('don_hang.edit', [$donHang->id]) }}"
                           data-content="Thay đổi trạng thái giao hàng"
                           onclick="return confirm('Xác nhận cập nhật trạng thái giao hàng?')">
                            Cập nhật
                        </a>
                    </div>
                </div>
            @endif

            @if($donHang->hinh_thuc_thanh_toan != 'cash')
                <div class="inline field">
                    <label class="label-fixed">Mã giao dịch:</label>
                    <div class="static-input">{{ $donHang->payment_id }}</div>
                </div>
            @endif
        </div>

        {{--<div class="inline field">--}}
        {{--<a href="#" class="ui large teal label">Duyệt</a>--}}
        {{--<a href="#" class="ui large orange label">Hủy</a>--}}
        {{--</div>--}}
    </div>
</form>