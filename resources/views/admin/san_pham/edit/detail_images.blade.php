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
            height: 150px;
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
                onclick="invokeModal()">
            <i class="plus icon fitted"></i>
            Thêm mới
        </button>

        <div class="ui basic segment no-padding">
            <div class="ui checkbox" id="chon-het-hinh-anh">
                <label><strong>Chọn hết</strong></label>
                <input type="checkbox" class="hidden">
            </div>
            <div id="detail-images small-td-padding">
                @foreach($sanPham->hinhAnhs as $anh)
                    <div class="image-wrapper">
                        <div class="ui child checkbox remove-checkbox">
                            <input type="checkbox" name="hinh-anh-id[]" value="{{ $anh->id }}" class="hidden">
                        </div>
                        <img src="/{{ $anh->lien_ket }}" class="ui small bordered image pointer"
                             onclick="selectImg(this)">
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
            <button class="ui cancel blue button">
                <strong>Đóng</strong>
            </button>
        </div>
    </div>

    @push('script')
        <script>
            bindSelectAll('chon-het-hinh-anh');

            function invokeModal() {
                $('#modal-them-hinh-anh').modal({
                    closable: false,
                    onHidden() {
                        window.location.reload();
                    }
                }).modal('show');
            }

            function selectImg(img) {
                let checkbox = $(img).closest('.image-wrapper').find('.checkbox');
                let checked = $(checkbox).find('input').prop('checked');
                $(checkbox).checkbox(checked ? 'uncheck' : 'check');
            }

            function  deleteImg() {
                let ok = confirmDelete();
                if (!ok)
                    return;
                let inputs = $('[name="hinh-anh-id[]"]:checked');
                let ids = [];
                [...inputs].forEach((input) => {
                    ids.push($(input).prop('value'));
                });
                axios.post('{{ route('anh_san_pham.destroy', [0]) }}', {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                    "hinh-anh-id": ids
                }).then(rs => {
                    let success = rs.data + '';

                    if (success == 'true'){
                        window.location.reload(true);
                        return;
                    }

                    $.toast({
                        heading: 'Không thể xóa ảnh, hãy thử lại sau!',
                        icon: 'error',
                        position: 'top-right',
                        loader: false
                    });
                }).catch(e => console.log(e));
            }

            let showed = false;
            Dropzone.options.formUpload = {
                url: '{{ route('anh_san_pham.store') }}',
                sending: function (file, xhr, formData) {
                    formData.append("_token", '{{ csrf_token() }}');
                    formData.append("sanpham-id", '{{ $sanPham->id }}');
                },
                success(file, res) {
                    if (! showed) {
                        showed = true;
                        $.toast({
                            heading: 'Tải lên thành công',
                            icon: 'success',
                            position: 'top-right',
                            loader: false
                        });
                    }

                    if (file.previewElement)
                        return file.previewElement.classList.add("dz-success");
                }
            }
        </script>
@endpush