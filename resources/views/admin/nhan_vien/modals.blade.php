<div class="ui mini modal" id="modal-them-nhan-vien">
    <div class="blue header">Thêm mới nhân viên</div>
    <div class="content">
        <form action="{{ route('nhan_vien.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-nhan-vien">Họ và tên</label>
                <input type="text" id="ten-nhan-vien" name="ten-nhan-vien" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>

            <div class="field">
                <label for="so-dien-thoai">Số điện thoại</label>
                <input type="text" id="so-dien-thoai" name="so-dien-thoai" required>
            </div>

            <div class="field">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" min="6" max="32" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <input type="password" id="password_confirmation" name="password_confirmation" min="6" max="32" required>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($nhanViens as $stt => $nhanVien)
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $nhanVien->id }}">
        <div class="blue header">Sửa thông tin nhân viên</div>
        <div class="content">
            <form action="{{ route('nhan_vien.update', [$nhanVien->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label>Tên nhân viên</label>
                    <input type="text" value="{{ $nhanVien->name }}" name="ten-nhan-vien" required>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="text" value="{{ $nhanVien->email }}" name="email" required>
                </div>

                <div class="field">
                    <label>Số điện thoại</label>
                    <input type="text" value="{{ $nhanVien->phone }}" name="so-dien-thoai" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
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