<table class="ui table very compact striped celled selectable" id="bang-nha-cung-cap">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-nha-cung-cap" >
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên nhà cung cấp</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th class="collapsing">Sửa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nhaCungCaps as $stt => $nhaCungCap)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="nha-cung-cap-id[]" value="{{ $nhaCungCap->id }}">
                </div></td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $nhaCungCap->ten_ncc }}</td>
            <td>{{ $nhaCungCap->dia_chi }}</td>
            <td>{{ $nhaCungCap->so_dien_thoai }}</td>
            {{--<td>{{ $brand->slug }}</td>--}}
            <td class="center aligned">
                <a href="#" class="ui tiny green label"
                        onclick="$('{{ "#modal-sua-" . $nhaCungCap->id }}').modal('show')">
                    <i class="pencil fitted icon"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($nhaCungCaps, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $nhaCungCaps->render('vendor.pagination.smui')}}
    </div>
@endif
