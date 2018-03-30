<a class="ui green small button normal-td-margin" id="sp-filter">
    <i class="filter icon"></i>Bộ lọc</a>

@if($filtered)
    @foreach($filterData as $datum)
        <span class="ui teal label">{{ $datum->getName() }}</span>
    @endforeach

    <a class="ui red label" href="{{ route('san_pham.index') }}">Xóa lọc</a>
@endif


{{--form filter--}}

<div class="ui flowing popup bottom left transition hidden">
    <form method="get" class="ui small form">

        <div class="field">
            <label for="">Loại sản phẩm</label>
            <select name="lsp" class="ui search dropdown no-margin-left">
                <option value="all">Tất cả</option>

                @foreach($loaiSanPhams as $loaiSanPham)
                    <option value="{{ $loaiSanPham->id }}"
                            {{ !empty($filterData["lsp"]->id)
                                && $filterData["lsp"]->id == $loaiSanPham->id
                                ? 'selected': '' }}>

                        {{ $loaiSanPham->ten_loai }}</option>
                @endforeach

            </select>
        </div>

        <div class="field">
            <label for="">Thương thiệu</label>
            <select name="th" class="ui search dropdown no-margin-left">
                <option value="all">Tất cả</option>

                @foreach($thuongHieus as $thuongHieu)
                    <option value="{{ $thuongHieu->id }}"
                        {{ !empty($filterData["th"])
                            && $filterData["th"]->id === $thuongHieu->id
                            ? 'selected': '' }}>

                        {{ $thuongHieu->ten_thuong_hieu }}</option>
                @endforeach

            </select>
        </div>

        <div class="field">
            <button class="ui fluid green button">Lọc</button>
        </div>
    </form>
</div>
