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
                <td  class="collapsing">
                    <a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}"
                       class="ui small blue label">
                        <i class="eye open fitted icon"></i>
                    </a>
                    <a href="#" onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')"
                       class="ui small green label">
                        <i class="edit fitted icon"></i>
                    </a>
                    {{--<a href="{{ route('nhap_hang.show',[$phieuNhap->id]) }}" class="ui small blue label">Xem</a>--}}
                    {{--<a href="#" class="ui small teal label"--}}
                       {{--onclick="$( '{{ '#modal-sua-'.$phieuNhap->id }}' ).modal('show')">Sửa</a>--}}
                </td>
            </tr>
        @endforeach

    </tbody>

</table>

@push('script')
    <script>
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush