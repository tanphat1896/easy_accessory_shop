<div class="ui bottom attached tab segment" data-tab="second">
    {!! $sanPham->mo_ta !!}
</div>

@push('script')
    <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description-editor');
    </script>
@endpush