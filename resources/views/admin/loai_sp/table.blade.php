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
            <th class="collapsing">Sản phẩm</th>
            <th class="collapsing">Sửa</th>
            <th class="collapsing">Xóa</th>
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
                    <a href="{{ route('san_pham.index') }}?pt={{ $loaiSanPham->id }}" class="ui tiny blue label">
                        <i class="box fitted icon"></i>
                    </a>
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label"
                       onclick="$('{{ "#modal-sua-" . $loaiSanPham->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
                <td>
                    <form action="{{ route('loai_sp.destroy', [0]) }}" class="force-inline">
                        {{ csrf_field() }}
                        <input type="hidden" name="loai-sp-id" value="{{ $loaiSanPham->id }}">
                        <button class="ui tiny red label pointer">
                            <i class="remove icon fitted"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>