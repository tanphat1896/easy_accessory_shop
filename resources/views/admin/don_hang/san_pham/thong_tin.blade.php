<div class="ui bottom attached tab segment active" data-tab="first">
    <form action="" class="ui form static">
        <div class="ui two column padded divided grid">
            <div class=" column">
                <div class="inline field">
                    <label class="label-fixed">Mã đơn hàng:</label>
                    <div class="static-input">{{ $donHang->ma_don_hang }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Tên người nhận:</label>
                    <div class="static-input">{{ $donHang->ten_nguoi_nhan }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Email người nhận:</label>
                    <div class="static-input">{{ $donHang->email_nguoi_nhan }}</div>
                </div>
            </div>

            <div class=" column">
                <div class="inline field">
                    <label class="label-fixed">Số điện thoại người nhận:</label>
                    <div class="static-input">{{ $donHang->sdt_nguoi_nhan }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Ngày đặt hàng:</label>
                    <div class="static-input">{{ $donHang->formatDate('ngay_dat_hang') }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Hình thức thanh toán:</label>
                    <div class="static-input">{{ $donHang->hinh_thuc_thanh_toan }}</div>
                </div>
            </div>

            {{--<div class="inline field">--}}
                {{--<a href="#" class="ui large teal label">Duyệt</a>--}}
                {{--<a href="#" class="ui large orange label">Hủy</a>--}}
            {{--</div>--}}
        </div>
    </form>
</div>