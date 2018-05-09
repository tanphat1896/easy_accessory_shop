<div class="ui mini modal" id="modal-them-nhan-vien">
    <div class="blue header">Thêm mới nhân viên</div>
    <div class="content">
        <form action="{{ route('nhan_vien.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-nhan-vien">Họ và tên</label>
                <input type="text" id="ten-nhan-vien" name="ten-nhan-vien"
                       value="Nguyễn Thị {{ rand(1, 1000) }}"
                       maxlength="50" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       value="nguyenthi{{ rand(1, 1000) }}@gmail.com"
                       maxlength="100" required>
            </div>

            <div class="field">
                <label for="so-dien-thoai">Số điện thoại</label>
                <input type="text" id="so-dien-thoai" name="so-dien-thoai"
                       value="0132012312"
                       maxlength="11" required>
            </div>

            <div class="field">
                <label for="password">Mật khẩu</label>
                <input type="password" id="pass" name="password" minlength="6" maxlength="32" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <input type="password" id="pass_confirmation" name="password_confirmation"
                       minlength="6" maxlength="32" required>
            </div>

            <div class="field">
                <label for="thong-so">Quyền hạn</label>
                <select name="quyen[]" multiple id="quyen" class="ui search dropdown">
                    @foreach(\App\PhanQuyen::all() as $quyen)
                        <option value="{{ $quyen->id }}">{{ $quyen->ten_quyen }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($nhanViens as $stt => $nhanVien)
    @if($nhanVien->isAdmin())
        @continue
    @endif
    <div class="ui mini vertical flip modal" id="{{ "modal-sua-" . $nhanVien->id }}">
        <div class="blue header">Sửa thông tin nhân viên</div>
        <div class="content">
            <form action="{{ route('nhan_vien.update', [$nhanVien->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label>Tên nhân viên</label>
                    <input type="text" value="{{ $nhanVien->name }}" name="ten-nhan-vien"
                           maxlength="50" required>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="email" value="{{ $nhanVien->email }}" name="email"
                           maxlength="100" required>
                </div>

                <div class="field">
                    <label>Số điện thoại</label>
                    <input type="text" value="{{ $nhanVien->phone }}" name="so-dien-thoai"
                           maxlength="11" required>
                </div>

                @if(!$nhanVien->isAdmin())
                    <div class="field">
                        <label for="thong-so">Quyền hạn</label>
                        <select name="quyen[]" multiple id="quyen" class="ui search dropdown">
                            @foreach(\App\PhanQuyen::all() as $quyen)
                                <option value="{{ $quyen->id }}"
                                        {{ $quyen->matchedIds($nhanVien->quyenHans)
                                            ? 'selected': '' }} >
                                    {{ $quyen->ten_quyen }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

@push('script')
    <script>
        var pass = document.getElementById("pass")
            , confirm_pass = document.getElementById("pass_confirmation");

        function validatePass(){
            if(pass.value != confirm_pass.value) {
                confirm_pass.setCustomValidity("Mật khẩu nhập lại không khớp!");
            } else {
                confirm_pass.setCustomValidity('');
            }
        }

        pass.onchange = validatePass;
        confirm_pass.onkeyup = validatePass;
    </script>
@endpush