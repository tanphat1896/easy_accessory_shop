@extends('admin.layouts.master')

@section('title', 'Thanh menu')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header center aligned">Quản lý thanh menu</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        @include('admin.content.menu.table')

        @include('admin.content.menu.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-slider');

        // bindDataTable('bang-slider');
    </script>
@endpush
