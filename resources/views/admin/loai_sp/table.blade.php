<table class="ui table very compact striped celled selectable" id="bang-thuong-hieu">
    <thead>
    <tr>
        <th><input type="checkbox" id="chon-het-loai-sp" onclick="chonHet()"></th>
        <th>STT</th>
        <th>Tên loại sản phẩm</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($loaiSanPhams as $stt => $loaiSanPham)
        <tr>
            <td class="collapsing"><input type="checkbox" name="loai-sp-id[]" value="{{ $loaiSanPham->id }}"></td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $loaiSanPham->ten_loai }}</td>
            {{--<td>{{ $brand->slug }}</td>--}}
            <td class="collapsing">
                <button type="button" class="ui green mini button"
                        onclick="$('{{ "#modal-sua-" . $loaiSanPham->id }}').modal('show')">
                    <i class="edit icon"></i>
                    <strong>Sửa</strong>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr class="right aligned">
        <th colspan="4">{{ $loaiSanPhams->render('vendor.pagination.smui') }}</th>
    </tr>
    </tfoot>
</table>