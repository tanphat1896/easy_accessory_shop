@extends('admin.layouts.master')

@section('title', 'Thông tin cửa hàng')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header">Thông tin cửa hàng</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('info.store') }}" class="ui form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="field">
                <label>Tên cửa hàng</label>
                <input type="text" name="name" value="{{ $info->ten_cua_hang }}">
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="{{ $info->email }}">
            </div>
            <div class="field">
                <label>Số điện thoại</label>
                <input type="text" name="phone" value="{{ $info->so_dien_thoai }}">
            </div>
            <div class="field">
                <label>Địa chỉ</label>
                <input type="text" name="address" value="{{ $info->dia_chi }}">
            </div>

            @include('sharing.lfm_field', ['label' => 'Logo', 'thumb' => $info->logo, 'needThumb' => 1])

            <div class="field">
                <button class="ui blue button">
                    <i class="save icon"></i>Lưu lại</button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        // bindSelectAll('chon-het-slider');
        //
        // // bindDataTable('bang-slider');
    </script>
@endpush
