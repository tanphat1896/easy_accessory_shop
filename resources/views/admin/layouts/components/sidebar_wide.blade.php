<div class="ui fixed vertical inverted borderless menu full-height under-navbar"
     style="width: 220px; display: {{ $wideMenu ? '': 'none' }}" 
     id="sidebar-wide">
    <div class="item">
        <a href="/admin"><img class="ui image" src="{{ asset('assets/images/logo.png') }}" alt="Logo"></a>
    </div>

    @php
        $nhanVien = \App\NhanVien::find(\App\Helper\AuthHelper::adminId());
    @endphp

    @if($nhanVien->isAdmin())
        <a href="/admin" class="title item {{ Request::is('admin') ? 'active': '' }}">
            <i class="dashboard icon icon-left"></i>Tổng quan</a>
    @endif



    @if($nhanVien->checkQuyen(1))
        <div class="ui accordion item no-padding">
            <div class="title item menu-item-padding color-white {{ Request::is('*thong_ke*') ? 'active-bar': '' }}">
                <i class="chart bar icon icon-left icon-accordion"></i>
                Thống kê
                <i class="dropdown icon"></i>
            </div>

            <div class="content {{ Request::is('*thong_ke*') ? 'active': '' }}">
                <div class="menu">
                    <a href="{{ route('account') }}" class="title item {{ Request::is('*thu_chi') ? 'active': '' }}">
                        <i class="dollar icon icon-left"></i>Thu chi</a>

                    <a href="{{ route('order') }}" class="title item {{ Request::is('*thong_ke/don_hang') ? 'active': '' }}">
                        <i class="clipboard icon icon-left"></i>Đơn hàng</a>

                    <a class="title item">
                        <i class="warehouse icon icon-left"></i>Tồn kho</a>
                </div>
            </div>
        </div>
    @endif

    @if($nhanVien->checkQuyen(2))
        <a class="item {{ Request::is('*/thuong_hieu') ? 'active-bar': '' }}" href="/admin/thuong_hieu">
            <i class="trophy icon icon-left"></i>Thương hiệu</a>
    @endif

    @if($nhanVien->checkQuyen(3))
        <a class="item {{ Request::is('*/loai_sp') ? 'active-bar': '' }}" href="/admin/loai_sp">
            <i class="sitemap icon icon-left"></i>Loại sản phẩm</a>
    @endif

    @if($nhanVien->checkQuyen(4))
        <a class="item {{ Request::is('*san_pham*') ? 'active-bar': '' }}" href="{{ route('san_pham.index') }}">
            <i class="box icon icon-left"></i>Sản phẩm</a>
    @endif

    @if($nhanVien->checkQuyen(5))
        <a class="item {{ Request::is('*/nha_cung_cap') ? 'active-bar': '' }}" href="/admin/nha_cung_cap">
            <i class="building icon icon-left"></i>Nhà cung cấp</a>
    @endif

    @if($nhanVien->checkQuyen(6))
        <a class="item {{Request::is('*/nhap_hang') ? 'active-bar': '' }}" href="/admin/nhap_hang">
            <i class="dolly icon icon-left"></i>Nhập hàng </a>
    @endif

    @if($nhanVien->checkQuyen(7))
        <a class="item {{Request::is('*/admin/don_hang*') ? 'active-bar': '' }}" href="/admin/don_hang">
            <i class="clipboard icon icon-left"></i>Đơn hàng </a>
    @endif

    @if($nhanVien->checkQuyen(8))
        <a class="item {{Request::is('*/khuyen_mai') ? 'active-bar': '' }}" href="/admin/khuyen_mai">
            <i class="certificate icon icon-left"></i>Khuyến mãi </a>
    @endif

    @if($nhanVien->checkQuyen(9))
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

                    <a class="title item {{ Request::is('*info') ? 'active': '' }}"
                       href="{{ route('info.index') }}">
                        <i class="info icon icon-left"></i>
                        Thông tin cửa hàng</a>

                    <a class="title item {{ Request::is('*menu') ? 'active': '' }}"
                       href="{{ route('menu.index') }}">
                        <i class="list icon icon-left"></i>Menu</a>

                    <a class="title item {{ Request::is('*news*') ? 'active': '' }}"
                       href="{{ route('news.index') }}">
                        <i class="newspaper icon icon-left"></i>Tin tức</a>
                </div>
            </div>
        </div>
    @endif

    @if($nhanVien->isAdmin())
        <a class="item {{Request::is('*/nhan_vien') ? 'active-bar': '' }}" href="/admin/nhan_vien">
            <i class="users icon icon-left"></i>Nhân viên </a>
    @endif

    @if($nhanVien->isAdmin())
        <a class="item {{Request::is('*/cai_dat') ? 'active-bar': '' }}" href="/admin/cai_dat">
            <i class="settings icon icon-left"></i>Cài đặt </a>
    @endif
</div>


