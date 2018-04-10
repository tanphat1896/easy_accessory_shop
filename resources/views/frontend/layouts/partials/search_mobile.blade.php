
<div class="ui mobile search">
    <div class="ui icon input">
        <input type="text" class="prompt" name="search" placeholder="Nhập từ khóa tìm kiếm" style="">
        <i class="search icon"></i>
    </div>
</div>

@push('script')
    <script>
        $('.ui.mobile.search')
            .search({
                minCharacters: 3,
                apiSettings: {
                    url: '/tim-kiem/{query}',
                    onResponse: function (res) {
                        let response = {
                            results: []
                        };
                        let products = res.products;
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
                }
            })
        ;
    </script>
@endpush