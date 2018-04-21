<div class="ui segment">
    <h4 class="ui header">Số lượng sản phẩm theo loại</h4>
    <div class="holder">
        <canvas id="product-ptype-chart"></canvas>
    </div>
</div>

@push('script')
    <script>
        let ptypeProducts = JSON.parse('{!! $ptypeProducts !!}');
        buildChart('product-ptype-chart', 'doughnut', ptypeProducts, 'ten_loai');
    </script>
@endpush