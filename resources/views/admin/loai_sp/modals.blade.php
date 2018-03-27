<div class="ui mini vertical flip modal" id="modal-them-loai-sp">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới loại sản phẩm</div>
    <div class="content">
        <form action="{{ route('loai_sp.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-loai">Tên loại sản phẩm</label>
                <input type="text" id="ten-loai" name="ten-loai" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($loaiSanPhams as $stt => $loaiSanPham)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $loaiSanPham->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa tên loại sản phẩm</div>
        <div class="content">
            <form action="{{ route('loai_sp.update', [$loaiSanPham->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="">Tên loại sản phẩm</label>
                    <input type="text" value="{{ $loaiSanPham->ten_loai }}" name="ten-loai" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach