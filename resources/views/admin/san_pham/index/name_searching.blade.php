<div class="ui small input right labeled">

    @if (Request::has('name'))
        <i class="remove-input remove red icon pointer"
           onclick="redirectTo('{{ route('san_pham.index') }}')"></i>
    @endif

    <input type="text" class="need-remove" id="search-product" placeholder="Tìm kiếm"
           onkeyup="pressEnter(event, searchProduct)" value="{{ Request::get('name') }}">

    <a href="#" class="ui blue label"
       onclick="searchProduct()">
        <i class="search fitted icon"></i></a>

</div>

@push('script')
    <script>
        let productUrl = '{{ route('san_pham.index') }}';

        function searchProduct() {
            finding(productUrl, 'search-product', 'name');
        }
    </script>
@endpush