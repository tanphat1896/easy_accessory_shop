<a class="ui green small button normal-td-margin" id="sp-filter">
    <i class="filter icon"></i>Bộ lọc</a>

@if(!empty($criteria))
    @foreach($criteria as $key => $criterion)
        @if ($key == 't')
            @foreach($criterion as $each)
                <span class="ui violet label">{{ $each['text'] }}</span>
            @endforeach
            @continue
        @endif
        <span class="ui violet label">{{ $criterion['text'] }}</span>
    @endforeach

    <a class="ui red label" href="{{ route('san_pham.index') }}"><i class="remove icon fitted"></i></a>
@endif


{{--form filter--}}
<div class="ui flowing popup bottom left transition hidden">
    <form method="get" class="ui small form" onsubmit="filtering(event)">

        <div class="field">
            <label for="">Loại sản phẩm</label>
            <select name="pt" class="ui search dropdown no-margin-left" id="pt">
                <option value="all">Tất cả</option>

                @foreach($loaiSanPhams as $loaiSanPham)
                    <option value="{{ $loaiSanPham->id }}">
                        {{ $loaiSanPham->ten_loai }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="field">
            <label for="">Thương thiệu</label>
            <select name="t" class="ui search dropdown no-margin-left" multiple id="t">
                @foreach($thuongHieus as $thuongHieu)
                    <option value="{{ $thuongHieu->slug }}">
                        {{ $thuongHieu->ten_thuong_hieu }}</option>
                @endforeach

            </select>
        </div>

        <div class="field">
            <button class="ui fluid green label pointer">Lọc</button>
        </div>
    </form>
</div>

<script>
    let url = window.location.href;
    url = url.replace(/\?.*/, '');
    function filtering(e) {
        e.preventDefault();
        let productTypeId = document.getElementById('pt').value;
        let query = "pt=" + productTypeId;

        let brandSlugs = document.querySelectorAll('#t option:checked');
        let brandSlugChain = '';
        brandSlugs = [...brandSlugs];
        brandSlugs.forEach((brandSlug) => brandSlugChain += brandSlug.value + ";");
        if (brandSlugChain.trim() !== '')
            query += "&t=" + brandSlugChain;

        window.location.href = url + "?" + query;
    }
</script>
