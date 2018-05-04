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
        buildChart('order-chart', 'line', orders, 'tinh_trang', orderColors);
{{--        let revenues = JSON.parse('{!! $revenues !!}');--}}
        // let orderColors = ['#FFA2A2', '#C3F66D','#6DBBF6'];
        // buildChart('order-chart', 'line', orders, 'tinh_trang', orderColors);
        // createLineChart('order-chart', revenues);
    </script>
@endpush