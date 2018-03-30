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
        <th>Thông số kỹ thuật liên quan</th>
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
            <td>
                @foreach($loaiSanPham->thongSos as $thongSo)
                    <span class="ui blue basic small label small-td-margin">{{ $thongSo->getName() }}</span>
                @endforeach
            </td>
            <td>
                <a href="#" class="ui green icon label"
                        onclick="$('{{ "#modal-sua-" . $loaiSanPham->id }}').modal('show')">
                    <i class="edit fitted icon"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>