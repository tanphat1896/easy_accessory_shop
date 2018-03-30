<table class="ui table very compact striped celled selectable" id="bang-chi-tiet-don-hang">

    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-san-pham" >
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th>Thao tác</th>
    </tr>
    </thead>

    <tbody>

    @foreach($chiTietPhieuNhaps as $stt => $chiTietPhieuNhap)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="chi-tiet-phieu-nhap-id[]" value="{{ $chiTietPhieuNhap->san_pham_id }}">
                </div>
            </td>
            <td>{{ $stt + 1 }}</td>
            <td>{{ \App\ChiTietPhieuNhap::find($chiTietPhieuNhap->id)->SanPham->ten_san_pham }}</td>
            <td>{{ $chiTietPhieuNhap->so_luong }}</td>
            <td>{{ $chiTietPhieuNhap->don_gia }}</td>
            <td>
                {{--<a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}" class="ui small blue label ">Xem</a>--}}
                {{--<a href="#" class="ui small teal label "--}}
                   {{--onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')">Sửa</a>--}}
            </td>
        </tr>
    @endforeach

    </tbody>

</table>