<div class="ui mini modal" id="modal-filter-don-hang">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="{{ route('don_hang.index') }}" class="ui form" method="get">

            <div class="field">
                <label for="">Tình trạng đơn hàng</label>
                <select name="tinh-trang" class="ui dropdown no-margin-left" id="tinh-trang">
                    <option value="-1">Tất cả</option>

                    <option value="0">Chưa duyệt</option>
                    <option value="1">Đang vận chuyển</option>
                    <option value="2">Đã giao hàng</option>
                    <option value="3">Đã hủy</option>

                </select>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>