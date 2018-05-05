<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable" id="bang-loai-sp">
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
                        <span class="ui blue basic tiny label small-td-margin">{{ $thongSo->getName() }}</span>
                    @endforeach
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label"
                       onclick="$('{{ "#modal-sua-" . $loaiSanPham->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>