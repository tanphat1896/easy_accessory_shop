<div class="ui mini vertical flip modal" id="modal-edit-info">
    <div class="blue header">Chỉnh sửa thông tin</div>
    <div class="content">
        <form action="{{ route('cap_nhat_thong_tin', [\App\Helper\AuthHelper::adminId()]) }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label>Tên nhân viên</label>
                <input type="text" value="{{ \App\Helper\AuthHelper::adminName() }}" name="ten-nhan-vien"
                       maxlength="50" required>
            </div>

            <div class="field">
                <label>Số điện thoại</label>
                <input type="text" value="{{ \App\Helper\AuthHelper::adminPhone() }}" name="so-dien-thoai"
                       maxlength="11" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>