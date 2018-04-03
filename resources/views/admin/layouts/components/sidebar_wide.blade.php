<div class="ui fixed vertical inverted borderless menu full-height under-navbar"
     style="width: 220px; display: {{ $wideMenu ? '': 'none' }}" 
     id="sidebar-wide">
    <div class="item">
        <a href="/admin"><img class="ui image" src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
    </div>
    <div class="ui accordion item no-padding">
        <div class="title item menu-item-padding color-white {{ Request::is('admin') ? 'active-bar': '' }}">
            <i class="dashboard icon icon-left icon-accordion"></i>
            Dashboard
            <i class="dropdown icon"></i>
        </div>
        <div class="content {{ Request::is('admin') ? 'active': '' }}">
            <div class="menu">
                <a class="title item {{ Request::is('admin') ? 'active': '' }}">
                    <i class="globe icon icon-left"></i>Tổng quan</a>
                <a class="title item">
                    <i class="dollar sign icon icon-left"></i>Doanh thu</a>
                <a class="title item">
                    <i class="warehouse icon icon-left"></i>Tồn kho</a>
            </div>
        </div>
    </div>

    <a class="item {{ Request::is('*san_pham*') ? 'active-bar': '' }}" href="{{ route('san_pham.index') }}">
        <i class="box icon icon-left"></i>Sản phẩm</a>

    <a class="item {{ Request::is('*/thuong_hieu') ? 'active-bar': '' }}" href="/admin/thuong_hieu">
        <i class="trophy icon icon-left"></i>Thương hiệu</a>

    <a class="item {{ Request::is('*/loai_sp') ? 'active-bar': '' }}" href="/admin/loai_sp">
        <i class="sitemap icon icon-left"></i>Loại sản phẩm</a>

    <a class="item {{ Request::is('*/nha_cung_cap') ? 'active-bar': '' }}" href="/admin/nha_cung_cap">
        <i class="building icon icon-left"></i>Nhà cung cấp</a>

    <a class="item {{Request::is('*/nhap_hang') ? 'active-bar': '' }}" href="/admin/nhap_hang">
        <i class="dolly icon icon-left"></i>Nhập hàng </a>

    <div class="item"><i class="clipboard list icon icon-left"></i>Đơn hàng </div>

    <div class="item"><i class="certificate icon icon-left"></i>Khuyến mãi </div>

    <div class="ui accordion item no-padding">
        <div class="title item menu-item-padding color-white {{ Request::is('*noi_dung*') ? 'active-bar': ''}}">
            <i class="newspaper icon icon-left icon-accordion"></i>
            Nội dung website
            <i class="dropdown icon"></i>
        </div>

        <div class="content {{ Request::is('*noi_dung*') ? 'active': ''}}">
            <div class="menu">
                <a  class="title item {{ Request::is('*slider') ? 'active': '' }}" 
                    href="{{ route('slider.index') }}">
                    <i class="certificate icon icon-left"></i>Slide quảng cáo</a>

                <a class="title item"><i class="info icon icon-left"></i>Thông tin cửa hàng</a>

                <a class="title item {{ Request::is('*menu') ? 'active': '' }}"
                   href="{{ route('menu.index') }}">
                    <i class="list icon icon-left"></i>Menu</a>

                <a class="title item"><i class="newspaper icon icon-left"></i>Tin tức</a>
            </div>
        </div>
    </div>
</div>


