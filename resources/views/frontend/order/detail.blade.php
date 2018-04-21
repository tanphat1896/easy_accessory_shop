<h3 class="ui header dividing no-margin">
    Đơn hàng: {{ $order->ma_don_hang }}
</h3>
<div class="ui four column padded stackable grid">
    <div class="column no-padding normal-td-margin">
        <strong>Khách hàng:</strong> {{ $order->ten_nguoi_nhan }}
    </div>
    <div class="column no-padding normal-td-margin">
        <strong>Tình trạng:</strong> {!! $order->statusHtml() !!}
    </div>
    <div class="column no-padding normal-td-margin">
        <strong>Số tiền:</strong> {{ \App\Helper\StringHelper::toCurrencyString($order->tong_tien) }}
    </div>
    <div class="column no-padding normal-td-margin">
        <strong>Hình thức thanh toán:</strong> {{ $order->paymentType() }}
    </div>
</div>

@include('frontend.order.order_detail_table')