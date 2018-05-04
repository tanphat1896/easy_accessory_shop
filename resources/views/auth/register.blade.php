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
                </div>
                @if ($errors->has('name'))
                    <p class="red-text">
                        {{ $errors->first('name') }}
                    </p>
                @endif

                <div class="inline field required">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <p class="red-text">
                        {{ $errors->first('email') }}
                    </p>
                @endif

                <div class="inline field required">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="inline field required">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                @if ($errors->has('password'))
                    <p class="red-text">
                        {{ $errors->first('password') }}
                    </p>
                @endif

                <div class="inline field required">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
                @if ($errors->has('phone'))
                    <p class="red-text">
                        {{ $errors->first('phone') }}
                    </p>
                @endif

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
