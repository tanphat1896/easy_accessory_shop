@extends('admin.layouts.master')

@section('title', 'Quản lý loại sản phẩm')

@section('content')
    <h3 class="ui dividing header center aligned">Quản lý loại sản phẩm</h3>
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
    <form action="{{ route('loai_sp.destroy', [0]) }}" method="post">

        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        @include('admin.loai_sp.table')

        <button type="submit" class="ui red delete button"
                data-content="Xóa các mục vừa chọn"
                onclick="return confirmDelete()"
        >
            <i class="delete icon"></i>
            <strong>Xóa </strong>
        </button>
        <button type="button" class="ui blue button" onclick="$('#modal-them-loai-sp').modal('show')">
            <i class="add icon"></i>
            <strong>Thêm mới </strong>
        </button>
    </form>

    @include('admin.loai_sp.modals')
@endsection

@push('script')
    <script>
        // $('#bang-thuong-hieu').DataTable();

        $('.ui.delete.button').popup({position: 'bottom left'});

        function chonHet() {
            $('input[name="loai-sp-id[]"]').attr('checked', $('#chon-het-loai-sp').prop('checked'));
        }

        function confirmDelete() {
            if ($('input[name="loai-sp-id[]"]:checked').length < 1)
                return false;

            return confirm('Bạn chắc chắn xóa các mục vừa chọn')
        }

    </script>
@endpush