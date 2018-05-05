<div class="ui mini vertical flip modal" id="modal-change-password">
    <div class="blue header">Đổi mật khẩu</div>
    <div class="content">
        <form action="{{ route('change_mat_khau', [\App\Helper\AuthHelper::adminId()]) }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label>Mật khẩu cũ</label>
                <input type="password" name="oldPassword" minlength="6" maxlength="30" required>
            </div>

            <div class="field">
                <label>Mật khẩu mới</label>
                <input type="password" name="password" id="password" minlength="6" maxlength="30" required>
            </div>

            <div class="field">
                <label>Nhập lại mật khẩu</label>
                <input type="password" id="password_confirmation" minlength="6" maxlength="30" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("password_confirmation");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Mật khẩu nhập lại không khớp!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endpush