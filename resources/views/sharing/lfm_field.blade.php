<div class="field">
    <label>{{ $label }}</label>
    <div class="ui input labeled">
        <a class="ui label" id="lfm" data-input="thumbnail" data-preview="holder" >Chọn file</a>
        <input id="thumbnail" type="text" name="filepath" required value="{{ $thumb }}">
    </div>

    @if($needThumb)
        <img src="{{ $thumb }}" id="holder" style="margin-top:5px;max-height:100px;" class="ui border image">
    @endif
</div>

@push('script')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script>$('#lfm').filemanager('image', {prefix: '/fm'});</script>
@endpush