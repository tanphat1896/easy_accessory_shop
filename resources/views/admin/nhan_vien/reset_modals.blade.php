@foreach($nhanViens as $stt => $nhanVien)
    <div class="ui mini vertical flip modal" id="{{ "modal-reset-" . $nhanVien->id }}">
        <div class="blue header">Đặt lại mật khẩu</div>
        <div class="content">
            <form action="{{ route('reset_mat_khau', [$nhanVien->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                <div class="field">
                    <label>Mật khẩu mới</label>
                    <input type="password" name="password"
                           minlength="6" maxlength="30" required>
                </div>

                <div class="field">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirmation"
                           minlength="6" maxlength="30" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>OK</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach