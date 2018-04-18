
<div class="ui mobile search">
    <div class="ui icon input">
        <input type="text" class="prompt" name="search" placeholder="Nhập từ khóa tìm kiếm" style="">
        <i class="search icon"></i>
    </div>
</div>
@include('frontend.layouts.partials.search_script')

@push('script')
    <script>
        function productResultsz(products) {
            let response = {
                results: []
            };
            products.forEach((product) => {
                let limitChar = 17;
                let title = product.ten_san_pham.length > limitChar
                    ? product.ten_san_pham.substring(0, limitChar) + "..."
                    : product.ten_san_pham;
                response.results.push({
                    title:  title,
                    price: toCurrency(product.gia) + "đ",
                    url: '/chi-tiet/' + product.slug,
                    image: '/' + product.anh_dai_dien
                })
            });

            return response;
        }
    </script>
@endpush