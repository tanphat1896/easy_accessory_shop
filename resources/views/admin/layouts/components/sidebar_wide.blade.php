<div class="ui accordion item no-padding">
    <div class="title item menu-item-padding color-white active">
        Dashboard
        <i class="dashboard icon"></i>
    </div>
    <div class="content active">
        <div class="menu">
            <a class="title item">Doanh thu</a>
            <a class="title item">Tồn kho</a>
        </div>
    </div>
</div>
<div class="item">Sản phẩm</div>
<a class="item {{ Request::is('*/thuong_hieu') ? 'active': '' }}" href="/admin/thuong_hieu">Thương hiệu</a>
<a class="item {{ Request::is('*/loai_sp') ? 'active': '' }}" href="/admin/loai_sp">Loại sản phẩm</a>
<a class="item {{ Request::is('*/nha_cung_cap') ? 'active': '' }}" href="/admin/nha_cung_cap">Nhà cung cấp</a>
<div class="item">Nhập hàng</div>
<div class="item">Đơn hàng <i class="tasks icon"></i></div>
<div class="item">Khuyến mãi</div>
<div class="item">Nội dung website</div>

<script>
    $(function(){
        $('.ui.accordion').accordion();
    });
</script>
