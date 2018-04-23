<textarea name="description" id="ckeditor" cols="30" rows="10">{{
    empty($content) ? '' : $content
}}</textarea>

@push('script')
    <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
    <script>
        let prefix = 'fm';
        let options = {
            filebrowserImageBrowseUrl: `/${prefix}?type=Images`,
            filebrowserImageUploadUrl: `/${prefix}/upload?type=Images&_token=`,
            filebrowserBrowseUrl: `/${prefix}?type=Files`,
            filebrowserUploadUrl: `/${prefix}/upload?type=Files&_token=`
        };
        CKEDITOR.config.height = 400;
        CKEDITOR.replace('ckeditor', options);
    </script>
@endpush