@extends('admin.layouts.master')

@section('title', 'Slide quảng cáo')

@section('content')
    <h3 class="ui dividing header center aligned">Slide quảng cáo</h3>

    @if(Session::has('success'))
        <div class="ui small positive message">
            {{ Session::get('success') }}
            <i class="close icon" onclick="$(this).closest('.message').transition('fade')"></i>
        </div>
    @endif

    @if(Session::has('errors'))
        <div class="ui small negative message">
            <strong>Xin hãy kiểm tra lại</strong>
            <ul class="list">
                @foreach(Session::get('errors') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <i class="close icon" onclick="$(this).closest('.message').transition('fade')"></i>
        </div>
    @endif

    <div id="dropzone-message" class="normal-td-margin"></div>

    <form action="{{ route('slider.destroy', [0]) }}" method="post">

        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <button type="submit" class="ui red delete button need-popup"
                data-content="Xóa các mục vừa chọn"
                onclick="return confirmDelete()"
        >
            <i class="delete icon"></i>
            <strong>Xóa </strong>
        </button>

        <button type="button" class="ui blue button" onclick="$('#modal-them-slider').modal('show')">
            <i class="add icon"></i>
            <strong>Thêm mới </strong>
        </button>

        @include('admin.slider.table')

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

    @include('admin.slider.modals')
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-slider');

        // bindDataTable('bang-slider');
    </script>
@endpush
