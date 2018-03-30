<table class="ui table very compact striped celled selectable" id="bang-nhap-hang">

    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="chon-het-phieu-nhap" >
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Người nhập hàng</th>
        <th>Ngày nhập</th>
        <th>Nhà cung cấp</th>
        {{--<th>Từ khóa tìm kiếm</th>--}}
        <th>Thao tác</th>
    </tr>
    </thead>

    <tbody>

        @foreach($phieuNhaps as $stt => $phieuNhap)
            <tr>
                <td class="collapsing">
                    <div class="ui child checkbox">
                        <input type="checkbox" class="hidden" name="phieu-nhap-id[]" value="{{ $phieuNhap->id }}">
                    </div>
                </td>
                <td>{{ $stt + 1 }}</td>
                <td>{{ \App\PhieuNhap::find($phieuNhap->id)->TaiKhoan->ten }}</td>
                <td>{{ $phieuNhap->ngay_nhap }}</td>
                <td>{{ \App\PhieuNhap::find($phieuNhap->id)->NhaCungCap->ten_ncc }}</td>
                <td>
                    <a href="#" class="ui small blue label ">Xem</a>
                    <a href="#" class="ui small teal label ">Sửa</a>
                </td>
            </tr>
        @endforeach

    </tbody>

</table>