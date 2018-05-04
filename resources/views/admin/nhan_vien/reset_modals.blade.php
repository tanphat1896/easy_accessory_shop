@foreach($nhanViens as $stt => $nhanVien)
    <div class="ui mini vertical flip modal" id="{{ "modal-reset-" . $nhanVien->id }}">
        <div class="blue header">Đặt lại mật khẩu</div>
        <div class="content">
            <form action="{{ route('nhan_vien.edit', [$nhanVien->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label>Mật khẩu mới</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>OK</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

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