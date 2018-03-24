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
            <form action="{{ route('register') }}" class="ui form center-aligned" id="register-form">
                <div class="inline field required">
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="inline field required">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="inline field required">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" oninput="testStrength()">
                </div>
                <div class="inline field required">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="inline field">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="inline field">
                    <button class="ui blue button">
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

{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-8 col-md-offset-2">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Register</div>--}}

{{--<div class="panel-body">--}}
{{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
{{--<label for="name" class="col-md-4 control-label">Name</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

{{--@if ($errors->has('name'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('name') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
{{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--<label for="password" class="col-md-4 control-label">Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-md-6 col-md-offset-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Register--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
