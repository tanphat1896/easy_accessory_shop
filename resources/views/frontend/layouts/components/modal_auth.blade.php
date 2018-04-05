<div class="ui mini vertical flip modal middle aligned" id="modal-auth">
    <i class="close icon"></i>
    <div class="ui blue header center-aligned">
        Đăng nhập hệ thống
    </div>
    <div class="content">
        <form action="{{ route('customer.login.submit') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="name">Email/Tài khoản</label>
                <input type="text" name="email" placeholder="Nhập tên tài khoản">
            </div>

            <div class="field">
                <label for="name">Mật khẩu</label>
                <input type="password" name="password" placeholder="Tối thiểu 4 ký tự">
            </div>

            <div class="field center-aligned">
                <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
            </div>

            <div class="field">
                <button class="ui fluid blue button"><strong>Đăng nhập</strong></button>
            </div>

            <div class="field center-aligned">
                Chưa có tài khoản? <a href="{{ route('register') }}"><strong>Đăng ký ngay</strong></a>
            </div>
        </form>
    </div>
</div>

