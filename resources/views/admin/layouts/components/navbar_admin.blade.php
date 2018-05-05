<div href="" class="ui dropdown item">
    <img id="admin-avt" src="{{ asset('assets/images/uploaded/avt/steve.jpg') }}" class="ui mini circular image">
    <strong>{{ \App\Helper\AuthHelper::adminName() }}</strong>
    <i class="dropdown icon"></i>
    <div class="menu">
        <a onclick="$('#modal-edit-info').modal('show')" class="item">
            <i class="edit icon"></i>Cập nhật thông tin</a>

        <a onclick="$('#modal-change-password').modal('show')" class="item">
            <i class="edit icon"></i>Đổi mật khẩu</a>

        <a href="{{ route('admin.logout') }}" class="item">
            <i class="sign out icon"></i>Đăng xuất</a>

        @include('admin.layouts.components.modals_edit')
        @include('admin.layouts.components.modal_change_password')
        @include('sharing.components.error')
    </div>
</div>