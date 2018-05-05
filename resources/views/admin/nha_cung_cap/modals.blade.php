<div class="ui mini modal" id="modal-them-nha-cung-cap">
    <div class="blue header">Thêm mới nhà cung cấp</div>
    <div class="content">
        <form action="{{ route('nha_cung_cap.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-ncc">Tên nhà cung cấp</label>
                <input type="text" id="ten-ncc" name="ten-ncc" maxlength="50" required>
            </div>

            <div class="field">
                <label for="dia-chi">Địa chỉ</label>
                <input type="text" id="dia-chi" name="dia-chi" maxlength="255" required>
            </div>

            <div class="field">
                <label for="so-dien-thoai">Số điện thoại</label>
                <input type="text" id="so-dien-thoai" name="so-dien-thoai" maxlength="11" required>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($nhaCungCaps as $stt => $nhaCungCap)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $nhaCungCap->id }}">
        <div class="blue header">Sửa tên loại sản phẩm</div>
        <div class="content">
            <form action="{{ route('nha_cung_cap.update', [$nhaCungCap->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label>Tên nhà cung cấp</label>
                    <input type="text" value="{{ $nhaCungCap->ten_ncc }}" name="ten-ncc" maxlength="50" required>
                </div>

                <div class="field">
                    <label>Địa chỉ</label>
                    <input type="text" value="{{ $nhaCungCap->dia_chi }}" name="dia-chi" maxlength="255" required>
                </div>

                <div class="field">
                    <label>Số điện thoại</label>
                    <input type="text" value="{{ $nhaCungCap->so_dien_thoai }}" name="so-dien-thoai"
                           maxlength="11" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach