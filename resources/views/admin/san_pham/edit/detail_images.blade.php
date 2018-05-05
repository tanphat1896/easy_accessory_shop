@push('style')
    <link rel="stylesheet" href="{{ asset('plugin/dropzone/dropzone.min.css') }}">
    <style>
        #formUpload {
            border: 2px dashed #2185d0;
            border-radius: 10px;
        }
        .image-wrapper {
            display: inline-block;
            position: relative;
        }

        .image-wrapper .remove-checkbox {
            z-index: 999;
            position: absolute;
            top: -3px;
            right: -3px;
        }
    </style>
@endpush

<div class="ui bottom attached tab segment" data-tab="four" style="border-top: none;">

    <div class="field">

        <button type="button" class="ui red delete small button need-popup"
                data-content="Xóa các mục vừa chọn"
                onclick="deleteImg()">
            <i class="delete icon"></i>
            <strong>Xóa </strong>
        </button>

        <button class="ui blue small button" type="button"
                onclick="$('#modal-them-hinh-anh').modal('show');">
            <i class="plus icon fitted"></i>
            Thêm mới
        </button>

        <div class="ui basic segment">
            <div id="detail-images">
                @foreach($sanPham->hinhAnhs as $anh)
                    <div class="image-wrapper" onclick="removeDetailImage(this)">
                        <div class="ui child checkbox remove-checkbox">
                            <input type="checkbox" name="hinh-anh-id[]" class="hidden">
                        </div>
                        <img src="/{{ $anh->lien_ket }}" class="ui small bordered image" onclick="selectImg(this)">
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    {{--<form action="{{ route('anh_san_pham.store') }}" method="post" enctype="multipart/form-data">--}}
    {{--{{csrf_field()}}--}}
    {{--<input type="text" name="sanpham-id" value="{{ $sanPham->id }}">--}}
    {{--<input type="file" name="file">--}}
    {{--<button>OK</button>--}}
    {{--</form>--}}

    {{--<form action="{{ route('anh_san_pham.destroy', [0]) }}" method="post">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('DELETE') }}--}}

    {{--<table class="ui table striped celled" id="bang-anh-chi-tiet">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th class="collapsing">--}}
    {{--<div class="ui checkbox" id="chon-het-hinh-anh">--}}
    {{--<input type="checkbox" class="hidden">--}}
    {{--</div>--}}
    {{--</th>--}}
    {{--<th class="collapsing">STT</th>--}}
    {{--<th>Hình ảnh (Click để phóng to)</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach($sanPham->hinhAnhs as $stt => $anh)--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<div class="ui child checkbox">--}}
    {{--<input type="checkbox" class="hidden" name="hinh-anh-id[]" value="{{ $anh->id }}">--}}
    {{--</div>--}}
    {{--</td>--}}
    {{--<td>{{ $stt + 1 }}</td>--}}
    {{--<td><a href="#" onclick="$('{{ '#modal-xem-' . $anh->id }}').modal('show')">--}}
    {{--<img class="ui small image" src="/{{ $anh->lien_ket }}">--}}
    {{--</a>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<div class="ui basic modal" id="{{ "modal-xem-" . $anh->id }}">--}}
    {{--<i class="close icon" style="color: #fff !important;"></i>--}}
    {{--<div class="content">--}}
    {{--<img class="ui centered image" src="/{{ $anh->lien_ket }}">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</form>--}}
    {{--</div>--}}

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

            function selectImg(img) {
                let checkbox = $(img).closest('.image-wrapper').find('.checkbox');
                let checked = $(checkbox).find('input').prop('checked');
                $(checkbox).checkbox(checked ? 'uncheck' : 'check');
            }

            Dropzone.options.formUpload = {
                url: '{{ route('anh_san_pham.store') }}',
                sending: function (file, xhr, formData) {
                    formData.append("_token", '{{ csrf_token() }}');
                    formData.append("sanpham-id", '{{ $sanPham->id }}');
                },
                success(file, res) {
                    let msg = $('#upload-success');
                    if (!$(msg).is(':visible')) {
                        $(msg).show();
                        $.toast({
                            heading: 'Thành công',
                            icon: 'info',
                            text: 'Hãy tải lại trang để cập nhật',
                            position: 'top-right',
                            loader: false
                        });
                    }

                    console.log(res);

                    if (file.previewElement)
                        return file.previewElement.classList.add("dz-success");
                }
            }
        </script>
@endpush