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

<div class="ui vertical flip modal" id="modal-them-slider">
    <div class="blue header">Thêm slides</div>
    <div class="scrolling content">
        <form action="{{ route('slider.store') }}"
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

@foreach($sliders as $stt => $slider)
    <div class="ui basic modal" id="{{ "modal-xem-" . $slider->id }}">
        <i class="close icon" style="color: #fff !important;"></i>
        <div class="content">
            <img src="{{ asset($slider->hinh_anh) }}" class="ui centered image">
        </div>
    </div>
@endforeach

@push('script')
    <script>
        Dropzone.options.formUpload = {
            url: '{{ route('slider.store') }}',
            sending: function (file, xhr, formData) {
                formData.append("_token", '{{ csrf_token() }}');
            },
            success(file, res) {
                $('#dropzone-message')
                    .html("<div class='ui small info message'><strong>Tải lại trang để cập nhật</strong></div>");
                if(file.previewElement)
                    return file.previewElement.classList.add("dz-success");
            }
        }
    </script>
@endpush