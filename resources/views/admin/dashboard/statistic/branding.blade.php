<div class="ui segment">
    <h4 class="ui header">Số lượng sản phẩm theo thương hiệu</h4>
    <div class="holder">
        <canvas id="product-branding-chart"></canvas>
    </div>
</div>

@push('script')
    <script>
        let brandingProducts = JSON.parse('{!! $brandingProducts !!}');
        buildChart('product-branding-chart', 'doughnut', brandingProducts, 'ten_thuong_hieu');
    </script>
@endpush