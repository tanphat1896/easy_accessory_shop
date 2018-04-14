@include ('frontend.layouts.components.modal_auth')

<div class="ui inverted blue square-border no-margin segment clearing">

    <div class="ui basic blue inverted segment left floated no-margin">
        <a class="ui header" href="/">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="Easy accessory shop">
            Easy Accessory
        </a>

    </div>

    @include('frontend.layouts.partials.search_computer')

    <div class="ui inverted blue basic segment right floated no-margin">
        @if (Auth::guard('customer')->check())
            <div class="ui white small dropdown button">
                <i class="user icon"></i><strong>{{ Auth::guard('customer')->user()->name }}</strong>
                <div class="menu">

                    <a class="item" href="{{ route('customer.history') }}">
                        <i class="history icon"></i>
                        Lịch sử mua hàng
                    </a>
                    <a href="#" class="item" onclick="$('#form-logout').submit()">
                        <i class="log out icon"></i>Đăng xuất</a>
                    <form class="force-hidden" method="post" action="{{ route('customer.logout') }}" id="form-logout">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @else
            <div class="ui white small dropdown button">
                <i class="user icon"></i><strong> Tài khoản</strong>
                <div class="menu">
                    <div class="item" onclick="$('#modal-auth').modal('show')">
                        <i class="sign in alternate icon"></i>Đăng nhập
                    </div>

                    <a href="{{ route('register') }}" class="item">
                        <i class="key icon"></i>Đăng ký
                    </a>

                    <a href="{{ route('order.index') }}" class="item">
                        <i class="search icon"></i>Tra cứu đơn hàng</a>
                </div>
            </div>
        @endif

        <a href="{{ route('cart.index') }}" class="ui white small button" style="position:relative;">
            <i class="cart icon"></i>
            <strong>Giỏ hàng</strong>
            <span class="ui red mini floating label">
                {{ \App\Helper\FrontendHelper::totalProductsInCart() }}
            </span>
        </a>
    </div>
</div>