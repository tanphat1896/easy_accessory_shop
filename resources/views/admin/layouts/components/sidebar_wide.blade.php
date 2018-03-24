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
<div class="item">Nhập hàng</div>
<div class="item">Đơn hàng <i class="tasks icon"></i></div>
<div class="item">Khuyến mãi</div>
<div class="item">Nội dung website</div>

<script>
    $(function(){
        $('.ui.accordion').accordion();
    });
</script>