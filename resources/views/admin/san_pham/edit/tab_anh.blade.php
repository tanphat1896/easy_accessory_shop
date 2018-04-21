<div class="ui bottom attached tab segment" data-tab="four">

    {{--<form action="{{ route('anh_san_pham.store') }}" method="post" enctype="multipart/form-data">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="text" name="sanpham-id" value="{{ $sanPham->id }}">--}}
        {{--<input type="file" name="file">--}}
        {{--<button>OK</button>--}}
    {{--</form>--}}

    <form action="{{ route('anh_san_pham.destroy', [0]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button class="ui blue small button" type="button"
                onclick="$('#modal-them-hinh-anh').modal('show');">
            <i class="plus icon fitted"></i>
            Thêm mới
        </button>

        <button type="submit" class="ui red delete small button need-popup"
                data-content="Xóa các mục vừa chọn"
                onclick="return confirmDelete()"
        >
            <i class="delete icon"></i>
            <strong>Xóa </strong>
        </button>

        <table class="ui table striped celled" id="bang-anh-chi-tiet">
            <thead>
            <tr>
                <th class="collapsing">
                    <div class="ui checkbox" id="chon-het-hinh-anh">
                        <input type="checkbox" class="hidden">
                    </div>
                </th>
                <th class="collapsing">STT</th>
                <th>Hình ảnh (Click để phóng to)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sanPham->hinhAnhs as $stt => $anh)
                <tr>
                    <td>
                        <div class="ui child checkbox">
                            <input type="checkbox" class="hidden" name="hinh-anh-id[]" value="{{ $anh->id }}">
                        </div>
                    </td>
                    <td>{{ $stt + 1 }}</td>
                    <td><a href="#" onclick="$('{{ '#modal-xem-' . $anh->id }}').modal('show')">
                            <img class="ui small image" src="/{{ $anh->lien_ket }}">
                        </a>
                    </td>
                </tr>
                <div class="ui basic modal" id="{{ "modal-xem-" . $anh->id }}">
                    <i class="close icon" style="color: #fff !important;"></i>
                    <div class="content">
                        <img class="ui centered image" src="/{{ $anh->lien_ket }}">
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
    </form>
</div>

@push('style')
    <link rel="stylesheet" href="{{ asset('plugin/dropzone/dropzone.min.css') }}">
    <style>
        #formUpload {
            border: 2px dashed #2185d0;
            border-radius: 10px;
        }
    </style>
@endpush

{{--script đặc biệt cần load trước khi form dropzone init--}}
<script src="{{ asset('plugin/dropzone/dropzone.min.js') }}"></script>

<div class="ui vertical flip modal" id="modal-them-hinh-anh">
    <div class="blue header">Thêm hình ảnh</div>
    <div class="scrolling content">
        <form action="{{ route('anh_san_pham.store') }}"
              method="post"
              class="dropzone"
              enctype="multipart/form-data"
              id="formUpload">
            <div class="dz-message" data-dz-message><span>
                    <strong>Chọn file để upload</strong>
                </span></div>
        </form>
    </div>
    <div class="actions">
        <button class="ui cancel blue button"><strong>Đóng</strong></button>
    </div>
</div>

@push('script')
    <script>
        bindSelectAll('chon-het-hinh-anh');

        Dropzone.options.formUpload = {
            url: '{{ route('anh_san_pham.store') }}',
            sending: function (file, xhr, formData) {
                formData.append("_token", '{{ csrf_token() }}');
                formData.append("sanpham-id", '{{ $sanPham->id }}');
            },
            success(file, res) {
                $.toast({
                    heading: 'Thành công',
                    icon: 'info',
                    text: 'Hãy tải lại trang để cập nhật',
                    position: 'top-right'
                });

                console.log(res);

                if(file.previewElement)
                    return file.previewElement.classList.add("dz-success");
            }
        }
    </script>
@endpush