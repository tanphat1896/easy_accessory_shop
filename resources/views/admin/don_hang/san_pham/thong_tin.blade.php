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
                <div class="static-input">{{ $donHang->hinh_thuc_thanh_toan }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Ghi chú:</label>
                <div class="static-input">{{ $donHang->ghi_chu }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Tình trạng giao hàng:</label>
                <div class="static-input">{{ ($donHang->tinh_trang==3)?'Đang vận chuyển':'Đã giao hàng' }}</div>
            </div>

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