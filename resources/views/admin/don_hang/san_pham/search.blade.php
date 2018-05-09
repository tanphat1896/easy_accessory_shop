<form method="get" class="ui tiny form no-margin" action="{{ route('don_hang.index') }}">

    <div class="field">
        <div class="ui input right labeled">
            @if (Request::has('key-word'))
                <i class="remove-input remove red icon pointer"
                   onclick="redirectTo('{{ route('don_hang.index') }}')"></i>
            @endif
            <input type="text" class="need-remove inline" id="search-product" name="key-word" placeholder="Tìm kiếm"
                   value="{{ Request::get('key-word') }}">

            <button class="ui blue label ">
                <i class="search fitted icon"></i></button>
        </div>
    </div>
</form>