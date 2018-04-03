<div class="ui fixed vertical inverted icon borderless menu under-navbar hidden"
     style="width: 50px; height: 100%;  display: {{ $wideMenu ? 'none': '' }}"
     id="sidebar-thin">

    <div class="item normal-padding">
        <img class="ui small image" src="{{ asset('assets/images/thumb.png') }}" alt="Logo">
    </div>

    <div class="ui item left pointing dropdown {{ Request::is('admin') ? 'active-bar': '' }}">
        <i class="dashboard icon"></i>
        <div class="menu">
            <div class="header">Dashboard</div>
            <a class="item {{ Request::is('admin') ? 'active': '' }}">
                <i class="globe icon icon-left"></i>Tổng quan</a>
            <a class="item">
                <i class="dollar sign icon icon-left"></i>Doanh thu</a>
            <a class="item">
                <i class="warehouse icon icon-left"></i>Tồn kho</a>
        </div>
    </div>

    <a class="item {{ Request::is('*san_pham*') ? 'active-bar': '' }}" href="{{ route('san_pham.index') }}">
        <i class="box icon icon-left"></i></a>

    <a class="item {{ Request::is('*/thuong_hieu') ? 'active-bar': '' }}" href="/admin/thuong_hieu">
        <i class="trophy icon icon-left"></i></a>

    <a class="item {{ Request::is('*/loai_sp') ? 'active-bar': '' }}" href="/admin/loai_sp">
        <i class="sitemap icon icon-left"></i></a>

    <a class="item {{ Request::is('*/nha_cung_cap') ? 'active-bar': '' }}" href="/admin/nha_cung_cap">
        <i class="building icon icon-left"></i></a>

    <a class="item {{Request::is('*/nhap_hang') ? 'active-bar': '' }}" href="/admin/nhap_hang">
        <i class="dolly icon icon-left"></i></a>

    <div class="item"><i class="clipboard list icon icon-left"></i></div>

    <div class="item"><i class="certificate icon icon-left"></i></div>

    <div class="ui item  left pointing dropdown {{ Request::is('*slider') ? 'active-bar': '' }}">
        <i class="newspaper icon"></i>
        <div class="inverted menu">
            <div class="header">Quản lý nội dung</div>
            <a class="item {{ Request::is('*slider') ? 'active': '' }}"
               href="{{ route('slider.index') }}">
                <i class="certificate icon"></i>
                Slide quảng cáo
            </a>

            <a class="item"><i class="info icon"></i>Thông tin cửa hàng</a>

            <a class="item {{ Request::is('*menu') ? 'active': '' }}"
               href="{{ route('menu.index') }}">
                <i class="list icon icon-left"></i>Menu</a>

            <a class="item"><i class="newspaper icon"></i>Tin tức</a>
        </div>
    </div>

    <div class="item item-padded"></div>
</div>
