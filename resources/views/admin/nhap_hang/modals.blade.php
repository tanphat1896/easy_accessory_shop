<div class="ui mini modal" id="modal-them-phieu-nhap">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-ncc">Nhà cung cấp</label>
                <select id="ten-ncc" name="ten-ncc">
                    @foreach($nhaCungCaps as $nhaCungCap)
                        <option value="{{ $nhaCungCap->id }}">
                            {{ $nhaCungCap->ten_ncc }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="dia-chi">Ngày nhập</label>
                <input type="date" id="ngay-nhap" name="ngay-nhap" required>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>