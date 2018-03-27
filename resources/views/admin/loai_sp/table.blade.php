<table class="ui table very compact striped celled selectable" id="bang-loai-sp">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-loai-sp">
                <input type="checkbox">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên loại sản phẩm</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th class="collapsing">Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($loaiSanPhams as $stt => $loaiSanPham)
        <tr>
            <td>
                <div class="ui child checkbox">
                    <input type="checkbox" name="loai-sp-id[]" value="{{ $loaiSanPham->id }}">
                </div>
            </td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $loaiSanPham->ten_loai }}</td>
            {{--<td>{{ $brand->slug }}</td>--}}
            <td>
                <button type="button" class="ui green mini button"
                        onclick="$('{{ "#modal-sua-" . $loaiSanPham->id }}').modal('show')">
                    <i class="edit icon"></i>
                    <strong>Sửa</strong>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>