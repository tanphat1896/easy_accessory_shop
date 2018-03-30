<table class="ui table very compact striped celled selectable" id="bang-thuong-hieu">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-thuong-hieu">
                <input type="checkbox">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên thương hiệu</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th class="collapsing">Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($brands as $stt => $brand)
        <tr>
            <td>
                <div class="ui child checkbox">
                    <input type="checkbox" name="thuong-hieu-id[]" value="{{ $brand->id }}">
                </div>
            </td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ $brand->ten_thuong_hieu }}</td>
            {{--<td>{{ $brand->slug }}</td>--}}
            <td>
                <a href="#" class="ui green label"
                        onclick="$('{{ "#modal-sua-" . $brand->id }}').modal('show')">
                    <i class="edit fitted icon"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>