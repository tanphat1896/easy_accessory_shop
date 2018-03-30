{{--<div class="ui inverted no-margin square-border borderless mini menu">--}}
    {{--<a class="right item" href="#">--}}
        {{--<i class="facebook f icon"></i>--}}
        {{--Fanpage--}}
    {{--</a>--}}
{{--</div>--}}

@include ('frontend.layouts.components.modal_auth')

<div class="ui inverted blue square-border no-margin segment clearing">

    <div class="ui basic blue inverted segment left floated no-margin">
        <a class="ui header" href="/">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="Easy accessory shop">
            Easy Accessory
        </a>

    </div>

    <div class="ui basic segment left floated no-margin">
        <div class="ui search computer">
            <div class="ui icon small input">
                <input type="text" class="prompt" placeholder="Nhập từ khóa tìm kiếm">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>

    <div class="ui inverted blue basic segment right floated no-margin">
        <a href="/admin" class="ui white button">Admin page</a>
        <div class="ui white small button" onclick="$('.ui.modal').modal('show')">
            <i class="user icon"></i><strong> Đăng nhập</strong>
        </div>

        <div class="ui white small dropdown button">
            <i class="user icon"></i><strong> Mr. Blabla</strong>
            <div class="menu">
                <div class="item">
                    <i class="history icon"></i>
                    Lịch sử mua hàng
                </div>
            </div>
        </div>

        <a href="cart" class="ui white small button" style="position:relative;">
            <i class="cart icon"></i>
            <strong>Giỏ hàng</strong>
            <span class="ui red mini floating label">
                @if(Session::has('products'))
                    {{ count(Session::get('products')) }}
                @else
                    {{ 0 }}
                @endif
            </span>
        </a>
    </div>
</div>