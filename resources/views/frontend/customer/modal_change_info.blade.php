<div class="ui mini vertical flip modal" id="modal-change-info">
    <div class="blue header">Chỉnh sửa thông tin</div>
    <div class="content">
        <form action="{{ route('customer-change-info', [\App\Helper\AuthHelper::userId()]) }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label>Họ và tên</label>
                <input type="text" value="{{ \App\Helper\AuthHelper::userName() }}" name="customer-name"
                       maxlength="50" required>
            </div>

            <div class="field">
                <label>Số điện thoại</label>
                <input type="text" value="{{ \App\Helper\AuthHelper::userPhone() }}" name="customer-phone"
                       maxlength="11" required>
            </div>

            <div class="field">
                <label>Địa chỉ</label>
                <input type="text" value="{{ \App\Helper\AuthHelper::userAddress() }}" name="customer-address"
                       maxlength="255" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>