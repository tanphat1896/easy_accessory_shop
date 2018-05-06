<div class="ui bottom attached tab segment active" data-tab="first">
    <form action="" class="ui form static">
        <div class="ui padded grid">
            <div class="ten wide column">

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
                        <a class="ui label"
                           onclick="$('#lich-su-gia').modal('show');">Lịch sử</a>

                        <a href="#" class="ui blue label"
                           onclick="$('#cap-nhat-gia').modal('show');">Cập nhật</a>
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

                @include('admin.san_pham.show.thong_so')
            </div>


            <div class="six wide column">

                <div class="inline field">
                    <label for="">Điểm đánh giá trung bình: {{ $sanPham->diem_danh_gia }} sao</label>
                    @component('sharing.components.star')
                        {{ $sanPham->diem_danh_gia }}
                    @endcomponent
                </div>

                <div class="field">
                    <label for="">Ảnh đại diện</label>
                    <img src="/{{ $sanPham->anh_dai_dien }}" class="ui bordered small image">
                </div>

                <div class="field">
                    <label for="">Ảnh chi tiết</label>
                    <div class="ui tiny bordered images">
                        @foreach($sanPham->hinhAnhs as $anh)
                            <img src="/{{ $anh->lien_ket }}" class="ui image">
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

@include('admin.san_pham.show.modals')