@if($product->tinh_trang && Auth::guard('customer')->check())
    <div class="normal-td-margin" id="rating">
        Đánh giá của bạn:
        <div class="ui star rating"
              data-max-rating="5"></div>
        <span class="ui tiny blue label pointer" id="btn-save">Lưu</span>
    </div>

    <form action="{{ route('rating.store') }}" method="post" id="form-rating">
        {{ csrf_field() }}
        <input type="hidden" name="star" id="star" value="0">
        <input type="hidden" name="customer-email" value="{{ Auth::guard('customer')->user()->email }}">
        <input type="hidden" name="product-slug" value="{{ $product->slug }}">
    </form>
@endif

@push('script')
    <script>

        let star = '{{ $myStar ? $myStar->diem_danh_gia : 0 }}';
        $('#rating').rating({
            initialRating: star,
            onRate: function(val) {
                $('#star').val(val);
            }
        });
        $(document).on('click', '#btn-save', function() {
            $('#form-rating').submit();
        });
    </script>
@endpush