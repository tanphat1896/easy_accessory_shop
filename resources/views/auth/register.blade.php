@extends('frontend.layouts.master')

@section('title', 'Đăng ký tài khoản')

@push('style')
    <style>
        #register-form label {
            text-align: left !important;
        }
        @media (min-width: 350px) {
            #register-form label {
                width: 25% !important;
            }
            #register-form input {
                width: 60% !important;
            }
        }
    </style>
@endpush

@section('content')
    <div class="ui text container">
        <div class="ui divider hidden"></div>
            <h2 class="ui dividing header center aligned">
                <i class="edit icon"></i>
                Đăng ký tài khoản
            </h2>

            <form action="{{ route('register') }}" class="ui form center-aligned" id="register-form" method="post">
                {{ csrf_field() }}

                <div class="inline field required">
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" maxlength="50" required>
                </div>

                <div class="inline field required">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        maxlength="100" required>
                </div>
                @if ($errors->has('email'))
                    <span class="inline help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <div class="inline field required">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="passwd" name="password"
                        minlength="6" maxlength="30" required>
                </div>
                <div class="inline field required">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" id="passwd_confirmation" name="password_confirmation"
                        minlength="6" maxlength="30" required>
                </div>

                <div class="inline field required">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                        maxlength="11" required>
                </div>

                <div class="inline field required">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                           maxlength="255" required>
                </div>

                <div class="inline field">
                    <button type="submit" class="ui blue button">
                        <i class="edit icon"></i>
                        <strong>Đăng ký</strong>
                    </button>
                </div>

                <div class="ui divider hidden">
            </form>
        </div>
@endsection

@push('script')
    <script>
        var passwd = document.getElementById("passwd")
            , confirm_passwd = document.getElementById("passwd_confirmation");

        function validatePasswd(){
            if(passwd.value != confirm_passwd.value) {
                confirm_passwd.setCustomValidity("Mật khẩu nhập lại không khớp!");
            } else {
                confirm_passwd.setCustomValidity('');
            }
        }

        passwd.onchange = validatePasswd;
        confirm_passwd.onkeyup = validatePasswd;
    </script>
@endpush