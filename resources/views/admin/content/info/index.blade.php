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
                <button class="ui blue button">
                    <i class="save icon"></i>Lưu lại
                </button>
            </div>

            <div class="ui two column divided grid small-td-margin">
                <div class="column">
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
                </div>

                <div class="column">
                    <div class="field">
                        <label>Email Cổng thanh toán Bảo Kim</label>
                        <input type="text" name="baokim_email" value="{{ $info->baokim_email }}">
                    </div>
                    <div class="field">
                        <label>Email Cổng thanh toán Ngân Lượng</label>
                        <input type="email" name="nganluong_email" value="{{ $info->nganluong_email }}">
                    </div>
                    <div class="field">
                        <label>Plugin chat online</label>

                        <div class="ui field blue segment small-margin">
                            <label>Facebook messenger</label>

                            <div class="ui radio checkbox">
                                <label for="fb">Đặt làm mặc định</label>
                                <input type="radio" name="chat_plugin" class="hidden" value="fb"
                                        {{ $info->chat_plugin == 'fb' ? 'checked' : '' }}>
                            </div>
                            <label>Mã nhúng</label>
                            <textarea name="link_fb" rows="2">{!! $info->link_fb !!}</textarea>
                        </div>
                        <div class="ui field green segment small-margin">
                            <label>Tawk.to</label>

                            <div class="ui radio checkbox">
                                <label>Đặt làm mặc định</label>
                                <input type="radio" name="chat_plugin" class="hidden" value="tawkto"
                                        {{ $info->chat_plugin == 'tawkto' ? 'checked' : '' }}>
                            </div>
                            <label>Mã nhúng</label>
                            <textarea name="link_tawkto" rows="2">{!! $info->link_tawkto !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field">
                <button class="ui blue button">
                    <i class="save icon"></i>Lưu lại
                </button>
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
