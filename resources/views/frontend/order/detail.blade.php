<h3 class="ui header dividing no-margin">
    Đơn hàng: {{ $order->ma_don_hang }}
    <a href="{{ route('customer.history') }}" class="ui blue label">
        <i class="history open fitted icon"></i> Lịch sử
    </a>
    @if(!$order->daHuy())
        <a href="{{ route('customer.huydon', [$order->id]) }}" class="ui orange label"
           onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">
            <i class="trash open fitted icon"></i> Hủy đơn
        </a>
    @endif
</h3>

@include('frontend.order.receiver_detail_table')

<h5 class="blue-text">Danh sách sản phẩm</h5>
@include('frontend.order.order_detail_table')