@extends('admin.layouts.master')

@section('title', 'Slide quảng cáo')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header center aligned">Slide quảng cáo</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <div id="dropzone-message" class="normal-td-margin"></div>

        <form action="{{ route('slider.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>

            <button type="button" class="ui small blue button" onclick="$('#modal-them-slider').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            @include('admin.content.slider.table')

        </form>

        <div class="ui dividing header">Xem trước</div>

        <div class="ui basic segment center aligned">
            <div class="fotorama" data-autoplay="3s">
                @foreach($sliders as $slider)
                    <a href="{{ asset($slider->hinh_anh) }}">
                         <img src="{{ asset($slider->hinh_anh) }}">
                    </a>
                @endforeach
            </div>
        </div>

        @include('admin.content.slider.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-slider');

        // bindDataTable('bang-slider');
    </script>
@endpush
