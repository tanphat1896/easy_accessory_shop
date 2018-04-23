<div class="ui segment">
    <h4 class="ui header">Tình trạng đơn hàng</h4>
    <div class="holder">
        <canvas id="order-chart"></canvas>
    </div>
</div>

@push('script')
    <script>
        let orders = JSON.parse('{!! $orders !!}');
        let orderColors = ['#FFA2A2', '#C3F66D','#6DBBF6'];
        buildChart('order-chart', 'pie', orders, 'tinh_trang', orderColors);
    </script>
@endpush