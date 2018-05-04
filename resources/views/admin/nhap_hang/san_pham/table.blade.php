<table class="ui table very compact striped celled selectable" id="bang-chi-tiet-don-hang">

    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-san-pham-phieu-nhap" >
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Tồn kho</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th class="collapsing">Thao tác</th>
    </tr>
    </thead>

    <tbody>

    @foreach($chiTietPhieuNhaps as $stt => $chiTietPhieuNhap)
        @if($chiTietPhieuNhap->isDelete())
            @continue
        @endif

        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="chi-tiet-phieu-nhap-id[]"
                           value="{{ $chiTietPhieuNhap->id }}">
                </div>
            </td>
            <td>{{ $stt + 1 }}</td>
            <td><a href="{{ route('san_pham.show',[$chiTietPhieuNhap->san_pham_id]) }}">
                    {{ $chiTietPhieuNhap->tenSanPham() }}
                </a>
            </td>
            <td>{{ $chiTietPhieuNhap->so_luong }}</td>
            <td>{{ number_format($chiTietPhieuNhap->don_gia) }} đ</td>
            <td>{{ $chiTietPhieuNhap->soLuongSanPham() }}</td>
            <td>
                <a href="#" onclick="$( '{{ '#modal-sua-'.$chiTietPhieuNhap->id }}' ).modal('show')"
                   class="ui small green label">
                    <i class="edit fitted icon"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>

    @if (method_exists($chiTietPhieuNhaps, 'render'))
        <tfoot>
        <tr class="center aligned"><th colspan="9">
                {{ $chiTietPhieuNhaps->render('vendor.pagination.smui')}}
            </th></tr>
        </tfoot>
    @endif

</table>