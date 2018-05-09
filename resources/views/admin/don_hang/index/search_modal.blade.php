<div class="ui mini modal" id="modal-search-don-hang">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="{{ route('don_hang.index') }}" class="ui form" method="get">

            <div class="field">
                <label for="key-word">Ngày nhập</label>
                <input type="text" id="key-word" name="key-word" required>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>