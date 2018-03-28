@push('style')
    <style>
        #form-thong-tin-san-pham .label-fixed {
            width: 200px !important;
            /*text-align: left !important;*/
        }

        #form-thong-tin-san-pham input,
        .ui.form .inline.field>.selection.dropdown,
        .ui.form .inline.fields .field>.selection.dropdown {
            width: calc(100% - 250px) !important;
        }

        .static-input {
            display: inline-block;
            padding: 0.67em 0em;
        }
    </style>
@endpush
<div class="ui bottom attached tab segment active" data-tab="first">

    <form action="" class="ui form" id="form-thong-tin-san-pham">
        <div class="ui padded grid">
            <div class="ten wide column">
                <div class="inline field">
                    <label for="" class="label-fixed">Mã sản phẩm</label>
                    <input type="text" value="{{ $sanPham->ma_san_pham }}">
                </div>
                <div class="inline field">
                    <label class="label-fixed">Tên sản phẩm</label>
                    <input type="text" value="{{ $sanPham->getName() }}">
                </div>
                <div class="inline field">
                    <label class="label-fixed">Loại sản phẩm</label>
                    <select name="loai-san-pham"  class="ui dropdown">
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
                    <select name="thuong-hieu" class="ui dropdown">
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
                    <div class="static-input"><strong>{{ number_format($sanPham->giaMoiNhat()) }} đ</strong>
                        <a href="#" class="ui blue label">Lịch sử</a>
                    </div>
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
                <div class="inline field">
                    <label class="label-fixed">Ngày thêm</label>
                    <div class="static-input">{{ $sanPham->ngay_tao }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Ngày cập nhật</label>
                    <div class="static-input">{{ $sanPham->ngay_cap_nhat }}</div>
                </div>
            </div>


            <div class="six wide column">
                <div class="field">
                    <label for="">Ảnh hiển thị</label>
                    <img src="/{{ $sanPham->anh_dai_dien }}" class="ui bordered image">
                </div>

                <div class="inline field">
                    <label for="">Điểm đánh giá trung bình: {{ $sanPham->diem_danh_gia }} sao</label>
                    @component('frontend.product_category.components.star')
                        {{ $sanPham->diem_danh_gia }}
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div class="sixteen wide column">
                    <button class="ui blue button">
                        <i class="save icon"></i>
                        Lưu lại thông tin
                    </button>
                </div>
            </div>
        </div>


    </form>
</div>