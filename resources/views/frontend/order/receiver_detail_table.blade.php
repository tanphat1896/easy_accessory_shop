<div class="ui basic segment no-padding table-responsive">
    <table class="ui very basic table unstackable">
        <thead>
        <tr><th class="blue-text">Thông tin người nhận</th><th class="blue-text">Thông tin đơn hàng</th></tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Họ tên: </strong> {{ $order->ten_nguoi_nhan }}</td>
            <td><strong>Hình thức thanh toán</strong> {{ $order->paymentType() }}</td>
        </tr>
        <tr>
            <td><strong>Email: </strong> {{ $order->email_nguoi_nhan }}</td>
            <td><strong>Tổng số tiền:
                    <span class="red-text">{{ \App\Helper\StringHelper::toCurrencyString($order->tong_tien) }}</span>
                </strong>
            </td>
        </tr>
        <tr>
            <td><strong>SĐT: </strong> {{ $order->sdt_nguoi_nhan }}</td>
            <td><strong>Tình trạng: </strong> {!! $order->statusHtml() !!}</td>
        </tr>
        <tr>
            <td><strong>Địa chỉ nhận hàng: </strong> {{ $order->dia_chi }}</td>
            <td><strong></strong></td>
        </tr>
        </tbody>
    </table>
</div>