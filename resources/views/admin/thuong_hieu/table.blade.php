<table class="ui table very compact striped celled selectable" id="bang-thuong-hieu">
    <thead>
    <tr>
        <th><input type="checkbox" id="chon-het-thuong-hieu" onclick="chonHet()"></th>
        <th>STT</th>
        <th>Tên thương hiệu</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($brands as $stt => $brand)
        <tr>
            <td class="collapsing"><input type="checkbox" name="thuong-hieu-id[]" value="{{ $brand->id }}"></td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $brand->ten_thuong_hieu }}</td>
            {{--<td>{{ $brand->slug }}</td>--}}
            <td class="collapsing">
                <button type="button" class="ui green mini button"
                        onclick="$('{{ "#modal-sua-" . $brand->id }}').modal('show')">
                    <i class="edit icon"></i>
                    <strong>Sửa</strong>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr class="right aligned">
        <th colspan="4">{{ $brands->render('vendor.pagination.smui') }}</th>
    </tr>
    </tfoot>
</table>