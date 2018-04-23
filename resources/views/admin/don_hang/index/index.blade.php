@extends('admin.layouts.master')
@section('title', 'Quản lý đơn hàng')
@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">Quản lý đơn hàng</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        @include('admin.don_hang.index.table')
    </div>
@endsection