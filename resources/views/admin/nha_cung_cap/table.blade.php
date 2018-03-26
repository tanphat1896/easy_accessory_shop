<table class="ui table very compact striped celled selectable" id="bang-nha-cung-cap">
    <thead>
    <tr>
        <th><input type="checkbox" id="chon-het-nha-cung-cap" onclick="chonHet()"></th>
        <th>STT</th>
        <th>Tên nhà cung cấp</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nhaCungCaps as $stt => $nhaCungCap)
        <tr>
            <td class="collapsing"><input type="checkbox" name="nha-cung-cap-id[]" value="{{ $nhaCungCap->id }}"></td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $nhaCungCap->ten_ncc }}</td>
            <td>{{ $nhaCungCap->dia_chi }}</td>
            <td>{{ $nhaCungCap->so_dien_thoai }}</td>
            {{--<td>{{ $brand->slug }}</td>--}}
            <td class="collapsing">
                <button type="button" class="ui green mini button"
                        onclick="$('{{ "#modal-sua-" . $nhaCungCap->id }}').modal('show')">
                    <i class="edit icon"></i>
                    <strong>Sửa</strong>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr class="right aligned">
        <th colspan="6">{{ $nhaCungCaps->render('vendor.pagination.smui') }}</th>
    </tr>
    </tfoot>
</table>