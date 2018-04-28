<h3 class="ui header dividing no-margin">
    Đơn hàng: {{ $order->ma_don_hang }}
    <a href="{{ route('customer.history') }}" class="ui blue label">Lịch sử</a>
</h3>
{{--<div class="ui four column padded stackable divided grid">--}}
    {{--<div class="column">--}}
        {{--<strong>Khách hàng:</strong> {{ $order->ten_nguoi_nhan }}--}}
    {{--</div>--}}
    {{--<div class="column">--}}
        {{--<strong>Tình trạng:</strong> {!! $order->statusHtml() !!}--}}
    {{--</div>--}}
    {{--<div class="column">--}}
        {{--<strong>Số tiền:</strong> {{ \App\Helper\StringHelper::toCurrencyString($order->tong_tien) }}--}}
    {{--</div>--}}
    {{--<div class="column">--}}
        {{--<strong>Hình thức thanh toán:</strong> {{ $order->paymentType() }}--}}
    {{--</div>--}}
{{--</div>--}}

@include('frontend.order.receiver_detail_table')

<h5 class="blue-text">Danh sách sản phẩm</h5>
@include('frontend.order.order_detail_table')