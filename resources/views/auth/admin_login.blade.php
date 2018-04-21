<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('smui/semanticoff.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style type="text/css">
        .column {
            max-width: 450px;
        }

        body{
            background-color: #f5f8fa;
        }

        .grid {
            height: 100%;
        }
    </style>
</head>

<body>
<div class="ui middle aligned center aligned padded grid">
    <div class="column">
        <h2 class="ui image header">
            <i class="users icon"></i>
            <span class="content">Đăng nhập hệ thống</span>
        </h2>
        <div class="ui blue raised segment">
            <form class="ui form" action="{{ route('admin.login.submit') }}" method="post">
                {{ csrf_field() }}
                <div class="fluid field {{ $errors->has('email') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <input type="text" name="email" placeholder="Tài khoản" value="blabla@gmail.com">
                        <i class="user icon"></i>
                    </div>

                    @if ($errors->has('email'))
                    <span class="red-text">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
                <div class="fluid field {{ $errors->has('password') ? 'error' : '' }}">
                    <div class="ui left icon input">
                        <input type="password" name="password" placeholder="Mật khẩu" value="111111">
                        <i class="lock icon"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="red-text">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Đăng nhập</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>


{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">ADMIN Login</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

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