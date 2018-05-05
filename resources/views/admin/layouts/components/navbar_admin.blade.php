<div href="" class="ui dropdown item">
    <img id="admin-avt" src="{{ asset('assets/images/uploaded/avt/steve.jpg') }}" class="ui mini circular image">
    <strong>{{ \App\Helper\AuthHelper::adminName() }}</strong>
    <i class="dropdown icon"></i>
    <div class="menu">
        <a onclick="$('#modal-edit-info').modal('show')" class="item">
            <i class="edit icon"></i>Cập nhật thông tin</a>
        <a href="{{ route('admin.logout') }}" class="item">
            <i class="sign out icon"></i>Đăng xuất</a>
        <a href="" class="item">Thông tin</a>

        @include('admin.layouts.components.modals_edit')
    </div>
</div>