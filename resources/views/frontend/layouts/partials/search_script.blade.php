
@push('script')
    <script>
        $('.ui.search')
            .search({
                minCharacters: 3,
                apiSettings: {
                    url: '/tim-kiem/{query}',
                    onResponse: function (res) {
                        return res.type == 'order' ? orderResults(res.orders) : productResults(res.products) ;
                    }
                }
            });

        function orderResults(orders) {
            let response = {
                results: []
            };
            orders.forEach((order) => {
                response.results.push({
                    title:  'Đơn hàng: ' + order.ma_don_hang,
                    image: '{{ asset('assets/images/favicon.png') }}',
                    url: '{{ route('order.show', ['s']) }}?code=' + order.ma_don_hang
                })
            });

            return response;
        }

        function productResults(products) {
            let response = {
                results: []
            };
            products.forEach((product) => {
                let limitChar = 500;
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