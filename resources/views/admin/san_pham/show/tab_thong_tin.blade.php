@push('style')
    <style>
        .static .label-fixed {
            width: 200px !important;
            /*text-align: left !important;*/
        }

        .static input,
        .ui.form .inline.field > .selection.dropdown,
        .ui.form .inline.fields .field > .selection.dropdown {
            width: calc(100% - 250px) !important;
        }

        .static-input {
            display: inline-block;
            padding: 0.67em 0;
        }
    </style>
@endpush
<div class="ui bottom attached tab segment active" data-tab="first">
    <form action="" class="ui form static">
        <div class="ui padded grid">
            <div class="ten wide column">

                <div class="inline field">
                    <label for="" class="label-fixed">Mã sản phẩm</label>
                    <div class="static-input">{{ $sanPham->ma_san_pham }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Tên sản phẩm</label>
                    <div class="static-input">{{ $sanPham->getName() }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Loại sản phẩm</label>
                    <div class="static-input">{{ $sanPham->loaiSanPham->getName() }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Thương hiệu</label>
                    <div class="static-input">{{ $sanPham->thuongHieu->getName() }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Giá</label>
                    <div class="static-input"><strong>{{ number_format($sanPham->giaMoiNhat()) }} đ</strong>

                        {{--ăn gian code --}}
                        <a href="#" class="ui blue label"
                           onclick="$('#lich-su-gia').modal('show');"
                        >Lịch sử</a>
                    </div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Tình trạng</label>
                    <div class="static-input">{{ $sanPham->tinhTrang() }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Ngày thêm</label>
                    <div class="static-input">{{ $sanPham->formatDate('ngay_tao') }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Ngày cập nhật</label>
                    <div class="static-input">{{ $sanPham->formatDate('ngay_cap_nhat') }}</div>
                </div>
            </div>


            <div class="six wide column">

                <div class="inline field">
                    <label for="">Điểm đánh giá trung bình: {{ $sanPham->diem_danh_gia }} sao</label>
                    @component('frontend.product_category.components.star')
                        {{ $sanPham->diem_danh_gia }}
                    @endcomponent
                </div>

                <div class="field">
                    <label for="">Ảnh đại diện</label>
                    <img src="/{{ $sanPham->anh_dai_dien }}" class="ui bordered image">
                </div>

                <div class="field">
                    <label for="">Ảnh chi tiết</label>
                    <div class="ui tiny bordered images">
                        <img src="/{{ $sanPham->anh_dai_dien }}" class="ui image">
                        <img src="/{{ $sanPham->anh_dai_dien }}" class="ui image">
                        <img src="/{{ $sanPham->anh_dai_dien }}" class="ui image">
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<div class="ui mini fade modal" id="lich-su-gia">
    <i class="close icon"></i>
    <div class="content">
        <h3 class="ui dividing header">Lịch sử giá</h3>
        <table class="ui very compact striped table">
            <thead><tr><th>Ngày cập nhật</th><th>Giá thành</th></tr></thead>
            <tbody>
            @foreach($sanPham->gia as $gia)
                <tr>
                    <td>{{ $gia->formatDate('ngay_cap_nhat') }}</td>
                    <td><strong>{{ number_format($gia->gia) }} đ</strong></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>