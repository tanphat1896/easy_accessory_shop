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
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="ui basic red label">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="inline field required">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="ui basic red label">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="inline field required">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" oninput="testStrength()">
                </div>
                <div class="inline field required">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    @if ($errors->has('password'))
                        <span class="ui basic red label">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="inline field">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="ui basic red label">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="inline field">
                    <button type="submit" class="ui blue button">
                        <i class="edit icon"></i>
                        <strong>Đăng ký</strong>
                    </button>
                </div>
            </form>
        </div>
@endsection

@push('script')
    <script type="text/javascript">
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

        function testStrength() {
            let pwd = $('#password').text();
        }
    </script>
@endpush
