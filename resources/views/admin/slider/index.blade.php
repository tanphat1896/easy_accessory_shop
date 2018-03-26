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
    <form action="{{ route('slider.destroy', [0]) }}" method="post">

        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        @include('admin.slider.table')

        <button type="submit" class="ui red delete button"
                data-content="Xóa các mục vừa chọn"
                onclick="return confirmDelete()"
        >
            <i class="delete icon"></i>
            <strong>Xóa </strong>
        </button>
        <button type="button" class="ui blue button" onclick="$('#modal-them-nha-cung-cap').modal('show')">
            <i class="add icon"></i>
            <strong>Thêm mới </strong>
        </button>
    </form>

    @include('admin.slider.modals')
@endsection

@push('script')
    <script>
        // $('#bang-thuong-hieu').DataTable();

        $('.ui.delete.button').popup({position: 'bottom left'});

        function chonHet() {
            $('input[name="nha-cung-cap-id[]"]').attr('checked', $('#chon-het-nha-cung-cap').prop('checked'));
        }

        function confirmDelete() {
            if ($('input[name="nha-cung-cap-id[]"]:checked').length < 1)
                return false;

            return confirm('Bạn chắc chắn xóa các mục vừa chọn')
        }

    </script>
@endpush