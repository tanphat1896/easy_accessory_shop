<div class="ui fixed borderless menu" style="height: 50px;">
    @if($wideMenu)
        <a class="item header" id="logo" href='/admin'>
            {{-- <img class="ui small image" src="{{ asset('assets/images/logo.png') }}" alt="Logo"> --}}
        </a>

        <a class="icon item" id="btn-toggle-menu">
            <i class="double angle left icon"></i>
        </a>
    @else
        <a class="item header" id="logo" href="/admin" style="width: 50px">
            {{-- <img class="ui small image" src="{{ asset('assets/images/logo.png') }}" alt="Logo"> --}}
        </a>    

        <a class="icon item" id="btn-toggle-menu">
            <i class="double angle right icon"></i>
        </a>
    @endif

    <a href="/" class="icon item need-popup" target="_blank" 
        data-content="Trang khách hàng" 
        data-position="bottom left">
        <i class="home icon"></i></a>

    <div class="right menu">

        @include('admin.layouts.components.navbar_comment')

        @include('admin.layouts.components.navbar_notification')

        @include('admin.layouts.components.navbar_admin')


    </div>
</div>