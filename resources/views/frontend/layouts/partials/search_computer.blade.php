<div class="ui basic segment left floated no-margin">
    <div class="ui search computer">
        <div class="ui icon small input">
            <input type="text" class="prompt" placeholder="Nhập từ khóa tìm kiếm, ít nhất 3 ký tự ">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>
</div>


@push('script')
    <script>
        $('.ui.search.computer')
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
                            let limitChar = 30;
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