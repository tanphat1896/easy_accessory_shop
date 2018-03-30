<div class="ui bottom attached tab segment active" data-tab="first">

    <form action="{{ route('san_pham.update', [$sanPham->id]) }}" method="post" enctype="multipart/form-data"
          class="ui form static" id="form-thong-tin-san-pham">

        {{ csrf_field() }}

        {{ method_field('PUT') }}

        <div class="ui padded stackable grid">

            <div class="ten wide column">
                <div class="inline field">
                    <label for="" class="label-fixed">Mã sản phẩm</label>
                    <input type="text" name="ma-san-pham" value="{{ $sanPham->ma_san_pham }}">
                </div>

                <div class="inline field">
                    <label class="label-fixed">Tên sản phẩm</label>
                    <input type="text" name="ten-san-pham" value="{{ $sanPham->getName() }}">
                </div>

                <div class="inline field">
                    <label class="label-fixed">Loại sản phẩm</label>
                    <select name="loai-san-pham" class="ui search dropdown">
                        @foreach($loaiSanPhams as $loaiSanPham)
                            <option value="{{ $loaiSanPham->id }}"
                                    {{ $loaiSanPham->matchedId($sanPham->loai_san_pham_id) ? 'selected': '' }}>
                                {{ $loaiSanPham->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Thương hiệu</label>
                    <select name="thuong-hieu" class="ui search dropdown">
                        @foreach($thuongHieus as $thuongHieu)
                            <option value="{{ $thuongHieu->id }}"
                                {{ $thuongHieu->matchedId($sanPham->thuong_hieu_id) ? 'selected': '' }}>
                                {{ $thuongHieu->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Giá</label>
                    <input type="text" name="gia" value="{{ number_format($sanPham->giaMoiNhat()) }}">
                </div>

                <div class="inline field">
                    <label class="label-fixed">Tình trạng</label>
                    <select name="tinh-trang" class="ui dropdown">
                        <option value="1" {{ $sanPham->tinh_trang > 0 ? 'selected': '' }}>
                            Đang kinh doanh
                        </option>
                        <option value="0"{{ $sanPham->tinh_trang < 1 ? 'selected': '' }}>
                            Ngừng kinh doanh
                        </option>
                    </select>
                </div>
            </div>

            <div class="six wide column">
                <div class="field">
                    <label>Ảnh đại diện</label>
                    <label for="anh-dai-dien">
                        <span class="ui blue compact label">Chọn file</span>
                        <span id="anh-dai-dien-name"></span>
                    </label>
                    <input type="file" name="anh-dai-dien" id="anh-dai-dien" style="display: none;"
                        onchange="$('#anh-dai-dien-name').text($('#anh-dai-dien')[0].files[0].name)">
                    <img src="/{{ $sanPham->anh_dai_dien }}" class="ui small bordered image">
                </div>
            </div>

            <div class="row">
                <div class="sixteen wide column">
                    <button class="ui blue button" type="submit">
                        <i class="save fitted icon"></i>
                        Lưu lại thay đổi
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>