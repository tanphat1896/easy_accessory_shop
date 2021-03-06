@extends('admin.layouts.master')

@section('title', 'Quản lý thương hiệu')

@push('style')
    <style>
    </style>
@endpush

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý thương hiệu</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('thuong_hieu.destroy', [0]) }}" method="post" class="ui form">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <div class="field no-clear force-left">
                <button type="submit" class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <button type="button" class="ui small blue button" onclick="$('#modal-them-thuong-hieu').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </button>
            </div>
            <div class="field force-right no-clear">

                <div class="ui small input right labeled">

                    @if (Request::has('name'))
                        <i class="remove-input remove red icon pointer"
                           onclick="redirectTo('{{ route('thuong_hieu.index') }}')"></i>
                    @endif

                    <input type="text" class="need-remove" id="search-brand" placeholder="Tìm kiếm"
                           onkeyup="pressEnter(event, searchBrand)" value="{{ Request::get('name') }}">

                    <a href="#" class="ui blue label"
                       onclick="searchBrand()">
                        <i class="search fitted icon"></i></a>
                </div>

            </div>

            <div class="ui divider hidden clearing no-td-margin"></div>

            @include('admin.thuong_hieu.table')
        </form>

        @include('admin.thuong_hieu.modals')
    </div>
@endsection

@push('script')
    <script>
        // bindAjaxDataTable('bang-thuong-hieu', '/admin/brands');

        bindSelectAll('chon-het-thuong-hieu');

        let brandUrl = '{{ route('thuong_hieu.index') }}';
        $('.pagination a').click(function (e) {
            e.preventDefault();
            finding(brandUrl, 'search-brand', 'name', 'page=' + e.target.innerText);
        });

        function searchBrand() {
            finding(brandUrl, 'search-brand', 'name');
        }
    </script>
@endpush
