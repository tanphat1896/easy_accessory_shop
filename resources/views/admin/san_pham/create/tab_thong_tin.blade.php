<div class="ui bottom attached tab segment active" data-tab="first">
    {{ csrf_field() }}

    <div class="ui padded stackable grid">
        <div class="ten wide column">

            <div class="inline required field">
                <label class="label-fixed">Tên sản phẩm</label>
                <input type="text" name="ten-san-pham" id="ten_sp" placeholder="Tên sản phẩm">
            </div>

            <div class="inline required field">
                <label class="label-fixed">Loại sản phẩm</label>
                <select name="loai-san-pham" class="ui search dropdown">
                    @foreach($loaiSanPhams as $loaiSanPham)
                        <option value="{{ $loaiSanPham->id }}">
                            {{ $loaiSanPham->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="inline required field">
                <label class="label-fixed">Thương hiệu</label>
                <select name="thuong-hieu" class="ui search dropdown">
                    @foreach($thuongHieus as $thuongHieu)
                        <option value="{{ $thuongHieu->id }}">
                            {{ $thuongHieu->getName() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="inline required field">
                <label class="label-fixed">Giá</label>
                <input type="text" name="gia" value="0" id="gia" placeholder="Giá thành">
            </div>

            <div class="inline required field">
                <label class="label-fixed">Tình trạng</label>
                <select name="tinh-trang" class="ui dropdown">
                    <option value="1">
                        Đang kinh doanh
                    </option>
                    <option value="0">
                        Ngừng kinh doanh
                    </option>
                </select>
            </div>

            <div class="ui error message">
            </div>
        </div>

        <div class="six wide column">
            <div class="required field">
                <label>Ảnh đại diện</label>
                <label for="anh-dai-dien">
                    <span class="ui blue compact label">Chọn một ảnh</span>
                    <span id="anh-dai-dien-name"></span>
                </label>
                <input type="file" name="anh-dai-dien" id="anh-dai-dien" style="display: none;"
                       onchange="$('#anh-dai-dien-name').text($('#anh-dai-dien')[0].files[0].name)"
                       accept="image/x-png,image/jpeg">
            </div>

            <div class="ui divider"></div>

            <div class="field">
                <label>Ảnh chi tiết</label>
                <label for="anh-chi-tiet">
                    <span class="ui blue compact label">Chọn các ảnh</span>
                    <ul class="ui list" id="ds-anh-chi-tiet"></ul>
                </label>
                <input type="file" multiple name="anh-chi-tiet[]" max="5" id="anh-chi-tiet" style="display: none;"
                       onchange="updateFileNames()" accept="image/x-png,image/jpeg">
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <button class="ui blue button" type="submit">
                    <i class="save fitted icon"></i>
                    Lưu lại
                </button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function updateFileNames() {
            let files = $('#anh-chi-tiet')[0].files;
            if (files.length > 5) {
                $.toast({
                    heading: 'Lỗi', icon: 'error', text: 'Chỉ được chọn tối đa 5 file',
                    loader: false, position: 'bottom-right'
                });
                return;
            }

            let html = '';
            $.each(files, (idx, file) => {
                html += `<li>${file.name}</li>`;
            });

            $('#ds-anh-chi-tiet').html(html);
        }

        $('#form-them-san-pham').form({
            fields: {
                ma_sp: {
                    rules: [{type: 'empty', prompt: 'Mã sản phẩm không được bỏ trống'}]
                },
                ten_sp: {
                    rules: [{type: 'empty', prompt: 'Tên sản phẩm không được bỏ trống '}]
                },
                gia: {
                    identifier: 'gia',
                    rules: [
                        {type: 'empty', prompt: 'Giá không được bỏ trống'},
                        {type: 'regExp[/^[,.\s0-9]+$/igm]', prompt: 'Giá sai định dạng'}
                    ]
                },
                "anh-dai-dien": {
                    rules: [{type: 'empty', prompt: 'Hãy chọn ảnh đại diện'}]
                }
            },
            // inline:true
        })
    </script>
@endpush